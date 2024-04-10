<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Data Display</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>Form Data:
  <h1>Form Data Display</h1>
  <form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="message">Message:</label><br>
    <textarea id="message" name="message"></textarea><br><br>
    
    <button type="button" id="submitButton">Submit</button>
  </form>
  
  <div id="displayData"></div>

  <script>
    $(document).ready(function() {
      $('#submitButton').click(function() {
        var formData = $('#myForm').serialize();
        $('#displayData').html('<h2>Form Data:</h2>' + formData);
      });
    });
  </script>
</body>
</html>

