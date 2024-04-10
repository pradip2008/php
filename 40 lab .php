<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instant Search</title>
  <style>
    #search-results {
      list-style: none;
      padding: 0;
    }
    #search-results li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <h1>Instant Search</h1>
  <input type="text" id="search-input" placeholder="Type a name...">
  <ul id="search-results"></ul>

  <script>
    document.getElementById('search-input').addEventListener('input', function() {
      var query = this.value.trim();
      var resultsList = document.getElementById('search-results');
      resultsList.innerHTML = ''; // Clear previous results

      if (query !== '') {
        // Send AJAX request to fetch results
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var results = JSON.parse(xhr.responseText);
            results.forEach(function(result) {
              var li = document.createElement('li');
              li.textContent = result;
              resultsList.appendChild(li);
            });
          }
        };
        xhr.send();
      }
    });
  </script>
</body>
</html>

