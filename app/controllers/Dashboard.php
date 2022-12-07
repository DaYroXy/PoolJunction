<?php

    class Dashboard extends Controller {
        // contains the new Model() for the specific model


        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()

        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true
            ];

            // Load index to client
            $this->view('admin/dashboard', $data);
        }


    }