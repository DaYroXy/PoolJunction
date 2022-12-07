<?php

    class Products extends Controller {
        // contains the new Model() for the specific model
        private $productModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->productModel = $this->model('Product');
        }

        // Index Page
        public function index() {
            redirect('');
        }

        public function show($id) {

            if (!isset($id) || !is_numeric($id)) {
                redirect('');
            }

            // Data to send to index
            $data = [
                'title' => 'Cart',
                'theme' => 'white',
                'scroll-color' => false,
                'description' => 'This is the Cart page.',
                'product' => $this->productModel->getProductById($id),
            ];
            
            // Load index to client
            $this->view('pages/product', $data);
        }

    }