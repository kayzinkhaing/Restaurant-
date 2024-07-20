<?php 

class userController extends Controller
{
    private $db;
    public function __construct(){
        $this->model('UserModel');
        $this->db =  new Database();
    }
    
    public function index(){
        $users = $this->db->readAll('users');
        $data = [
            'users' => $users
        ];
        $this->view('admin/user', $data);
    }


}