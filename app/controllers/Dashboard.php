<?php

    class Dashboard extends Controller {
        // contains the new Model() for the specific model
        private $userModel;
        private $contactModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->userModel = $this->model('User');
            $this->contactModel = $this->model('Contacts');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Dashboard",
                "usersCount" => $this->userModel->getAllUsersCount(),
                "contactCount" => $this->contactModel->getAllContactsCount(),
            ];

            // Load index to client
            $this->view('admin/dashboard', $data);
        }


    }