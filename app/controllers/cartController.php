<?php
//  require_once APPROOT . '/views/inc/user/header.php';
// session_start();
class cartController extends Controller
{
    private $db, $userId;

    public function __construct()
    {
        // $this->model('OrderModel');
        $this->model('cartModel');
        $this->db = new Database();
        session_start();
        $this->userId = $_SESSION['user_id'] ?? 0;
    }
    public function orderView(){
        $cart = $this->db->readAll('cart_view');
        $data = [
            'cart' => $cart
        ];
        $this->view('admin/order', $data);
    }

    public function index()
    {
        $carts = $this->db->getByCategoryId ('cart_view', 'user_id', $this->userId);
        $data = [
            'carts' => $carts
        ];
        $this->view('pages/cart', $data);
    }

    public function destroy($id)
    {
        if ($id && is_numeric($id)) {
            $cart = new cartModel();
            $cart->setId($id);
            $isdestroy = $this->db->delete('cart',$cart->getId());
            if ($isdestroy) {
                setMessage('success', 'Cart Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Cart');
            }
        } else {
            setMessage('error', 'Invalid Cart ID');
        }

        redirect('cartController/index');
    }

    public function deleteCart($user_id)
    {
        // Check if the user ID is valid and numeric
        if ($user_id && is_numeric($user_id)) {
            $cart = new cartModel();
            $cart->setUserId($user_id);
    
            // Assuming `delete` is a method in your database abstraction layer
            $isdestroy = $this->db->deleteByUserId('cart', ['user_id' => $cart->getUserId()]);
    
            if ($isdestroy) {
                setMessage('success', 'Cart Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Cart');
            }
        } else {
            setMessage('error', 'Invalid User ID');
        }
    

    // Redirect to the cartController index page
    redirect('cartController/index');
    }

  
    public function addToCart()
    {

        if (isset($_POST['price'])) {
            $itemId = $_POST['item_id'];
            $qty = $_POST['qty'];
            $totalPrice = $_POST['price'];
        
            $cart = new CartModel();
            $cart->setUserId($this->userId);
            $cart->setItemId($itemId);
        
            $totalQty = $this->db->getTotalCartCount('menu', 'id', $itemId); 
            $oldCartValue = $this->db->filterByMultipleColumns('cart', $cart->toArray());
        
            if ($oldCartValue) {
                if ($oldCartValue['quantity'] < $totalQty) {
                    $this->db->increaseQuantity($this->userId, $itemId, $totalPrice);
                    return $this->getCartCount($this->userId);
                }
            } else {
                $cart->setQty($qty);
                $cart->setTotalPrice($totalPrice);
        
                $cartCreated = $this->db->create('cart', $cart->toArray());
        
                if ($cartCreated) {
                    return $this->getCartCount($this->userId);
                }
            }
        }
        
        
    }
    public function decreaseQuantity()
{
    if (isset($_POST['user_id']) && isset($_POST['item_id']) && isset($_POST['price'])) {
        $userId = $_POST['user_id'];
        $itemId = $_POST['item_id'];
        $price = $_POST['price'];

        $cart = new CartModel();
        $cart->setUserId($userId);
        $cart->setItemId($itemId);

        if ($this->db->decreaseQuantity($userId, $itemId, $price)) {
            echo $this->getCartCount($userId);
        } else {
            echo 'Failed to decrease quantity.';
        }
    }
}

public function increaseQuantity()
{
    if (isset($_POST['user_id']) && isset($_POST['item_id']) && isset($_POST['price'])) {
        $userId = $_POST['user_id'];
        $itemId = $_POST['item_id'];
        $price = $_POST['price'];

        $cart = new CartModel();
        $cart->setUserId($userId);
        $cart->setItemId($itemId);

        $totalQty = $this->db->getTotalCartCount('menu', 'id', $itemId);
        $currentQty = $this->db->getCartQuantity($userId, $itemId);

        if ($currentQty < $totalQty) {
            if ($this->db->increaseQuantity($userId, $itemId, $price)) {
                $cartCount = $this-> getCartCount($userId);
                echo json_encode(['canIncrease' => true, 'cartCount' => $cartCount]);
            } else {
                echo json_encode(['canIncrease' => false, 'cartCount' => $this->getCartCount($userId)]);
            }
        } else {
            echo json_encode(['canIncrease' => false, 'cartCount' => $this->getCartCount($userId)]);
        }
    }
}




    public function getQtyForEachItem()
    {
        if (isset($_POST['item_id'])) {
            $itemId = $_POST['item_id'];
            $userId = $_POST['user_id'];
        } 
        $data = ['item_id'=>$itemId, 'user_id'=>$userId];
        
        $cartValue = $this->db->filterByMultipleColumns('cart', $data);
        $menuItemValue = $this->db->getTotalCartCount('menu', 'id', $itemId);
       
        if($cartValue['quantity'] == $menuItemValue){
            echo "disabled";
        } 
    }

    public function getCartCount($userId=null)
    {      
        if (isset($_GET['user_id'])) {
            $userId = $_GET['user_id'];
        } 
        $totalCartCount = $this->db->getTotalCartCount('cart', 'user_id', $userId);
        echo $totalCartCount;
    }

    public function disableBtnIncreaseAndDecrease(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $itemId = $_POST['menu_id'];
            $userId = $_POST['user_id'];
    
            $data = ['item_id'=>$itemId, 'user_id'=>$userId];
        
            $cartValue = $this->db->filterByMultipleColumns('cart', $data);
            $menuItemQty = $this->db->getTotalCartCount('menu','id',$itemId);
            if ($cartValue['quantity'] == $menuItemQty) { 
                echo "disabled";
            } 
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }

    public function updateQuantity()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $menuId = $_POST['menu_id'];
        $userId = $_POST['user_id'];
        $quantity = $_POST['quantity'];

        // Ensure parameters are valid
        if (empty($menuId) || empty($userId) || empty($quantity) || $quantity < 1) {
            echo json_encode(['success' => false, 'message' => 'Invalid parameters.']);
            exit;
        }
        $menuItemQty = $this->db->getTotalCartCount('menu','id',$menuId);
        if ($menuItemQty) {
            $disabled = ($quantity = $menuItemQty);
            echo json_encode(['success' => true, 'disabled' => $disabled]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Menu item not found.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    }
}

}
