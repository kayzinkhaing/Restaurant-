<?php

class Pages extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function index()
    {
        $this->view('pages/home');
    }

    public function login()
    {
        $this->view('pages/login');
    }

    public function register()
    {
        $this->view('pages/register');
    }
    public function home()
    {
        $this->view('pages/home');
    }
    public function menu()
    {
        $this->view('pages/menu');
    }

    public function about()
    {
        $this->view('pages/about');
    }
    public function contact()
    {
        $this->view('pages/contact');
    }
    public function cart()
    {
        $this->view('pages/cart');
    }
    public function pay()
    {
        $this->view('pages/pay');
    }
    public function success()
    {
        $this->view('pages/success');
    }
    public function book()
    {
        $this->view('pages/booking');
    }

    public function dashboard()
    {
        // $income = $this->db->incomeTransition();
        // $expense = $this->db->expenseTransition();
        // $data = [
        //     'income' => $income,
        //     'expense' => $expense
        // ];
        // $this->view('pages/dashboard', $data);
        $this->view('pages/dashboard');
    }
}
