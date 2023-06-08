<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'testlearning');

// Check if the connection was successful
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Get the course ID from the AJAX request
$courseId = $_POST['courseId'];

// Prepare the SQL statement to insert the purchase data into the database
$sql = "INSERT INTO purch (course_id) VALUES ('$courseId')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    // Purchase data saved successfully
    echo 'Purchase data saved to the database';
} else {
    // Error saving purchase data
    echo 'Error saving purchase data: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
