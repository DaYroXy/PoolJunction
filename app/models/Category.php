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

        // Get category by ID
        public function getCategoryById($id) {
            $this->db->query('SELECT * FROM products_category WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // Add category
        public function addCategory($data) {
            $this->db->query('INSERT INTO products_category (name, description) VALUES (:name, :description)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Delete category
        public function deleteCategory($id) {
            $this->db->query('DELETE FROM products_category WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Update category
        public function updateCategory($data) {
            $this->db->query('UPDATE products_category SET name = :name, description = :description WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }