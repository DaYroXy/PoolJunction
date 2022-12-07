<?php

    class Cart extends Controller {
        // contains the new Model() for the specific model
        private $cartModel;

        public function __construct() {

            if(!isLoggedIn()) {
                redirect('/login');
            }
            // Load correct Model, call Controller->model(), will results in new *Post()*
            $this->cartModel = $this->model('CartModel');
        }

        // Index Page
        public function index() {
            // Data to send to index
            $data = [
                'title' => 'Cart',
                'theme' => 'white',
                'scroll-color' => false,
                'description' => 'This is the Cart page.',
                'cart' => $this->cartModel->getCart(),
                'cart_total' => $this->cartModel->getTotalPrice()
            ];
            
            // Load index to client
            $this->view('pages/cart', $data);
        }

        // Add to cart
        public function add($id) {
            if($_SERVER['REQUEST_METHOD'] !== "POST") {
                return false;
            }
            if($this->cartModel->addToCart($id)) {
                flash('cart_message', 'Product added to cart');
                redirect('/cart');
            } else {
                flash('cart_message', 'Something went wrong, please try again.', 'alert alert-danger');
                redirect('/cart');
            }
        }

        // Update cart
        public function update($id) {
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                if($_POST['method'] === "+") {

                    if(!$this->cartModel->isEnoughQuantity($id)) {
                        flash('cart_message', 'Not enough quantity in stock', 'alert alert-danger');
                        redirect('cart');
                        die();
                    }
                    if($this->cartModel->increaseQuantity($id)) {
                        flash('cart_message', 'Product quantity increased.');
                        redirect('cart');
                    } else {
                        flash('cart_message', 'Something went wrong, please try again.', 'alert alert-danger');
                        redirect('cart');
                    }

                } else if ($_POST['method'] === '-') {
                    if($this->cartModel->decreaseQuantity($id)) {
                        flash('cart_message', 'Product quantity decreased.', 'alert alert-info');
                        redirect('cart');
                    } else {
                        flash('cart_message', 'Something went wrong, please try again.', 'alert alert-danger');
                        redirect('cart');
                    }
                }
                die("something went wrong.");
            }
        }

        // Update cart
        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                if($this->cartModel->deleteProduct($id)) {
                    flash('cart_message', 'Product deleted', 'alert alert-danger');
                    redirect('cart');
                } else {
                    flash('cart_message', 'Something went wrong, please try again.', 'alert alert-danger');
                    redirect('cart');
                }
            }
        }

    }