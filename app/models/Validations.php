<?php

    class Validations {

        public function __construct() {
            
        }

        // Validate First Name
        public function FirstName($first_name) {
            if(empty($first_name)) {
                return 'Please enter your name';
            } else {
                if (preg_match('/[\'0-9^£!$%&*\/\\\()}{@#~?><>.,|=_+¬-]/', $first_name)) {
                    // one or more of the 'special characters' found in $string
                    return 'Please enter a valid name';
                }
            }
            return '';
        }

        // Validate Last Name
        public function LastName($last_name) {
            return $this->FirstName($last_name);
        }

        // Validate Full Name
        public function FullName($full_name) {
            return $this->FirstName($full_name);
        }

        
        // Validate Email
        public function Email($email) {
            // is valid email
            if(empty($email)) {
                return 'Please enter your email';
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return 'Please enter a valid email';
                }
            }
            return '';
        }

        // Validate Password
        public function Password($password) {
            if(empty($password)) {
                return 'Please enter your password';
            } else {
                if (strlen($password) < 6) {
                    return 'Password must be at least 6 characters';
                }
            }
            return '';
        }

        // Validate Password
        public function PasswordVerify($password, $password_verify) {
            if($password !== $password_verify) {
                return 'Passwords do not match';
            }
            return '';
        }

        // Validate Street
        public function Street($street) {
            if(empty($street)) {
                return 'Please enter your street';
            }
            return '';
        }

        // Validate Zip
        public function ZipCode($zipcode) {
            if(empty($zipcode) || (!preg_match("/^[0-9]+$/", $zipcode))) {
                return 'Please enter your Zip Code';
            } else {
                if (strlen($zipcode) < 5) {
                    return 'Zip Code must be at least 5 characters';
                }
            }
            return '';
        }

        // Validate City
        public function City($city) {
            if(empty($city)) {
                return 'Please enter your city';
            }
            return '';
        }
       
        // Validate Phone
        public function Phone($phone) {
            if(empty($phone)) {
                return 'Please enter your phone.';
            } else {
                $phone = preg_replace('/\D/', '', $phone);
                if(strlen($phone) !== 10 || !str_starts_with($phone, '05')) {
                    return 'Phone number is invalid';
                }
            }
            return '';
        }

    }