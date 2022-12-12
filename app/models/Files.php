<?php

    class Files {
        // md5 file binary
        public function hash_file($file) {
            // Get file name
            $filename = $file['name'];
            // Get file extension
            $fileExt = explode('.', $filename);
            $fileActualExt = strtolower(end($fileExt));
            // Get file hash
            // $fileHash = hash_file("md5", $file['tmp_name']);
            $fileHash = md5_file($file['tmp_name']);
            // Create new file name
            $newFileName = $fileHash . "." . $fileActualExt;
            return $newFileName;
        }

        // if file exist
        public function fileExist($path, $name) {
            if(file_exists($path."/".$name)) {
                return true;
            }
            return false;
        }

                // Validate Image
        public function validateFile($file) {
            // Check if image is empty
            if(empty($file) || !isset($file) || $file['size'] === 0) {
                return "Please select an image";
            }

            // Check if image is valid
            if($file['type'] !== 'image/png' && $file['type'] !== 'image/jpeg' && $file['type'] !== 'image/gif') {
                return "Please select a valid image";
            }

            // Check if image is too big
            if($file['size'] > 50000000) {
                return "Please select an image smaller than 50MB";
            }

            return '';
        }

        // upload file to server
        public function uploadFile($file, $path, $hashed_name) {
            // Set file destination
            $path = $path . $hashed_name;
            // $fileDestination = '../public/content/gallery/';
            if($this->fileExist($file, $hashed_name)) {
                return true;
            }
            // Upload file
            if(move_uploaded_file($file['tmp_name'], $path)){
                return true;
            }
            // Return file name
            return false;
        }

    }