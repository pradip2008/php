<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$database = "mydatabase"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>";

// Example SQL query
$sql = "SELECT * FROM your_table";

// Perform query
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Get the number of rows in the result set
$num_rows = mysqli_num_rows($result);
echo "Number of rows: " . $num_rows . "<br>";

// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

