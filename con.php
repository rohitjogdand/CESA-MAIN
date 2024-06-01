<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "LOVEuMOMDAD@20";
    $dbname = "cesa";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactNumber = $_POST["no"];

    // Insert data into the 'reg' table
    $sql = "INSERT INTO reg (name, email, contact_number) VALUES ('$name', '$email', '$contactNumber')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "Registration successful!";
        header('Location: success.php'); // Redirect to a success page
    } else {
        // Error in registration
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
