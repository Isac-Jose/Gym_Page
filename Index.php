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


<!-- HTML CODE  -->

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
    <section class="parent-bg" id="Home">

        <nav class="navbar navbar-expand-lg bg-body-tertiary nav-bg nav-scroll">
            <div class="container-fluid ">
               <div class="mx-2">
                    <img src="assets/training-studio-high-resolution-logo-transparent (1).png" alt="logo" height="40px">
               </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-2">
                            <a class="nav-link active span1" aria-current="page" href="#Home">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="about.php">Programs</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="classes.php">Classes</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link " href="contactpage.php">Contact</a>
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

        <section class="sect-1">

            <?php if (isset($_SESSION['user_name'])): ?>
                <!-- Carousel -->
                <div id="backgroundCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-image: url('assets/victor-freitas-Gqae1CkM9ig-unsplash.jpg');"></div>
                        <div class="carousel-item" style="background-image: url(assets/brett-jordan-NAENofLAWjE-unsplash.jpg);"></div>
                        <div class="carousel-item" style="background-image: url('assets/victor-freitas-Yuv-iwByVRQ-unsplash.jpg');"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="margin-sect-1">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <h4 class="lead mt-5 pt-5 text-center fw-bold display-6 font">Welcome, <span style="color: orangered;"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span> </h4>
                <?php endif; ?>
                <p class="lead mt-5 pt-5 text-center fw-bold ">Work Harder,Get Stronger </p>
                <h2 class="display-2 mt-3 pt-5 text-center fw-bolder  "> EASY WITH OUR <span class="span1">GYM</span></h2>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <?php if (!isset($_SESSION['user_name'])): ?>
                    <a href="signup.php" class="btn btn-lg btn-orange btn-rounded mt-5 ">Become a Member</a>
                <?php endif; ?>

            </div>
        </section>
    </section>


    <!-- Programs Section -->

    <section class="sect-2 text-center " id="about">

        <h3 class="lead fw-bold mt-5 sect-2-head ">CHOOSE <span class="span1">PROGRAM</span></h3>
        <i class="fa-solid fa-grip-lines "></i>
        <p class="lead text-secondary">Choose from any of our programs according to your needs and wants</p>

        <div class="container text-center mt-5" id="programs">
            <div class="row row-cols-2">
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell fa-3x dumbell my-3 mx-2 "></i>
                    <p class="fw-bold display-6" id="programs-heading">Basic Fitness</p>
                    <p class="lead text-secondary ">Kickstart your fitness journey with our Basic Fitness course, perfect for beginners aiming to build a solid foundation.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Our Basic Fitness course includes personalized training plans and diet recommendations.</p>
                        <p class="lead text-secondary ">Join our community and start seeing results quickly!</p>
                    </div>

                </div>
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell  fa-3x dumbell  my-3 mx-2 "></i>
                    <p class="fw-bold display-6 " id="programs-heading">Advanced Muscle Course</p>
                    <p class="lead text-secondary">Push your limits with our Advanced Muscle Course, designed for seasoned gym-goers looking to maximize strength and muscle gains.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Elevate your training with our Advanced Muscle Course, featuring cutting-edge techniques and intense workouts designed to push your limits and accelerate muscle growth.</p>
                        <p class="lead text-secondary ">Experience personalized coaching and advanced strategies to maximize your strength and sculpt your physique like never before.</p>
                    </div>
                </div>
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell  fa-3x dumbell  my-3 mx-2 "></i>
                    <p class="fw-bold display-6 " id="programs-heading">New Gym Training</p>
                    <p class="lead text-secondary">Get started on the right foot with our New Gym Training course, tailored for those new to the gym environment.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Embark on your fitness journey with our New Gym Training course, designed to help you master the basics and build a strong foundation for long-term success.</p>
                        <p class="lead text-secondary ">Benefit from expert guidance and a structured plan tailored specifically for newcomers, ensuring you start your gym experience on the right foot.</p>
                    </div>
                </div>
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell  fa-3x dumbell  my-3 mx-2 "></i>
                    <p class="fw-bold display-6 " id="programs-heading">Yoga Training</p>
                    <p class="lead text-secondary">Find your balance with our Yoga Training course, suitable for all skill levels. Enhance your flexibility, strength, and mindfulness.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Enhance your overall well-being with our Yoga Training course, focusing on flexibility, strength, and mindfulness to help you achieve balance and inner peace.</p>
                        <p class="lead text-secondary ">Whether you're a beginner or an experienced yogi, our tailored sessions will guide you through poses and techniques to improve your physical and mental health.</p>
                    </div>
                </div>
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell  fa-3x dumbell  my-3 mx-2 "></i>
                    <p class="fw-bold display-6 " id="programs-heading">Basic Muscle Course</p>
                    <p class="lead text-secondary">Build a strong foundation with our Basic Muscle Course, perfect for beginners aiming to increase muscle mass and strength.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Kickstart your muscle-building journey with our Basic Muscle Course, which provides a solid foundation for increasing muscle mass and strength.</p>
                        <p class="lead text-secondary ">Our program combines essential weight training exercises with expert guidance to help you build muscle effectively and safely from the ground up.</p>
                    </div>
                </div>
                <div class="col mt-3 my-2">
                    <i class="fa-solid fa-dumbbell  fa-3x dumbell  my-3 mx-2 "></i>
                    <p class="fw-bold display-6 " id="programs-heading">Body Building Course</p>
                    <p class="lead text-secondary">Culpt your physique with our Body Building Course, designed for those dedicated to achieving a muscular and toned body.</p>
                    <p><a href="javascript:void(0);" class="discover-btn" onclick="toggleContent(this)" id="discover-btn">SHOW MORE</a></p>
                    <div class="extra-content" style="display: none;">
                        <p class="lead text-secondary ">Transform your physique with our Body Building Course, crafted for those committed to sculpting a muscular and toned body through targeted strength training.</p>
                        <p class="lead text-secondary ">Our course emphasizes advanced lifting techniques and personalized workout plans to help you achieve peak muscular development and a well-defined physique.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Banner Section -->
    <section class="section-mid ">
        <div class="text-center">
            <h3 class="  p-5 display-5 fw-bold text-white ">DON'T <span class="span1">THINK</span>, BEGIN <span class="span1">TODAY</span>!</h3>
            <p class=" lead text-white ">Remember, the only bad workout is the one you didn't do, so stay focused and keep striving for greatness!</p>
            <?php if (!isset($_SESSION['user_name'])): ?>
                <a href="signup.php" class="btn btn-lg btn-orange btn-rounded mt-5 ">Become a Member</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Classes Section -->
    <section class="class-section" id="classes">
        <div class=" container-lg justify-content-center text-center">
            <i class="fa-regular fa-calendar-days fa-3x"></i>
            <h3 class="lead fw-bold mt-5 sect-2-head ">OUR <span class="span1">CLASSES</span></h3>
            <i class="fa-solid fa-grip-lines "></i>
            <p class="lead fst-italic">Start your fitness journey with our <span class="span1">structured 4-stage program</span>, designed to guide you from beginner to advanced levels.
                Begin at Stage 1 and progressively advance through each stage. </p>
        </div>

        <div class="container-lg text-center">
            <div class="row row-cols-2">
                <div class="col mt-3 my-2">
                    <button class="btn btn-lg btn-orange btn-rounded mt-5 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">STAGE-I</button>
                    <div>
                        <img src="assets/stage1.jpg" alt="stage1" class=" py-3 img-round">
                    </div>
                    <p class="lead">Get Started: Building the Foundation</p>


                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasLeftLabel">Stage I: Get Started - Building the Foundation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p class="lead ">This is where your fitness journey begins. In this stage, you'll focus on understanding the basics, developing proper form, and building a strong foundation for future progress. It’s about getting your body used to regular physical activity and creating a sustainable routine.</p>
                        </div>
                    </div>
                </div>

                <div class="col mt-3 my-2">
                    <button class="btn btn-lg btn-orange btn-rounded mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">STAGE-III</button>
                    <div>
                        <img src="assets/stage3.jpg" alt="stage1" class=" py-3 img-round">
                    </div>
                    <p class="lead">Push Limits: Advanced Training</p>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Stage III: Push Limits - Advanced Training</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p class="lead">Now that you’ve built a solid foundation and improved your strength and endurance, it’s time to push your limits. This stage is about advanced training techniques and high-intensity workouts to take your fitness to the next level.</p>
                        </div>
                    </div>
                </div>

                <div class="col mt-3 my-2">
                    <button class="btn btn-lg btn-orange btn-rounded mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft1" aria-controls="offcanvasLeft">STAGE-II</button>
                    <div>
                        <img src="assets/stage2.jpg" alt="stage2" class="img-fluid py-3 rounded img-round">
                    </div>
                    <p class="lead">Level Up: Strength and Endurance</p>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft1" aria-labelledby="offcanvasLeftLabel1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasLeftLabel1">Stage II: Level Up - Strength and Endurance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p class="lead">In this stage, you’ll start to see improvements in your strength and endurance. You’ll be pushing yourself a bit more, with an emphasis on increasing the intensity of your workouts. The focus is on building muscle and cardiovascular endurance.</p>
                        </div>
                    </div>
                </div>

                <div class="col mt-3 my-2">
                    <button class="btn btn-lg btn-orange btn-rounded mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1">STAGE-IV</button>
                    <div>
                        <img src="assets/stage4.jpg" alt="stage2" class="img-fluid py-3 rounded img-round">
                    </div>
                    <p class="lead">Peak Performance: Mastery and Beyond</p>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRightLabel1">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel1">Stage IV: Peak Performance - Mastery and Beyond</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p class="lead">In the final stage, you’re focusing on reaching peak performance and mastering advanced techniques. This is about maintaining and fine-tuning your fitness level, preventing plateaus, and achieving your ultimate fitness goals.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container-lg justify-content-center text-center ">
            <h3 class="lead fw-bold mt-5 sect-2-head text-center ">CONTACT <span class="span1">US</span> </h3>
            <i class="fa-solid fa-grip-lines text-center "></i>
        </div>

        <div class="d-flex justify-content-center  mt-5 container-lg border border-3 rounded p-3 shadow">
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
        <footer class="bg-dark text-white mt-5 py-4">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <h5>About Us</h5>
                        <p>We are a team of passionate individuals committed to providing the best services in our industry.</p>
                    </div>

                    <div class="col-md-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#Home" class="text-white">Home</a></li>
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

    <script>
        function toggleContent(button) {

            var extraContent = button.parentElement.nextElementSibling;

            if (extraContent && extraContent.classList.contains('extra-content')) {
                if (extraContent.style.display === "none" || extraContent.style.display === "") {
                    extraContent.style.display = "block";
                    button.textContent = "SHOW LESS";
                } else {
                    extraContent.style.display = "none";
                    button.textContent = "SHOW MORE";
                }
            } else {
                console.error("No extra content found.");
            }
        }
    </script>
</body>

</html>