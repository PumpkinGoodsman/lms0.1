<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['folderName']) && !empty($_POST['folderName'])) {
            $folderName = $_POST['folderName'];
            $sourceDirectory = "./uploads/" . $folderName; // Assuming images are in the "uploads" folder

            $destinationDirectory = "./serveruploads"; // Destination folder on the server

            if (!file_exists($sourceDirectory)) {
                echo "Source directory does not exist.";
            } else {
                $files = glob($sourceDirectory . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE); // Allow only specific image file formats
                foreach ($files as $file) {
                    $fileName = basename($file);
                    $destinationFile = $destinationDirectory . "/" . $fileName;
                    if (copy($file, $destinationFile)) {
                        echo "File " . htmlspecialchars($fileName) . " has been uploaded successfully.<br>";
                    } else {
                        echo "Failed to upload file: " . htmlspecialchars($fileName) . "<br>";
                    }
                }
            }
        } else {
            echo "Folder name is required.";
        }
    }
    ?>