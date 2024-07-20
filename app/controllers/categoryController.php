<?php 

class categoryController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('CategoryModel');
        $this->db = new Database();
    }

    public function index(){
        $category = $this->db->readAll('category');
        $data = [
            'category' => $category
        ];
        $this->view('admin/Category/allCategory', $data);
    }

    public function create(){
        $this->view('admin/Category/addCategory');
    }
    // public function store() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $name = $_POST['name'];
            
    //             if(empty($name)) {
    //                 $error='field Required';
    //         } else {
    //             $category = $this->db->read('category',['name'=>$name]);  
    //             if($category=$name)  {
    //                 echo "You connot add category";

    //             }

    //             $category = new CategoryModel();
    //             $category->setName($name);
    //             $category->setDate(date('Y-m-d H:i:s'));
    //             $categoryCreated = $this->db->create('category', $category->toArray());
    
    //             setMessage('success', 'Category Created Successfully');
    //             redirect('categoryController/index');
    //         }
    //     }
    // }
    
    
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            
            if (empty($name)) {
                $error = 'Field is required';
                // Display the error message
                setMessage('error', $error);
                redirect('categoryController/create');
            } else {
                // Check if category already exists using LIKE
                $category = $this->db->columnFilter('category', 'name' ,$name );
    
                if ($category) {
                    // If category exists, display an error message
                    setMessage('error', 'Category already exists');
                    redirect('categoryController/create');
                } else {
                    // Create new category
                    $category = new CategoryModel();
                    $category->setName($name);
                    $category->setDate(date('Y-m-d H:i:s'));
                    $categoryCreated = $this->db->create('category', $category->toArray());
    
                    if ($categoryCreated) {
                        setMessage('success', 'Category Created Successfully');
                        redirect('categoryController/index');
                    } else {
                        setMessage('error', 'Failed to Create Category');
                        redirect('categoryController/create');
                    }
                }
            }
        }
    }
    

    public function edit($id){
        $category = $this->db->getById('category', $id);
        $data = [
            'category' => $category,
        ];
        $this->view('admin/Category/edit', $data);
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['date'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $date = $_POST['date'];
                $category = new CategoryModel();
                $category->setId($id);
                $category->setName($name);
                $category->setDate($date);
                $categoryUpdated = $this->db->update('category', $category->getId(), $category->toArray());

                if ($categoryUpdated) {
                    setMessage('success', 'Category Updated Successfully');
                    redirect('categoryController/index');
                } else {
                    setMessage('error', 'Failed to Update Category');
                    redirect('categoryController/index');
                }
            } else {
                setMessage('error', 'Missing required fields');
                redirect('categoryController/index');
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
            $category = new CategoryModel();
            $category->setId($id);

            // Delete the category from the database
            // $isdestroy = $this->db->delete('foods', $category->getId());
            $isdestroy = $this->db->delete('category',$category->getId());


            if ($isdestroy) {
                setMessage('success', 'Category Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Category');
            }
        } else {
            setMessage('error', 'Invalid Category ID');
        }

        // Redirect to the food view page
        redirect('categoryController/index');
    }
}
