<?php

    class Messages extends Controller {
        // contains the new Model() for the specific model
        private $contactModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->contactModel = $this->model('Contacts');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Contact",
                'contacts' => $this->contactModel->getAllContacts(),
                "name" => '',
                "description" => '',
                "name_err" => '',
                "description_err" => '',
            ];

            // Load index to client
            $this->view('admin/contact', $data);
        }

        // completed
        public function completed($id = null) {

            if($_SERVER['REQUEST_METHOD'] !== 'POST') {
                redirect('messages');
            }
            if($this->contactModel->completed($id)) {
                flash('contact_message', 'Contact has been completed');
                redirect('messages');
            }
            flash('contact_message', 'Something went wrong...', 'alert alert-danger');
            redirect('messages');
        }

        // uncompleted
        public function uncompleted($id = null) {

            if($_SERVER['REQUEST_METHOD'] !== 'POST') {
                redirect('messages');
            }
            if($this->contactModel->uncompleted($id)) {
                flash('contact_message', 'Contact has been completed');
                redirect('messages');
            }
            flash('contact_message', 'Something went wrong...', 'alert alert-danger');
            redirect('messages');
        }


    }