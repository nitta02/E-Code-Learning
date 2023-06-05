<?php
// Check if the form is submitted
if(isset($_POST['signup_submit'])) {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform your backend operations, such as database interactions and user registration

    // Example: Establish a connection to the database using mysqli
    $servername = "localhost";
    $username = "email";
    $password = "";
    $database = "testlearning";

    // Create a new mysqli instance
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example validation: Check if the password and confirm password match
    if($password === $confirmPassword) {
        // Registration successful, save the user to the database or perform other operations

        // Prepare and execute an SQL statement to insert the new user into the "users" table
        $stmt = $conn->prepare("INSERT INTO form (email, password, confirm_password) VALUES (?, ?)");
        $stmt->bind_param("id", $email, $password, $confirmPassword);
        $stmt->execute();

        // Redirect the user to a success page or show a success message
        echo "Registration successful!";
    } else {
        // Passwords do not match, show an error message
        echo "Passwords do not match.";
    }

    // Close the database connection
    $conn->close();
}
?>
