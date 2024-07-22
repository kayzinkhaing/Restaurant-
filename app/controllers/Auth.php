<?php
 require_once APPROOT . '/views/inc/user/header.php'; 
//for user login and logout

class Auth extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('UserModel');
        $this->db = new Database();
    }

    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            isset($_POST['email_check']) &&
            $_POST['email_check'] == 1
        ) {
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                echo 'Sorry! email has already taken. Please try another.';
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Check user exists
            $email = $_POST['email'];
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
    
            if ($isUserExist) {
                setMessage('error', 'This email is already registered!');
                redirect('Pages/register');
            } else {
                // Validate entries
                $validation = new UserValidator($_POST);
                $data = $validation->validateForm();
    
                if (count($data) > 0) {
                    $this->view('pages/register', $data);
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $profile_image = 'default_profile.jpg';
                    $token = bin2hex(random_bytes(50));
    
                    // Hash Password before saving
                    $password = base64_encode($password);
    
                    $user = new UserModel();
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setToken($token);
                    $user->setProfileImage($profile_image);
                    $user->setRole(0);
                    $user->setIsLogin(0);
                    $user->setIsActive(0);
                    $user->setIsConfirmed(0);
                    $user->setDate(date('Y-m-d H:i:s'));

                    $userCreated = $this->db->create('users', $user->toArray());
//  echo($userCreated);
//  exit;
                    if ($userCreated) {
                        // Instantiate mail
                        $mail = new Mail();
                        $verify_token = URLROOT . '/auth/verify/' . $token;
                        // echo ($verify_token);
                        // exit;
                        $mailSent = $mail->verifyMail($email, $name, $verify_token);
                        //    echo($mailSent);
                        //    exit;
                        if ($mailSent) {
                            setMessage('success', 'Please check your mailbox for the verification link!');
                        } else {
                            setMessage('error', 'Error sending verification email. Please try again!');
                        }
                        redirect('pages/register');
                    } else {
                        setMessage('error', 'Error in registration. Please try again!');
                        redirect('pages/register');
                    }
                }
            }
        }
    }
    

    public function verify($token)
    {
        $user = $this->db->columnFilter('users', 'token', $token);

        if ($user) {
            $success = $this->db->setLogin($user['id']);

            // ($success) {
                setMessage(
                    'success',
                    'Successfully Verified .'
                );
            // } else {
            //     setMessage('error', 'Fail to Verify . Please try again!');
            // }
        } else {
            setMessage('error', 'Incrorrect Token . Please try again!');
        }

        redirect('pages/login');
    }

public function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $email = $_POST['email'];
        // echo($email);
        // exit;
        $password = base64_encode($_POST['password']); // Encode password for comparison
        // echo($password);
        // exit;

        $user = $this->db->columnFilter('users', 'email', $email);
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
        // exit; // Stop execution to check the output 
        if ($user) {
            if ($user['password'] === $password) {
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user_name']=$user['name'];
                $_SESSION['user_role']=$user['role'];
                // Check the user role
                if ($user['role'] == 1) {
                    // Admin user
                    setMessage('success', 'Login successful ! Welcome to restaurant admin dashboard.');
                    redirect('dashboard/admin');
                } elseif ($user['role'] == 0) {
                    // Regular user
                    setMessage('success', 'Login successful ! Welcome to restaurant.');
                    redirect('pages/home');
                } else {
                    setMessage('error', 'Invalid user role!');
                    redirect('pages/home');
                }
            } else {
                setMessage('error', 'Incorrect password!');
                redirect('Pages/login');
            }
        } else {
            setMessage('error', 'No user found with that email!');
            redirect('pages/login');
        }
    } else {
        $this->view('pages/login');
    }
}



public function logout()
{
    
    session_unset();
    session_destroy();
    redirect('pages/home');
}
}
