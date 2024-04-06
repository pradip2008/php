<?php
// Define variables and initialize with empty values
$uploadStatus = $fileName = $fileType = $fileSize = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is selected
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // File information
        $fileName = basename($_FILES["file"]["name"]);
        $fileType = $_FILES["file"]["type"];
        $fileSize = $_FILES["file"]["size"];

        // Check file size (max 5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            $uploadStatus = "Sorry, your file is too large. Max size is 5MB.";
        } else {
            // Upload directory
            $uploadDir = "uploads/";

            // Check if the directory exists, if not, create it
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Path to upload file
            $targetPath = $uploadDir . $fileName;

            // Attempt to move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
                $uploadStatus = "File uploaded successfully.";
            } else {
                $uploadStatus = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $uploadStatus = "Please select a file to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>

<h2>File Upload</h2>
<form method="post" enctype="multipart/for


