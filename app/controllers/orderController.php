<?php

class orderController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('OrderItemModel');
        $this->model('orderModel');
        $this->db = new Database();
    }

    // public function create(){
    //     $this->view('admin/Order/addOrder');
    // }
    public function index(){

        $order = $this->db->readAll('order_item');
        $data = [
            'order'=>$order
        ];

        $this->view('admin/order',$data);
    }
    public function create(){
        $this->view('admin/order');
    }
    public function success(){
        $this->view('pages/success');
    }

    public function store()
{
    // print_r("hello");
    // exit;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize input data
        $user_id = htmlspecialchars($_POST[$_SESSION['user_id']]);
        $totalQty = htmlspecialchars($_POST['totalQty']);
        $totalAmount = htmlspecialchars($_POST['totalAmount']);
        $carts = json_decode($_POST['carts'], true); // true for associative array, false for object

        // Create new order
        $order = new OrderModel();
        $order->setUserId($user_id);
        $order->setTotalQty($totalQty);
        $order->setTotalAmount($totalAmount);

        // Save order to database
        $orderCreated = $this->db->create('orders', $order->toArray());

        if ($orderCreated) {
            // Fetch the last inserted order ID
            $order_id = $orderCreated;

            // Create order items
            $orderItem = new OrderItemModel();

            foreach ($carts as $item) {
                $orderItem->setOrder_id($order_id);
                $orderItem->setMenu_id($item['menu_id']);
                $orderItem->setPrice($item['sale_price']);
                $orderItem->setQuantity($item['quantity']);
                $orderItem->setTotalAmount($item['total_amount']);

                
                // Save order item to database
                $this->db->create('orderitem', $orderItem->toArray());

                // Reduce menu quantity
                $this->db->updateMenuQuantity('menu', $item['menu_id'], $item['quantity']);
           

            // Assume user_ids is an array of user IDs for whom you want to delete the cart
            $user_ids = [$user_id]; // Add more user IDs if needed

            // Instantiate cartController and call deleteCart
            $cartController = new cartController();
            $cartController->deleteCart($user_ids);
        }
            setMessage('success', 'Order Created Successfully');
            redirect('orderController/success');
        } else {
            setMessage('error', 'Failed to Create Order');
            redirect('orderController/create');
        }
    } else {
        setMessage('error', 'Invalid Request Method');
        redirect('orderController/create');
    }
}
public function deleteCart($user_ids)
{
    // Check if the user IDs are valid and numeric
    if (is_array($user_ids) && !empty($user_ids)) {
        foreach ($user_ids as $user_id) {
            if (is_numeric($user_id)) {
                $cart = new cartModel();
                $cart->setUserId($user_id);

                // Assuming `delete` is a method in your database abstraction layer
                $isdestroy = $this->db->deleteByUserId('cart', ['user_id' => $cart->getUserId()]);

                if ($isdestroy) {
                    setMessage('success', 'Cart Deleted Successfully for User ID: ' . $user_id);
                } else {
                    setMessage('error', 'Failed to Delete Cart for User ID: ' . $user_id);
                }
            } else {
                setMessage('error', 'Invalid User ID: ' . $user_id);
            }
        }
    } else {
        setMessage('error', 'Invalid User IDs');
    }
}


}
