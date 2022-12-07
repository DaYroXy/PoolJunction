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

        // Validate Image
        public function validateImage($img) {
            // Check if image is empty
            if(empty($img) || !isset($img) || $img['size'] === 0) {
                return "Please select an image";
            }

            // Check if image is valid
            if($img['type'] !== 'image/png' && $img['type'] !== 'image/jpeg' && $img['type'] !== 'image/gif') {
                return "Please select a valid image";
            }

            // Check if image is too big
            if($img['size'] > 50000000) {
                return "Please select an image smaller than 50MB";
            }

            return '';
        }

        // md5 file binary
        public function hash_imge($img) {
            // Get file name
            $filename = $img['name'];
            // Get file extension
            $fileExt = explode('.', $filename);
            $fileActualExt = strtolower(end($fileExt));
            // Get file hash
            $fileHash = md5_file($img['tmp_name']);
            // Create new file name
            $newFileName = $fileHash . "." . $fileActualExt;
            return $newFileName;
        }

        // if file exist in database
        public function fileExist($hash) {
            $this->db->query('SELECT * FROM gallery WHERE img = :img');
            $this->db->bind(':img', $hash);
            $row = $this->db->single();
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // insert into db
        public function insertImage($img) {
            $this->db->query('INSERT INTO gallery (img) VALUES (:img)');
            $this->db->bind(':img', $img);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // upload file to server
        public function uploadImage($img) {
            // Set file destination
            $fileDestination = '../public/content/gallery/' . $this->hash_imge($img);
            // Upload file
            if(move_uploaded_file($img['tmp_name'], $fileDestination)){
                return true;
            }
            // Return file name
            return false;
        }

        // Delete all images files
        public function deleteAllImagesFiles() {
            $files = glob("../public/content/gallery/*");
            print_r( $files);
            // foreach($files as $file) {
            //     if(file_exists($file)) {
            //         // unlink($file);
            //         print_r($file);
            //         echo "<br>";
            //     }
            // }
        }

        // Delete all images from db
        public function deleteAllImages() {
            $this->db->query('DELETE FROM gallery');
            if($this->db->execute()) {
                $this->deleteAllImagesFiles();
                return true;
            } else {
                return false;
            }
        }

    }