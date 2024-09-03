<?php
session_start();  // Start the session to access user data

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}


$user_name = $_SESSION['user_name'];
$mob = $_SESSION['phone'];
$gender = $_SESSION['gender'];
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="gymstyle.css">

    <style>
        body {

            background: url(assets/temple-noble-art-TeL4E6S5BQU-unsplash.jpg);
            background-position: top;
        }

        .card-custom {
            max-width: 600px;
            margin: 20px auto;
        }

        .btn-orangered {
            background-color: orangered;
            border-color: orangered;
            color: white;
        }

        .btn-orangered:hover {
            background-color: white;
            border-color: darkorange;
        }

        .card-header{
            background-color: orangered;
            
        }
        .container{
            margin-top: 10%;
        }
        
    </style>
</head>

<body>


    <div class="container ">
        <div class="card card-custom">
            <div class="card-header">
                <h5 class="card-title display-5 text-center mt-1 lead fw-bold">MY PROFILE</h5>
            </div>
            <div class="card-body text-center">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user_name); ?></p>
                <p><strong>Mobile:</strong> <?php echo htmlspecialchars($mob); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <button onclick="window.location.href='edit_profile.php'" class="btn btn-orangered">Edit</button>


            </div>
            <a href="Index.php" class="btn btn-orangered btn-block">Back to Home</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>