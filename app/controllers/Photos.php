<?php

    class Photos extends Controller {
        // contains the new Model() for the specific model
        private $galleryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()
            $this->galleryModel = $this->model('Galleries');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                "Admin_Page" => true,
                "img" => "",
                "images" => $this->galleryModel->getImages(),
            ];

            // Load index to client
            $this->view('admin/gallery', $data);
        }

        // Upload Image
        public function upload() {
            // Check if POST
            if($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Redirect to index
                redirect('admin/photos');
            }

            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "Admin_Page" => true,
                "images" => "",
                "img" => '',
                "img_err" => "",
            ];

            // Validate Image
            $data['img_err'] = $this->galleryModel->validateImage($_FILES['img']);
            
            if(empty($data['img_err'])) {
                $hashed_img_name = $this->galleryModel->hash_imge($_FILES['img']);

                // Check if image already exist
                if($this->galleryModel->fileExist($hashed_img_name)) {
                    $data['img_err'] = "Image already exist";
                } else {
                    // Upload image
                    $uploadedImage = $this->galleryModel->uploadImage($_FILES['img']);
                    if($uploadedImage) {
                        //  add image to db
                        if($this->galleryModel->insertImage($hashed_img_name)) {
                            // Redirect to index
                            flash('image_upload_success', 'Image uploaded successfully');
                        } else {
                            $data['img_err'] = "Something went wrong";
                        }
                    }
                }
            }
            
            $data["images"] = $this->galleryModel->getImages();
            
            // Load index to client
            $this->view('admin/gallery', $data);
        }

        // Delete All Image
        public function deleteAll() {
            // Check if POST
            if($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['DeleteAll'])) {
                // Redirect to index
                redirect('admin/photos');
            }

            $data = [
                "Admin_Page" => true,
                "images" => "",
                "delete_err" => "",
            ];

            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->galleryModel->deleteAllImagesFiles()) {
                // Redirect to index
                flash('image_delete_success', 'All images deleted successfully', 'alert alert-warning');
            } else {
                $data['delete_err'] = "Something went wrong";
            }
            $data["images"] = $this->galleryModel->deleteAllImagesFiles();
            // Load index to client
            $this->view('admin/gallery', $data);
        }


    }