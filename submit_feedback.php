<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testlearning";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback data
    $feedback = $_POST["feedback"];

    // Insert feedback into the "feedback" table
    $sql = "INSERT INTO feedback (feedback_text) VALUES ('$feedback')";
    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your feedback.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
