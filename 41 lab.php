<?php
// Assuming you have a MySQL database set up with a table named 'people' with columns 'id' and 'name'

// Step 1: Open a connection to the MySQL server
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$dbname = "your_database"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Find the correct person based on the query
$query = $_GET['query'];
$sql = "SELECT * FROM people WHERE name LIKE '%$query%'";
$result = $conn->query($sql);

// Step 3: Create an HTML table with the search results
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close MySQL connection
$conn->close();
?>

