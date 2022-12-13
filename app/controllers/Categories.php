<?php

    class Categories extends Controller {
        // contains the new Model() for the specific model
        private $categoryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->categoryModel = $this->model('Category');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Categories",
                'categories' => $this->categoryModel->getCategories(),
                "name" => '',
                "description" => '',
                "name_err" => '',
                "description_err" => '',
            ];

            // Load index to client
            $this->view('admin/category', $data);
        }

        // Get Category by ID
        public function get($id) {
            print_r(json_encode($this->categoryModel->getCategoryById($id)));
        }

        // Add Category
        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] !== 'POST') {
                redirect('categories');
            }
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Categories",
                'categories' => $this->categoryModel->getCategories(),
                "name" => trim($_POST['name']),
                "description" => trim($_POST['description']),
                "name_err" => '',
                "description_err" => '',
            ];

            // Validate data
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            }

            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter a description';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['description_err'])) {
                // Validated
                if($this->categoryModel->addCategory($data)) {
                    flash('category_message', 'Category Added');
                    redirect('categories');
                } else {
                    flash('category_message', 'Something went wrong...', 'alert alert-danger');
                    redirect('categories');
                }
            } else {
                // Load index to client
                $this->view('admin/category', $data);
            }
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "page" => "Categories",
                'categories' => $this->categoryModel->getCategories(),
                "name" => '',
                "description" => '',
                "name_err" => '',
                "description_err" => '',
            ];

            // Load index to client
            $this->view('admin/category', $data);
        }

        // Delete category
        public function delete($id = null) {
            if($_SERVER['REQUEST_METHOD'] !== 'POST' || $id === null || !isset($_POST['delete_all'])) {
                flash('category_message', 'Please check the box.', 'alert alert-danger');
                redirect('categories');
            }

            if($this->categoryModel->deleteCategory($id)) {
                flash('category_message', 'Category Removed', 'alert alert-warning');
                redirect('categories');
            }

            flash('category_message', 'Something went wrong...', 'alert alert-danger');
            redirect('categories');
        }

        // Update category
        public function update($id = null) {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] !== 'POST' || $id === null) {
                redirect('categories');
            }
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Data to send to index
            $data = [
                "name" => trim($_POST['name']),
                "description" => trim($_POST['description']),
                "name_err" => '',
                "description_err" => '',
            ];

            // Validate data
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            }

            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter a description';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['description_err'])) {
                $data["id"] = $id;
                // Validated
                if($this->categoryModel->updateCategory($data)) {
                    flash('category_message', 'Category Updated');
                    redirect('categories');
                }
            }

            flash('category_message', 'Something Went Wrong...', 'alert alert-danger');
            redirect('categories');
        }

    }