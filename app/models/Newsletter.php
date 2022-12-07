<?php

    class NewsLetter {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // find user by email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM newsletter WHERE email = :email');
            $this->db->bind(':email', strtolower($email));
            $row = $this->db->single();
            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // insert into newsletter
        public function register($email) {
            $this->db->query('INSERT INTO newsletter (email) VALUES (:email)');
            $this->db->bind(':email', strtolower($email));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }