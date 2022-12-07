<?php

    class Category {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // Get all categories
        public function getCategories() {
            $this->db->query('SELECT * FROM products_category');
            $results = $this->db->resultSet();
            return $results;
        }

    }