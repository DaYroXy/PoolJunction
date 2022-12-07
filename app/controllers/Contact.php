<?php

    class Contact extends Controller {
        // contains the new Model() for the specific model
        private $contactModel;
        private $validationModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->contactModel = $this->model('Contacts');
            $this->validationModel = $this->model('Validations');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Contact',
                'theme' => 'dark',
                'scroll-color' => true,
                'description' => 'This is the Contact page.',
                'name' => '',
                'email' => '',
                'message' => '',
                'name_err' => '',
                'email_err' => '',
                'message_err' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'title' => 'Contact',
                    'theme' => 'dark',
                    'scroll-color' => true,
                    'description' => 'This is the Contact page.',
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'message' => trim($_POST['message']),
                    'name_err' => '',
                    'email_err' => '',
                    'message_err' => ''
                ];

                // Validate name
                $data['name_err'] = $this->validationModel->FullName($data['name']);
                $data['email_err'] = $this->validationModel->Email($data['email']);
                if(empty($data['message'])) {
                    $data['message_err'] = 'Please enter your message';
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['message_err'])) {
                    // Validated
                    if($this->contactModel->checkEmail($data['email'])) {
                        flash('contact_register', 'Your can only send messages every 5 minutes.', 'alert alert-danger');
                    } else {
                        if($this->contactModel->register($data['name'], $data['email'], $data['message'])) {
                            flash('contact_register', 'Your message have been sent.');
                        } else {
                            die('Something went wrong');
                        }
                    }
                } 
            }
            
            // Load index to client
            $this->view('pages/contact', $data);
        }

    }