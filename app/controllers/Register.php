<?php

    class Register extends Controller {
        // contains the new Model() for the specific model
        private $validations;
        private $userModel;

        public function __construct() {
            // Check if user is logged in.
            if(isLoggedIn()) {
                redirect('');
            }
            
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->validations = $this->model('Validations');
            $this->userModel = $this->model('User');
        }

        // Index Page
        public function index() {

            // Data to send to index
            $data = [
                'title' => 'Register',
                'theme' => 'dark',
                'scroll-color' => false,
                'description' => 'This is the Register page.',
                'register_data' => [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'password' => '',
                    'password_verify' => '',
                    'street' => '',
                    'additional_information' => '',
                    'zip_code' => '',
                    'city' => '',
                    'phone' => '',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_verify_err' => '',
                    'street_err' => '',
                    'additional_information_err' => '',
                    'zip_code_err' => '',
                    'city_err' => '',
                    'phone_err' => '',
                    'tos_err' => ''
                ]
            ];

            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data['register_data'] = [
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'password_verify' => trim($_POST['password_verify']),
                    'street' => trim($_POST['street']),
                    'additional_information' => trim($_POST['additional_information']),
                    'zip_code' => trim($_POST['zip_code']),
                    'city' => trim($_POST['city']),
                    'phone' => trim($_POST['phone']),
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_verify_err' => '',
                    'street_err' => '',
                    'additional_information_err' => '',
                    'zip_code_err' => '',
                    'city_err' => '',
                    'phone_err' => '',
                    'tos_err' => '',
                ];

                // validate data
                $data['register_data']['first_name_err'] = $this->validations->FirstName($data['register_data']['first_name']);
                $data['register_data']['last_name_err'] = $this->validations->LastName($data['register_data']['last_name']);
                $data['register_data']['email_err'] = $this->validations->Email($data['register_data']['email']);
                $data['register_data']['password_err'] = $this->validations->Password($data['register_data']['password']);
                $data['register_data']['password_verify_err'] = $this->validations->PasswordVerify($data['register_data']['password'],$data['register_data']['password_verify']);
                $data['register_data']['zip_code_err'] = $this->validations->ZipCode($data['register_data']['zip_code']);
                $data['register_data']['city_err'] = $this->validations->City($data['register_data']['city']);
                $data['register_data']['phone_err'] = $this->validations->Phone($data['register_data']['phone']);
                
                if(empty($data['register_data']['email_err'])) {
                    if($this->userModel->findUserByEmail($data['register_data']['email'])) {
                        $data['register_data']['email_err'] = 'Email is already taken';
                    }
                }
                
                // Is TOS Accepted
                if(!isset($_POST['tos']) || $_POST['tos'] !== 'on') {
                    $data['register_data']['tos_err'] = 'You must accept the Terms of Service.';
                }

                // Check if register button was pressed
                if(!isset($_POST['register'])) {
                    redirect("register");
                }
                
                // If empty errors, then register
                if(empty($data['register_data']['first_name_err']) && empty($data['register_data']['last_name_err'])
                    && empty($data['register_data']['email_err']) && empty($data['register_data']['password_err'])
                    && empty($data['register_data']['password_verify_err']) && empty($data['register_data']['zip_code_err'])
                    && empty($data['register_data']['city_err']) && empty($data['register_data']['phone_err'])) {
                    if($this->userModel->register($data['register_data'])) {
                        flash('register_success', 'You are registerd and can log in');
                        redirect("login");
                    } else {
                        die("Something went wrong.");
                    }
                }
                
            }

            
            // Load index to client
            $this->view('pages/register', $data);
        }

    }