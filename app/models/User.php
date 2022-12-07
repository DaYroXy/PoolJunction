<?php

    class User {
        private $db;

        // Main constructor
        public function __construct() {
            $this->db = new Database();
        }

        // Add User Address
        public function addAddress($data) {
            $this->db->query('INSERT INTO users_address (user_id, street, additional_information, zip_code, city) VALUES (:user_id, :street, :additional_information, :zip_code, :city)');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':street', $data['street']);
            $this->db->bind(':additional_information', $data['additional_information']);
            $this->db->bind(':zip_code', $data['zip_code']);
            $this->db->bind(':city', $data['city']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Find user by email address
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', strtolower($email));

            // Execute and return rows, we only want to check if email exists so we dont need to store the data
            $this->db->single();
            
            // if email exists
            if($this->db->rowCount() > 0) {
                return true;
            } 

            return false;
        }

        // Register User
        public function register($data) {
            $this->db->query('INSERT INTO users (first_name, last_name, phone, email, password) VALUES (:first_name, :last_name, :phone, :email, :password)');
            // Bind values
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':email', strtolower($data['email']));
            
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->bind(':password', $hashed_password);
            // Execute
            if($this->db->execute()) {
                $data['user_id'] = $this->db->getInsertedId();
                if($this->addAddress($data)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        // login user
        public function login($email, $password) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        // Create user session
        public function createUserSession($loggedInUser) {
            $_SESSION['user']['id'] = $loggedInUser->id;
            $_SESSION['user']['first_name'] = $loggedInUser->first_name;
            $_SESSION['user']['last_name'] = $loggedInUser->last_name;
            $_SESSION['user']['phone'] = $loggedInUser->phone;
            $_SESSION['user']['email'] = $loggedInUser->email;
            $_SESSION['user']['timestamp'] = time();
            $_SESSION['cart'] = 0;
        }
        
    }