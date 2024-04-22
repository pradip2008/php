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

// Example SQL query (UPDATE statement)
$sql = "UPDATE your_table SET column1 = 'new_value' WHERE condition";

// Perform query
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Get the number of affected rows
$affected_rows = mysqli_affected_rows($conn);
echo "Number of affected rows: " . $affected_rows . "<br>";

// Close connection
mysqli_close($conn);
?>

