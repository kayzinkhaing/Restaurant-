<?php
//session_start();
class orderController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('OrderItemModel');
        $this->model('orderModel');
        $this->db = new Database();
    }

  
    public function index(){

        $order = $this->db->readAll('order_item');
        $data = [
            'order'=>$order
        ];

        $this->view('admin/order',$data);
    }
    // public function create(){
    //     $this->view('pages/success');
    // }
    
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve and sanitize input data
            $user_id = htmlspecialchars($_POST['user_id']);
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
               
                // Create order items and reduce quantity in menu table
                $orderItem = new OrderItemModel();

                foreach($carts as $item) {
                    $orderItem->setOrder_id($order_id);
                    $orderItem->setMenu_id($item['menu_id']);
                    $orderItem->setPrice($item['sale_price']);
                    $orderItem->setQuantity($item['quantity']);
                    $orderItem->setTotalAmount($item['total_amount']);

                    // Save order item to database
                    $this->db->create('orderitem', $orderItem->toArray());

                    // Reduce the quantity in the menu table
                    $this->db->updateMenuQuantity($item['menu_id'], $item['quantity']);
                }

                // Clear the cart
                $this->db->deleteByUserId('cart',['user_id' => $user_id]);

                setMessage('success', 'Order Created Successfully');
                redirect('pages/success');
            }
        } else {
            setMessage('error', 'Invalid Request Method');
            redirect('orderController/create');
        }
    }    
}

  
 

    

