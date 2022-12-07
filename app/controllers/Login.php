<?php

    class Login extends Controller {
        // contains the new Model() for the specific model
        private $validations;
        private $userModel;
        private $cartModel;

        public function __construct() {
            // Check if user is logged in.
            if(isLoggedIn()) {
                redirect('');
            }
            
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->validations = $this->model('Validations');
            $this->userModel = $this->model('User');
            $this->cartModel = $this->model('CartModel');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Login',
                'theme' => 'dark',
                'scroll-color' => false,
                'description' => 'This is the Login page.',
                'login_data' => [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ]
            ];

            
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data['login_data'] = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];  
                
                $data['login_data']['email_err'] = $this->validations->Email($data['login_data']['email']);
                $data['login_data']['password_err'] = $this->validations->Password($data['login_data']['password']);
                
                // check if email exists
                if(!$data['login_data']['email_err'] && !$this->userModel->findUserByEmail($data['login_data']['email'])) {
                    $data['login_data']['email_err'] = 'Email does not exist';
                }

                // login user
                if(!$data['login_data']['email_err'] && !$data['login_data']['password_err']) {
                    $loggedInUser = $this->userModel->login($data['login_data']['email'], $data['login_data']['password']);
                    if($loggedInUser) {
                        $this->userModel->createUserSession($loggedInUser);
                        $this->cartModel->updateCartSession();
                        flash('login_success', 'Welcome back, '.$loggedInUser->first_name.' '.$loggedInUser->last_name.'! You are logged in.', 'alert alert-success');
                        redirect("home");
                    } else {
                        $data['login_data']['password_err'] = 'Password incorrect';
                    }
                }

            }

            // Load index to client
            $this->view('pages/login', $data);
        }

    }