<?php
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['login_submit'])) {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform your backend operations, such as database interactions and user authentication

    // Example: Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testlearning";

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Example validation: Check if the email and password are correct
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Authentication successful, set session data and redirect the user to the dashboard
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Authentication failed, show an error message
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} elseif (isset($_POST['signup_submit'])) {
    // Handle the signup form submission
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform your backend operations, such as database interactions and user registration

    // Example: Establish a connection to the database using mysqli
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testlearning";

    // Create a new mysqli instance
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example validation: Check if the password and confirm password match
    if ($password === $confirmPassword) {
        // Registration successful, save the user to the database or perform other operations

        // Prepare and execute an SQL statement to insert the new user into the "users" table
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        // Redirect the user to the dashboard
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        // Passwords do not match, show an error message
        echo "Passwords do not match.";
    }

    // Close the database connection
    $conn->close();
}
?>
<!-- Remaining HTML code -->


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>E-Code LEARNING Registration</title>
   <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="registration.css">
</head>

<body>
   <div class="wrapper">
      <div class="title-text">
         <div class="title login">
            Registration
         </div>
         <div class="title signup">
            Signup Form
         </div>
      </div>
      <div class="form-container">
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">
            <form action="#" class="login">
               <div class="field">
                  <input type="text" name="email" placeholder="Email Address" required>
               </div>
               <div class="field">
                  <input type="password" name="password" placeholder="Password" required>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="login_submit" value="Login">
               </div>
               <div class="signup-link">
                  Not a member? <a href="">Signup now</a>
               </div>
            </form>

            <!-- -----------------SignUp form---------------- -->
            <form action="#" class="signup" method="POST">
               <div class="field">
                  <input type="text" name="email" placeholder="Email Address" required>
               </div>
               <div class="field">
                  <input type="password" name="password" placeholder="Password" required>
               </div>
               <div class="field">
                  <input type="password" name="confirm_password" placeholder="Confirm password" required>
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" name="signup_submit" value="Signup">
               </div>
            </form>
         </div>
      </div>
   </div>
   <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (() => {
         loginForm.style.marginLeft = "-50%";
         loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (() => {
         loginForm.style.marginLeft = "0%";
         loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (() => {
         signupBtn.click();
         return false;
      });
   </script>
</body>

</html>