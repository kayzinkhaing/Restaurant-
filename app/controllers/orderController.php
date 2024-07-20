<?php

class orderController extends Controller
{
    private $db;

    public function __construct(){
        $this->model('OrderModel');
        $this->db = new Database();
    }

    public function index(){
        $orders = $this->db->readAll('user_order');
        $data = [
            'orders' => $orders
        ];
        $this->view('admin/order', $data);
    }

    public function create(){
        $this->view('admin/Order/addOrder');
    }

    // public function store(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    //         $userId = $_POST['user_id'];
    //         $itemId = $_POST['item_id'];
    //         $quantity = $_POST['Quantity'];
    //         $totalAmount = $_POST['total_amount'];
    //         $status = $_POST['Status'];
    //         $seatNo = $_POST['seat_no'];

    //         // Create new order
    //         $order = new OrderModel();
    //         $order->setUserId($userId);
    //         $order->setItemId($itemId);
    //         $order->setQuantity($quantity);
    //         $order->setTotalAmount($totalAmount);
    //         $order->setStatus($status);
    //         $order->setTable_number($seatNo);
    //         $order->setRegDate(date('Y-m-d H:i:s'));

    //         // Save order to database
    //         $orderCreated = $this->db->create('orders', $order->toArray());
    //         if ($orderCreated) {
    //             setMessage('success', 'Order Created Successfully');
    //             redirect('orderController/index');
    //         } else {
    //             setMessage('error', 'Order Creation Failed');
    //             redirect('orderController/create');
    //         }
    //     }
    // }

    public function edit($id){
        $order = $this->db->getById('orders', $id);
        $data = [
            'order' => $order,
        ];
        $this->view('admin/Order/edit', $data);
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['id'], $_POST['user_id'], $_POST['item_id'], $_POST['Quantity'], $_POST['total_amount'], $_POST['Status'], $_POST['table_number'])) {
                $id = $_POST['id'];
                $userId = $_POST['user_id'];
                $itemId = $_POST['item_id'];
                $quantity = $_POST['Quantity'];
                $totalAmount = $_POST['total_amount'];
                $status = $_POST['Status'];
                $seat_id = $_POST['table_number'];

                // Create a new OrderModel instance and set its properties
                $order = new OrderModel();
                $order->setId($id);
                $order->setUserId($userId);
                $order->setItemId($itemId);
                $order->setQuantity($quantity);
                $order->setTotalAmount($totalAmount);
                $order->setStatus($status);
                $order->setSeatId($seat_id);
                
                // Update the order in the database
                $updateOrder = $this->db->update('orders', $order->getId(), $order->toArray());

                if ($updateOrder) {
                    setMessage('success', 'Order Updated Successfully');
                    redirect('orderController/index');
                } else {
                    setMessage('error', 'Failed to Update Order');
                    redirect('orderController/index');
                }
            } else {
                setMessage('error', 'Missing required fields');
                redirect('orderController/index');
            }
        }
    }

    public function destroy($id){
        if ($id && is_numeric($id)) {
            $order = new OrderModel();
            $order->setId($id);

            // Delete the order from the database
            $isdestroy = $this->db->delete ('orders', $order->getId());

            if ($isdestroy) {
                setMessage('success', 'Order Deleted Successfully');
            } else {
                setMessage('error', 'Failed to Delete Order');
            }
        } else {
            setMessage('error', 'Invalid Order ID');
        }

        redirect('orderController/index');
    }
}
