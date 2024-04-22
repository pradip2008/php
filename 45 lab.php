<?php
// MySQL server connection details
$servername = "localhost"; // Change this to your MySQL server address
$username = "username"; // Change this to your MySQL username
$password = "password"; // Change this to your MySQL password
$database = "your_database"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the query sent from JavaScript
if(isset($_GET['query'])) {
    $query = $_GET['query'];

    // Execute SELECT query to find the correct person
    $sql = "SELECT * FROM people WHERE name = '$query'";
    $result = $conn->query($sql);

    // Check if any results were found
    if ($result->num_rows > 0) {
        // Start building the HTML table
        $html_table = "<table border='1'>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                        </tr>";

        // Fetch each row and append to the HTML table
        while($row = $result->fetch_assoc()) {
            $html_table .= "<tr>";
            $html_table .= "<td>" . $row["name"]. "</td>";
            $html_table .= "<td>" . $row["age"]. "</td>";
            $html_table .= "<td>" . $row["city"]. "</td>";
            $html_table .= "</tr>";
        }

        // Close the HTML table
        $html_table .= "</table>";

        // Echo the HTML table back to JavaScript
        echo $html_table;
    } else {
        echo "No results found.";
    }
} else {
    echo "No query sent.";
}

// Close connection
$conn->close();
?>

