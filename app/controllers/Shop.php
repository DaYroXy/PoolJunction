<?php

    class Shop extends Controller {
        // contains the new Model() for the specific model
        private $productModel;
        private $categoryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->productModel = $this->model('Product');
            $this->categoryModel = $this->model('Category');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Shop',
                'theme' => 'white',
                'scroll-color' => false,
                'description' => 'This is the Shop page.',
                'products_category' => $this->categoryModel->getCategories(),
                'products' => '',
                'name' => '',
                'category' => '',
                'min' => '',
                'max' => ''
            ];
            // search for products category name and price between
            $_GET['name'] = isset($_GET['name']) ? $_GET['name'] : '';
            $_GET['category'] = isset($_GET['category']) ? $_GET['category'] : '';
            $_GET['min'] = isset($_GET['min']) ? $_GET['min'] : '';
            $_GET['max'] = isset($_GET['max']) ? $_GET['max'] : '';
            
            $data['name'] = $_GET['name'];
            $data['category'] = $_GET['category'];
            $data['min'] = $_GET['min'];
            $data['max'] = $_GET['max'];

            // Found category
            $data['products'] = $this->productModel->searchProducts($_GET['name'], $_GET['category'], $_GET['min'], $_GET['max']);
        
            // Load index to client
            $this->view('pages/shop', $data);
        }

    }