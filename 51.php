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

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch and display results
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Column1: " . $row["column1"] . " - Column2: " . $row["column2"] . "<br>";
    }
} else {
    echo "No results found";

