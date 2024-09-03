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
    </section>

    <!-- Classes Section -->
    <section class="class-section-2 " id="classes">
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

</body>

</html>