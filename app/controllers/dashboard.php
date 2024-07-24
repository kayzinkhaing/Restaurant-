<?php
class dashboard extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();   
    }

    // public function admin()
    // {
    //     $this->view('admin/dashboard');

    // }
    // public function logout(){
    //     $this->view('pages/login');
    // }
    public function admin()
{
    $menu = $this->db->getTotalCount('view_menu');
    $category = $this->db->getTotalCount('category');
    $users = $this->db->getTotalCount('users');
    $order = $this->db->getTotalCount('cart_view'); // Include the order count
    // $seat = $this->db->getTotalCount('seat'); // Include the order count

    $data = [
        'menu' => $menu,
        'category' => $category,
        'users' => $users,
        'order' => $order, // Add order to data array
        // 'seat' => $seat, // Add order to data array
    ];
    $this->view('admin/dashboard', $data);
}

public function logout()
{
    $this->view('pages/index');
}


}
