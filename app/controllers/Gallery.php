<?php

    class Gallery extends Controller {
        // contains the new Model() for the specific model
        private $galleryModel;

        public function __construct() {
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->galleryModel = $this->model('Galleries');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Gallery',
                'theme' => 'white',
                'scroll-color' => false,
                'description' => 'This is the Gallery page.',
                'images' => $this->galleryModel->getImages()
            ];
            
            // Load index to client
            $this->view('pages/gallery', $data);
        }

    }