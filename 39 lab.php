<?php
// Define variables and initialize with empty values
$uploadStatus = $fileName = $fileType = $fileSize = "";

// Function to validate file type
function isValidFileType($file) {
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif', 'application/pdf');
    return in_array($file['type'], $allowedTypes);
}

// Function to validate file size
function isValidFileSize($file) {
    // Max file size: 5MB
    return $file['size'] <= 5 * 1024 * 1024;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is selected
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // File information
        $fileName = basename($_FILES["file"]["name"]);
        $fileType = $_FILES["file"]["type"];
        $fileSize = $_FILES["file"]["size"];

        // Validate file type
        if (!isValidFileType($_FILES["file"])) {
            $uploadStatus = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } // Validate file size
        elseif (!isValidFileSize($_FILES["file"])) {
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
    <title>File Upload with Validation</title>
</head>
<body>

<h2>File Upload</h2>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Select File: <input type="file" name="file">
    <input type="submit" value="Upload" name="submit">
</form>

<?php 
// Display upload status
if(!empty($uploadStatus)) {
    echo "<p>$uploadStatus</p>";
}
?>

</body>
</html>

