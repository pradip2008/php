<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Text File</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <h1>Update Text File</h1>
  <button id="updateButton">Update Text File</button>

  <script>
    $(document).ready(function() {
      $('#updateButton').click(function() {
        $.ajax({
          url: 'update_file.php', // PHP script that handles file update
          type: 'POST',
          data: {content: 'New content to write into the file'}, // Replace with the content you want to write
          success: function(response) {
            alert('File updated successfully!');
          },
          error: function(xhr, status, error) {
            console.error('Error updating file:', error);
            alert('Error updating file. Please try again.');
          }
        });
      });
    });
  </script>
</body>
</html>





a<?php
// File to update
$file = 'example.txt';

// Content to write to the file
$content = $_POST['content'];

// Write content to the file
file_put_contents($file, $content);

// Respond to the AJAX request
echo 'File updated successfully!';
?>

