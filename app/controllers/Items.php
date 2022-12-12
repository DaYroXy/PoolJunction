<?php

    class Items extends Controller {
        // contains the new Model() for the specific model
        private $productsModel;
        private $filesModel;
        private $categoryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->productsModel = $this->model('Product');
            $this->filesModel = $this->model('Files');
            $this->categoryModel = $this->model('Category');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Products",
                "products" => $this->productsModel->getProductsByUpdated(),
                "categories" => $this->categoryModel->getCategories(),
                "name" => '',
                "description" => '',
                "price" => '',
                "category" => '',
                "sold" => '',
                "quantity" => '',
                "name_err" => '',
                "description_err" => '',
                "price_err" => '',
                "quantity_err" => '',
                "sold_err" => '',
                "category_err" => '',
                "img_err" => ''
            ];

            // Load index to client
            $this->view('admin/products', $data);
        }

        public function delete($id = null) {

            if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['delete']) || $id === null) {
                redirect('items');
            }

            if($this->productsModel->deleteProduct($id)) {
                flash('product_message', 'Product Removed', 'alert alert-warning');
                redirect('items');
            } else {
                flash('product_message', 'Product Failed Removed', 'alert alert-danger');
            }
        }

        // Insert new product
        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] != 'POST') {
                redirect('items');
            }

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                "Admin_Page" => true,
                "page" => "Products",
                "products" => $this->productsModel->getProductsByUpdated(),
                "categories" => $this->categoryModel->getCategories(),
                "name" => trim($_POST['name']),
                "description" => trim($_POST['description']),
                "price" => trim($_POST['price']),
                "category" => trim($_POST['category']),
                "sold" => trim($_POST['sold']),
                "quantity" => trim($_POST['quantity']),
                "name_err" => '',
                "description_err" => '',
                "price_err" => '',
                "quantity_err" => '',
                "sold_err" => '',
                "category_err" => '',
                "img_err" => ''
            ];


            // Validate data
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }
            if(!($data['price'] >= 0) || !is_numeric($data['price'])) {
                $data['price_err'] = 'Please enter price amount';
            }

            if(!($data['sold'] >= 0) || !is_numeric($data['sold'])) {
                $data['sold_err'] = 'Please enter sold amount';
            }

            if(!($data['quantity'] >= 0) || !is_numeric($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }
            if(!($data['category'] >= 0) || $data['category'] === "None") {
                $data['category_err'] = 'Please select category';
            }
            $data['img_err'] = $this->filesModel->validateFile($_FILES['img']);

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['description_err']) && empty($data['price_err']) && empty($data['quantity_err']) && empty($data['sold_err']) && empty($data['category_err']) && empty($data['img_err'])) {
                $hashed_file = $this->filesModel->hash_file($_FILES['img']);
                if(!$this->filesModel->fileExist("../public/content/products/", $hashed_file)){
                    $this->filesModel->uploadFile($_FILES['img'], "../public/content/products/", $hashed_file);
                }
                $data['img'] = $hashed_file;
                $data['category_id'] = $data['category'];
                if($this->productsModel->addProduct($data)) {
                    flash('product_message', 'Product Added', 'alert alert-success');
                    redirect('items');
                } else {
                    flash('product_message', 'Product Failed Added', 'alert alert-danger');
                }
            }

            // Load index to client
            $this->view('admin/products', $data);
        }

         // Insert new product
         public function update($id = null) {

            $product = $this->productsModel->getProductById($id);
            print_r(empty($product));
            die();
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] != 'POST' || $id === null) {
                redirect('items');
            }

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                "Admin_Page" => true,
                "page" => "Products",
                "products" => $this->productsModel->getProductsByUpdated(),
                "categories" => $this->categoryModel->getCategories(),
                "name" => trim($_POST['name']),
                "description" => trim($_POST['description']),
                "price" => trim($_POST['price']),
                "category" => trim($_POST['category']),
                "sold" => trim($_POST['sold']),
                "quantity" => trim($_POST['quantity']),
                "name_err" => '',
                "description_err" => '',
                "price_err" => '',
                "quantity_err" => '',
                "sold_err" => '',
                "category_err" => '',
                "img_err" => ''
            ];

            // Validate data
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            if(!($data['price'] >= 0) || !is_numeric($data['price'])) {
                $data['price_err'] = 'Please enter price amount';
            }

            if(!($data['sold'] >= 0) || !is_numeric($data['sold'])) {
                $data['sold_err'] = 'Please enter sold amount';
            }

            if(!($data['quantity'] >= 0) || !is_numeric($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if(!($data['category'] >= 0) || $data['category'] === "None") {
                $data['category_err'] = 'Please select category';
            }

            if(empty($data['category_err']) && empty($data['name_err']) && empty($data['description_err']) && empty($data['price_err']) && empty($data['quantity_err']) && empty($data['sold_err'])) {
                $data['category_id'] = $data['category'];
                $data['id'] = $id;
                if($this->productsModel->updateProduct($data, $id)) {
                    flash('product_message', 'Product Updated', 'alert alert-success');
                    redirect('items');
                } else {
                    flash('product_message', 'Product Failed Updated', 'alert alert-danger');
                }
            }


            // Load index to client
            $this->view('admin/products', $data);
        }

        // get product by id
        public function get($id) {
            print_r(json_encode($this->productsModel->getProductAndCategoryById($id)));
        }


    }