<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "mydatabase"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>";

// Example SQL query
$sql = "SELECT * FROM non_existent_table";

// Perform query
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Process result
    // For example, fetch data from result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Process each row
        echo "Data: " . $row['column_name'] . "<br>";
    }

    // Free result set
    mysqli_free_result($result);
}

// Close connection
mysqli_close($conn);
?>

