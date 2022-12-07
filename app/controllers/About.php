<?php

    class About extends Controller {
        // contains the new Model() for the specific model
        private $aboutModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()

        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'About',
                'theme' => 'dark',
                'scroll-color' => true,
                'description' => 'This is the About page.'
            ];
            
            // Load index to client
            $this->view('pages/about', $data);
        }

    }