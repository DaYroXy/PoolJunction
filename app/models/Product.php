<?php

    class Product {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // Get all products
        public function getProducts() {
            $this->db->query('SELECT *,products.id as id, products.created_at as created_at, products.description as description, products.name as name, products_category.name as categoryName FROM products INNER join products_category ON products.category_id = products_category.id');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get all products
        public function getProductsByDate() {
            $this->db->query('SELECT *,products.id as id, products.created_at as created_at, products.description as description, products.name as name, products_category.name as categoryName FROM products INNER join products_category ON products.category_id = products_category.id ORDER BY products.created_at DESC');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get all products
        public function getProductsById() {
            $this->db->query('SELECT *,products.id as id, products.created_at as created_at, products.description as description, products.name as name, products_category.name as categoryName FROM products INNER join products_category ON products.category_id = products_category.id ORDER BY products.id DESC');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get all products
        public function getProductsByUpdated() {
            $this->db->query('SELECT *,products.id as id, products.created_at as created_at, products.description as description, products.name as name, products_category.name as categoryName FROM products INNER join products_category ON products.category_id = products_category.id ORDER BY products.updated_at DESC');
            $results = $this->db->resultSet();
            return $results;
        }

        // search products
        public function searchProducts($name = '', $category = '', $min = 0, $max = 0) {
            if($category) {
                if($max > 0) {
                    $this->db->query('SELECT *, products.id as productId, products.name as productName, products.description as productDescription, products_category.id as categoryId, products_category.name as category_name, products.created_at as productCreated, products_category.created_at as categoryCreated FROM products INNER JOIN products_category ON products.category_id WHERE products.name LIKE :name AND products_category.name = :category AND price BETWEEN :min AND :max');
                    $this->db->bind(':max', $max);
                } else {
                    $this->db->query('SELECT *, products.id as productId, products.name as productName, products.description as productDescription, products_category.id as categoryId, products_category.name as category_name, products.created_at as productCreated, products_category.created_at as categoryCreated FROM products INNER JOIN products_category ON products.category_id WHERE products.name LIKE :name AND products_category.name = :category AND price >= :min');
                }
                $this->db->bind(':category', strtolower($category));
            } else {
                if($max > 0) {
                    $this->db->query('SELECT *, products.name as productName, products.description as productDescription, products.id as productId FROM products WHERE name LIKE :name AND price BETWEEN :min AND :max');
                    $this->db->bind(':max', $max);
                }else {
                    $this->db->query('SELECT *, products.name as productName, products.description as productDescription, products.id as productId FROM products WHERE name LIKE :name AND price >= :min');
                }
            }
            $this->db->bind(':min', $min);
            $this->db->bind(':name', '%'.$name.'%');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get top 10 most sold
        public function getMostSold() {
            $this->db->query('SELECT * FROM products ORDER BY sold DESC LIMIT 10');
            $results = $this->db->resultSet();
            return $results;
        }

        // get product by id
        public function getProductById($id) {
            $this->db->query('SELECT * FROM products WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // get product and category by id
        public function getProductAndCategoryById($id) {
            $this->db->query('SELECT *,products.id as id, products.created_at as created_at, products.description as description, products.name as name, products_category.name as categoryName FROM products INNER join products_category ON products.category_id = products_category.id WHERE products.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }
        
        // delete product
        public function deleteProduct($id) {
            $this->db->query('DELETE FROM products WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Add product to file
        public function addProduct($data) {
            $this->db->query('INSERT INTO products (name, description, category_id, price, sold, quantity, img) VALUES (:name, :description, :category_id, :price, :sold, :quantity, :img)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':sold', $data['sold']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':img', $data['img']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Update product
        public function updateProduct($data) {
            $this->db->query('UPDATE products SET name = :name, description = :description, category_id = :category_id, price = :price, sold = :sold, quantity = :quantity WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':sold', $data['sold']);
            $this->db->bind(':quantity', $data['quantity']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }