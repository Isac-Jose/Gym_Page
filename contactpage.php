<!-- PHP CODE -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gym_details";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    // echo "Connection Success";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $check = isset($_POST['check']) ? 'Yes' : 'No';

    $errors = [];

    if (empty($name)) {

        $errors['name'] = 'Name is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }

    if (empty($errors)) {

        $sql = "INSERT INTO gym_contact (name, email, subscription) VALUES ('$name', '$email', '$check')";
        if (mysqli_query($conn, $sql)) {
            echo "<script> 
                    alert('We Will Contact You Soon!');
                    window.location.href = 'Index.php';
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Studio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="gymstyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Honk&display=swap" rel="stylesheet">

    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.nav-scroll');

        window.addEventListener('scroll', function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                navbar.style.top = '-60px'; // Hide navbar
            } else {
                navbar.style.top = '0'; // Show navbar
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });
    </script>
</head>

<body>
    <?php
    session_start();
    ?>
    <!-- Nav Bar Section -->
    <section class="about-bg" id="Home">

        <nav class="navbar navbar-expand-lg bg-body-tertiary nav-bg nav-scroll">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">TRAINING <span class="span1"> <i class="fa-solid fa-dumbbell"></i> STUDIO </span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-2">
                            <a class="nav-link active span1" aria-current="page" href="Index.php">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#about">Programs</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="classes.php">Classes</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link " href="#contact">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['user_name'])): ?>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="user_details.php"> <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- Contact Section -->
    <section id="contact" >
        <div class="container-lg justify-content-center text-center p-5 ">
            <h3 class="lead fw-bold mt-5 sect-2-head text-center ">CONTACT <span class="span1">US</span> </h3>
            <i class="fa-solid fa-grip-lines text-center "></i>
        </div>

        <div class="d-flex justify-content-center  mt-3 container-lg border border-3 rounded p-3 shadow">
            <div class="mt-2">
                <img src="assets/contact.jpg" alt="contact image" class="contact-img me-4">
            </div>
            <form class="mt-2" action="" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleInputName1" name="name" aria-describedby="nameHelp" placeholder="Enter Your Name*">
                    <?php if (isset($errors['name'])): ?>
                        <div class="text-danger"><?= htmlspecialchars($errors['name']); ?></div>
                    <?php endif; ?>
                    <br>

                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email*">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <?php if (isset($errors['email'])): ?>
                        <div class="text-danger"><?= htmlspecialchars($errors['email']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
                    <label class="form-check-label" for="exampleCheck1">Subscribe to our offers and updates</label>
                </div>
                <button type="submit" class="btn btn-lg btn-orange btn-rounded  ">Send</button>
            </form>
        </div>
    </section>

    <!-- footer section -->
    <section>
        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <h5>About Us</h5>
                        <p>We are a team of passionate individuals committed to providing the best services in our industry.</p>
                    </div>

                    <div class="col-md-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="Index.php" class="text-white">Home</a></li>
                            <li><a href="about.php" class="text-white">About</a></li>
                            <li><a href="classes.php" class="text-white">Classes</a></li>
                            <li><a href="contactpage.php" class="text-white">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Social Media Section -->
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <a href="https://www.facebook.com/" target="_blank" class="text-white me-3"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://x.com/?lang=en" target="_blank" class="text-white me-3"><i class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="https://www.instagram.com/" target="_blank" class="text-white me-3"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://www.linkedin.com/home" target="_blank" class="text-white"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p>&copy; 2024 Training Studio. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>