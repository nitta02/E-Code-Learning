<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecode Learning Dashboard</title>
    <link rel="stylesheet" href="dashboard.css"> <!-- Include your custom CSS file -->
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

            aside {
                order: 2;
                margin-top: 20px;
            }

            .content {
                order: 1;
            }
        }

        /* Custom styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        aside {
            flex: 0 0 25%;
            background-color: #fff;
            border-radius: 6px;
            padding: 20px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .profile h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .menu a:last-child {
            border-bottom: none;
        }

        .content {
            flex: 0 0 75%;
            background-color: #fff;
            border-radius: 6px;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .course-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .course {
            background-color: #f5f5f5;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .course img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .course h2 {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .course p {
            margin: 0;
        }

        .course:hover {
            transform: scale(1.05);
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
            <h1>Ecode Learning Dashboard</h1>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </header>
    <main>
        <aside>
            <div class="profile">
                <img src="img/nitta.jpg" alt="Profile Picture">
                <h2>Nitto</h2>
            </div>
            <div class="menu">
                <a href="#" class="active">Dashboard</a>
                <a href="course_page.php">My Courses</a>
            </div>
        </aside>
        <div class="content">
            <h1>Welcome to Your Dashboard</h1>
            <div class="course-list">
                <!-- Courses will be dynamically added here -->
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Ecode Learning. All rights reserved.</p>
    </footer>
    <script>
        // Define an array to store the purchased courses
        var purchasedCourses = [];

        // Function to generate the course elements dynamically
        function generateCourseElements() {
            var courseListElement = document.querySelector(".course-list");

            // Clear the existing course elements
            courseListElement.innerHTML = "";

            // Iterate over the purchasedCourses array to create and append the course elements
            purchasedCourses.forEach(function (course) {
                var courseElement = document.createElement("div");
                courseElement.classList.add("course");

                var imgElement = document.createElement("img");
                imgElement.src = course.imgSrc;
                imgElement.alt = course.title;
                courseElement.appendChild(imgElement);

                var h2Element = document.createElement("h2");
                h2Element.textContent = course.title;
                courseElement.appendChild(h2Element);

                var pElement = document.createElement("p");
                pElement.textContent = course.description;
                courseElement.appendChild(pElement);

                courseListElement.appendChild(courseElement);
            });
        }

        // Check if there are any purchased courses stored in the local storage
        var storedCourses = localStorage.getItem("purchasedCourses");
        if (storedCourses) {
            purchasedCourses = JSON.parse(storedCourses);
        }

        // Call the function to generate the course elements on page load
        generateCourseElements();
    </script>
</body>

</html>
