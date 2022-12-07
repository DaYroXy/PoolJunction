<?php

    class CartModel {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // insert into cart db
        public function addToCart($id) {
            if($item = $this->isProductInCart($id)) {
                if($this->increaseQuantity($item->id)) {
                    return true;
                }
                return false;
            }

            $this->db->query('INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)');
            $this->db->bind(':user_id', $_SESSION['user']['id']);
            $this->db->bind(':product_id', $id);
            $this->db->bind(':quantity', 1);
            if($this->db->execute()) {
                $this->updateCartSession();
                return true;
            } else {
                $this->updateCartSession();
                return false;
            }

        }

        // Get Item By Id
        public function getItemById($id) {
            $this->db->query('SELECT * FROM cart WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // Get cart inner join on product
        public function getCart() {
            $this->db->query('SELECT cart.id, cart.quantity, cart.product_id, products.description, products.name, products.price, products.img FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id');
            $this->db->bind(':user_id', $_SESSION['user']['id']);
            $results = $this->db->resultSet();
            return $results;
        }

        // if product is in cart for this user
        public function isProductInCart($id) {
            $this->db->query('SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id');
            $this->db->bind(':user_id', $_SESSION['user']['id']);
            $this->db->bind(':product_id', $id);
            $row = $this->db->single();
            // return product id
            if($this->db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }

        }

        // if enough quantity in stocks
        public function isEnoughQuantity($id) {
            $this->db->query('SELECT *, cart.quantity as cartQuantity, products.quantity as productQuantity FROM cart INNER JOIN products ON cart.product_id WHERE cart.id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            if($row->cartQuantity < $row->productQuantity) {
                return true;
            }

            return false;
        }

        // increase cart product quantiy by 1
        public function increaseQuantity($id) {
            $this->db->query('UPDATE cart SET quantity = quantity + 1 WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                $this->updateCartSession();
                return true;
            } else {
                $this->updateCartSession();
                return false;
            }
        }

        // decrease cart product quantiy by 1
        public function decreaseQuantity($id) {

            $product = $this->getItemById($id);
            if($product && $product->quantity <= 1) {
                if($this->deleteProduct($id)) {
                    return true;
                } 
                return false;
            }

            // decrease quantity by 1 if quantity is more than 1
            $this->db->query('UPDATE cart SET quantity = quantity - 1 WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                $this->updateCartSession();
                return true;
            }
            $this->updateCartSession();
            return false;
        }

        // delete cart product by id
        public function deleteProduct($id) {
            $this->db->query('DELETE FROM cart WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                $this->updateCartSession();
                return true;
            }

            $this->updateCartSession();
            return false;
        }

        // Get total price of cart
        public function getTotalPrice() {
            $this->db->query('SELECT SUM(products.price) AS total FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id');
            $this->db->bind(':user_id', $_SESSION['user']['id']);
            $results = $this->db->single();
            return $results;
        }

        // update cart session
        public function updateCartSession() {
            $this->db->query('SELECT SUM(quantity) as total_items FROM cart WHERE user_id = :user_id');
            $this->db->bind(':user_id', $_SESSION['user']['id']);
            $results = $this->db->single();
            $_SESSION['cart'] = $results->total_items;
        }
    }