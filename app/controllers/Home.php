<?php

    class Home extends Controller {
        // contains the new Model() for the specific model
        private $productModel;
        private $validationsModel;
        private $newsLetterModel;
        private $categoryModel;
        private $galleryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->productModel = $this->model('Product');
            $this->validationsModel = $this->model('Validations');
            $this->newsLetterModel = $this->model('Newsletter');
            $this->categoryModel = $this->model('Category');
            $this->galleryModel = $this->model('Galleries');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Home',
                'theme' => 'dark',
                'is_dark_bg' => true,
                'scroll-color' => true,
                'description' => 'This is the index page.',
                'popular_products' => $this->productModel->getMostSold(),
                'categories' => $this->categoryModel->getCategories(),
                'creation_images' => $this->galleryModel->getImagesLimit(10),
                'news_letter' => [
                    'email' => '',
                    'email_err' => '',
                    'email_success' => ''
                ]
            ];

            

            // If newsletter
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                if(isset($_POST['newsletter'])) {
                    $data['news_letter']['email'] = trim($_POST['email']);
                    $data['news_letter']['email_err'] = $this->validationsModel->Email($data['news_letter']['email']);
                    
                    if($this->newsLetterModel->findUserByEmail($data['news_letter']['email'])) {
                        $data['news_letter']['email_err'] = 'Email already exists.';
                    }

                    if(empty($data['news_letter']['email_err'])) {
                        if($this->newsLetterModel->register($data['news_letter']['email'])) {
                            $data['news_letter']['email_success'] = 'You have been added to the newsletter.';
                        } else {
                            $data['news_letter']['email_err'] = 'Something went wrong.';
                        }
                    }
                }
            }

            
            // Load index to client
            $this->view('pages/home', $data);
        }

    }