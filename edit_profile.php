<?php

session_start();
// print_r($_SESSION);
include('db_connection.php');

// Check if the user is logged in (i.e., if 'user_id' exists in session)
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit(); // Stop further script execution
}

$user_id = $_SESSION['user_id'] ;

// Fetch the user's data from the database
$query = "SELECT name, mobile_number, gender, email FROM gym_users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_name, $mob, $gender, $email);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background: url(assets/temple-noble-art-TeL4E6S5BQU-unsplash.jpg);
            background-position: top;
        }
        .container{
            margin-top: 10%;
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
    </style>

</head>

<body>
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <h5 class="card-title display-5 text-center mt-1 lead fw-bold">EDIT PROFILE</h5>
            </div>
            <div class="card-body">
                
                <form action="update_profile.php" method="POST">
                    <div class="form-group">
                        <label for="user_name">Name:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mob">Mobile:</label>
                        <input type="text" class="form-control" id="mob" name="mob" value="<?php echo htmlspecialchars($mob); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($gender); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div> <br>
                    <button type="submit" class="btn btn-orangered">Save Changes</button>
                </form>
            </div>
            <a href="Index.php" class="btn btn-orangered btn-block">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>