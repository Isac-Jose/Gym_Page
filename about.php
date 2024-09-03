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

        <!-- Programs Section -->

        <section class="sect-2-about text-center " id="about">

            <h3 class="lead fw-bold mt-5 p-5 sect-2-head ">CHOOSE <span class="span1">PROGRAM</span></h3>
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

        <!-- footer section -->
        <section>
            <footer class="bg-dark text-white py-4">
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