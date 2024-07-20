<?php

class cartController extends Controller
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
        $this->view('pages/cart',$data);
    }
}