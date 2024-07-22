<?php
//  require_once APPROOT . '/views/inc/user/header.php';
// session_start();
class cartController extends Controller
{
    private $db, $userId;

    public function __construct()
    {
        // $this->model('OrderModel');
        $this->model('CartModel');
        $this->db = new Database();
        session_start();
        $this->userId = $_SESSION['user_id'] ?? 0;
    }

    public function index()
    {
        $carts = $this->db->getByCategoryId('cart_view', 'user_id', $this->userId);
        $data = [
            'carts' => $carts
        ];
        $this->view('pages/cart', $data);
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

    public function getQtyForEachItem()
    {
        if (isset($_POST['item_id'])) {
            $itemId = $_POST['item_id'];
        } 
        $cartValue = $this->db->getTotalCartCount('cart', 'item_id', $itemId);
        $menuItemValue = $this->db->getTotalCartCount('menu', 'id', $itemId);
        if($cartValue == $menuItemValue){
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
}
