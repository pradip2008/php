<?php

$servername = "localhost"; // Replace with your database server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "mydatabase"; // Replace with your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>";

$sql = "SELECT * FROM non_existent_table";

$result = mysqli_query($conn, $sql);

if (!$result) {

    $errno = mysqli_errno($conn);
    echo "Error number: " . $errno . "<br>";

    // Get error message
    $error = mysqli_error($conn);
    echo "Error message: " . $error . "<br>";
} else {

while ($row = mysqli_fetch_assoc($result)) {

       echo "Data: " . $row['column_name'] . "<br>";
    }

    mysqli_free_result($result);
}


mysqli_close($conn);
?>

