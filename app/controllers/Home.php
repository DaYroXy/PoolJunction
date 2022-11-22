<?php

    class Home extends Controller {
        // contains the new Model() for the specific model
        private $homeModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()

        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Home',
                'description' => 'This is the index page.'
            ];
            
            // Load index to client
            $this->view('pages/home', $data);
        }

    }