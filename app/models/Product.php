<?php

    class Product {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // Get all products
        public function getProducts() {
            $this->db->query('SELECT * FROM products');
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

    }