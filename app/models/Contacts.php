<?php

    class Contacts {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // insert into newsletter
        public function register($name, $email, $message) {
            $this->db->query('INSERT INTO contact(name, email, message) VALUES (:name, :email, :message)');
            $this->db->bind(':name', $name);
            $this->db->bind(':email', strtolower($email));
            $this->db->bind(':message', $message);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // check if email sent the past 5 minutes
        public function checkEmail($email) {
            $this->db->query('SELECT * FROM contact WHERE email = :email AND created_at > DATE_SUB(NOW(), INTERVAL 5 MINUTE)');
            $this->db->bind(':email', strtolower($email));
            $row = $this->db->single();
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }