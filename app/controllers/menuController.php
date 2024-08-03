<?php 
class menuController extends Controller
{
    private $db;
    public $menus;

    public function __construct(){
        $this->model('MenuModel');
        session_start();
        $this->db =  new Database();
    }
    public function menu()
    {
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            if ($categoryId == 0) {
                $menus = $this->db->readAll('view_menu');
            } else {
                $menus = $this->db->getByCategoryId('menu', 'category_id', $categoryId);
            }

            header('Content-Type: text/html');
            $html = '';
            foreach ($menus as $menu) {
                $html .= $this->createMenuItemHTML($menu);
            }
            echo $html;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Category ID not provided']);
        }
    }

    private function createMenuItemHTML($menu)
    {
        $urlroot = URLROOT; // Assuming URLROOT is a defined constant
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        return "
            <div class='col-md-3'>
            <div class='card mb-4 shadow-sm border-0'>
                <img class='card-img-top' src='{$urlroot}/public/food_images/{$menu['image']}' alt='{$menu['name']}' style='height: 300px; width: 300px;'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-8'>
                            <h5 class='card-title'>{$menu['name']}</h5>
                            <p class='card-text'>{$menu['description']}</p>
                            <p class='card-text'>{$menu['price']} MMK</p>
                        </div>
                        <div class='col-4 text-right'>
                            <button class='btn btn-primary btn-add-to-cart' data-user-id='{$userId}' data-item-id='{$menu['id']}' data-price='{$menu['price']}'>
                                <i class='fas fa-cart-plus'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            ";

    }
    public function index(){

        $menu = $this->db->readAll('view_menu');
        $data = [
            'menus'=>$menu
        ];

        $this->view('admin/Menu/allMenu',$data);
    }


    public function create(){
        $this->view('admin/Menu/addMenu');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    
            $name = $_POST['name'];
            $categoryId = $_POST['category_id'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $msg = "";
    
            // Check for required fields
            if (empty($name) || empty($categoryId) || empty($quantity) || empty($description) || empty($price) || empty($image)) {
                setMessage('error', 'All fields are required!');
                redirect('menuController/create');
                return;
            }
    
            // Handle image upload
            $target = "food_images/" . basename($image);
    
            if (!file_exists("food_images/")) {
                mkdir("food_images/");
            }
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image Uploaded Successfully";
            } else {
                $msg = "Failed to Upload Image";
            }
    
            // Create new menu item
            $menu = new MenuModel();
            $menu->setName($name);
            $menu->setCategoryId($categoryId);
            $menu->setQuantity($quantity);
            $menu->setDescription($description);
            $menu->setPrice($price);
            $menu->setImage($image);
            $menu->setDate(date('Y-m-d H:i:s'));
    
            // Save menu item to database
            $menuCreated = $this->db-> create('menu', $menu->toArray());
            if ($menuCreated) {
                setMessage('success', 'Menu Created Successfully');
                redirect('menuController/index');
            } else {
                setMessage('error', 'Menu Creation Failed');
                redirect('menuController/create');
            }
        }
    }

    public function edit($id){

        $menus = $this->db->readAll('menu');

        $menus =$this->db->getById('menu',$id);

        $data =[
            'menus'=>$menus,
        ];
        $this->view('admin/Menu/edit',$data);
    }
   
public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       
        // echo $_POST['id']."<br>";
        // echo $_POST['name']."<br>";
        // echo $_POST['category_id']."<br>";
        // echo $_POST['description']."<br>";
        // echo $_POST['price']."<br>";
        // echo $_FILES['image']['name'];
        // echo "id";
        //exit;
        // Check if 'id' and other required fields are set in the POST request
        // && isset($_FILES['image']['name']);
        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['category_id']) && isset($_POST['description']) && isset($_POST['price'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $category_id = $_POST['category_id'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            // $date = $_POST['date'];
            $msg = "";

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $_FILES['image']['name'];
                $target = "food_images/" . basename($image);

                if (!file_exists("food_images/")) {
                    mkdir("food_images/");
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image Uploaded Successfully";
                } else {
                    $msg = "Failed to Upload Image";
                }
            } else {
                $image = $_POST['imagepath']; // Handle the case where no new image is uploaded
            }

            // Create a new MenuModel instance and set its properties
            $menus = new MenuModel();
            $menus->setId($id);
            $menus->setName($name);
            $menus->setQuantity($quantity);
            $menus->setCategoryId($category_id);
            $menus->setDescription($description);
            $menus->setPrice($price);
            // $menus->setDate($date);

            if ($image) {
                $menus->setImage($image);
            }

            // Update the menu in the database
            $updateMenu = $this->db->update('menu', $menus->getId(), $menus->toArray());

            if ($updateMenu) {
                setMessage('success', 'Menu Updated Successfully');
                redirect('menuController/index');
            } else {
                setMessage('error', 'Failed to Update Menu');
                redirect('menuController/index');
            }
        } else {
            // Handle the case where required POST fields are missing
            setMessage('error', 'Missing required fields');
            redirect('menuController/index');
        }
    }
}

public function destroy($id)
{
    // Decode the ID
    // $id = base64_decode($id);
    // echo ($id);
    // exit;

    // Ensure the ID is valid
    if ($id && is_numeric($id)) {
        // Create a new CategoryModel instance and set its ID
        $menu = new MenuModel();
        $menu->setId($id);

        // Delete the category from the database
        // $isdestroy = $this->db->delete('foods', $category->getId());
        $isdestroy = $this->db->delete('menu',$menu->getId());


        if ($isdestroy) {
            setMessage('success', 'Menu Deleted Successfully');
        } else {
            setMessage('error', 'Failed to Delete Menu');
        }
    } else {
        setMessage('error', 'Invalid Menu ID');
    }

    // Redirect to the food view page
    redirect('menuController/index');
}
}

