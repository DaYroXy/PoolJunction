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

        // Get all contacts count
        public function getAllContactsCount() {
            $this->db->query('SELECT * FROM contact');
            $this->db->execute();
            return $this->db->rowCount();
        }

        // Get all contacts
        public function getAllContacts() {
            $this->db->query('SELECT * FROM contact ORDER BY completed ASC, created_at DESC');
            $this->db->execute();
            return $this->db->resultSet();
        }

        // set completed to true
        public function completed($id) {
            $this->db->query('UPDATE contact SET completed = 1 WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // set completed to false
        public function uncompleted($id) {
            $this->db->query('UPDATE contact SET completed = 0 WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }