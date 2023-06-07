<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="course-details.css"> <!-- Include your custom CSS file -->
    <style>
        /* Add your custom styles here */

        /* Responsive styles */
        @media (max-width: 768px) {

            /* Adjust styles for smaller screens */
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            /* Adjust other styles as needed */
        }

        /* Custom styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #06BBCC !important;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 6px;
        }

        .course-info {
            display: flex;
            align-items: flex-start;
        }

        .course-info img {
            width: 200px;
            height: auto;
            border-radius: 6px;
            margin-right: 20px;
        }

        .course-info h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .course-info p {
            margin-bottom: 20px;
        }

        .course-links {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .course-links a {
            display: block;
            margin-right: 20px;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }

        .certificate-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .certificate-button:hover {
            background-color: #555;
        }

        .video-player {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            position: relative;
            margin-bottom: 20px;
        }

        .video-player iframe {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Course Details</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="course-info">
            <img src="img/web.jpeg" alt="Course Thumbnail">
            <div class="course-description">
                <h2>Course Title</h2>
                <p>Learn the mother language of programming 'C'.</p>
            </div>
        </div>
        <div class="course-links">
            <a href="#">Course Content</a>
            <a href="#">Instructor Bio</a>
            <div class="reviews">
                <h2>Reviews</h2>
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

                // Retrieve feedback from the "feedback" table
                $sql = "SELECT feedback_text FROM feedback";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $feedback = $row["feedback_text"];
                        echo '<div class="review">';
                        echo $feedback;
                        echo '</div>';
                    }
                } else {
                    echo 'No reviews available.';
                }

                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
        <a href="#" class="certificate-button">Get Certificate</a>
        <div class="video-player">
            <iframe src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Ecode Learning. All rights reserved.</p>
    </footer>
</body>
</html>