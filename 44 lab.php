<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encoded Form Data Display</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <h1>Encoded Form Data Display</h1>
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
        var formDataArray = $('#myForm').serializeArray();
        var displayHtml = '<h2>Form Data:</h2><ul>';
        
        // Iterate over the form data array and construct HTML to display it
        $.each(formDataArray, function(index, field) {
          displayHtml += '<li><strong>' + field.name + ':</strong> ' + field.value + '</li>';
        });
        
        displayHtml += '</ul>';
        $('#displayData').html(displayHtml);
      });
    });
  </script>
</body>
</html>

