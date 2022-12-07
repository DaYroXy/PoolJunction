<?php

    class Galleries {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // Get images from gallery db
        public function getImages() {
            $this->db->query('SELECT * FROM gallery');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get 10 images from gallery db
        public function getImagesLimit($limit) {
            $this->db->query('SELECT * FROM gallery LIMIT :limit');
            $this->db->bind(':limit', $limit);
            $results = $this->db->resultSet();
            return $results;
        }
    }