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
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirm-password']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $workoutTime = htmlspecialchars($_POST['workout-time']);
    $fitnessGoals = htmlspecialchars($_POST['fitness-goals']);

    // Validate input data
    $errors = [];

    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "A valid email is required";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif ($password !== $confirmPassword) {
        $errors['confirm-password'] = "Passwords do not match.";
    }

    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    }

    if (empty($gender)) {
        $errors['gender'] = "Gender is required.";
    }

    // if (empty($workoutTime)) {
    //     $errors['workout-time'] = "Preferred workout time is required.";
    // }

    if (empty($fitnessGoals)) {
        $errors['fitness-goals'] = "Fitness goals are required.";
    }


    if (empty($errors)) {

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);        

        $dataEntry = "INSERT INTO gym_users(name,email,gender,mobile_number,password) VALUES ('$name','$email','$gender','$phone','$hashedPass')";

        if (mysqli_query($conn, $dataEntry)) {

            echo "<script> 
            alert('Account Created Successfully')
            window.location.href = 'index.php'
            </script>";
        } else {
            echo "Datas Not Inserted";
        }
    }
}

?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Signup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url(assets/pexels-leonardho-1552252.jpg);
            background-position: bottom;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 80vh;  */
        }

        .signup-form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: orangered;
        }

        .btn {
            color: white;
            background-color: orangered;
        }

        .form-control:focus {
            border-color: orangered;
            box-shadow: 0 0 0 0.2rem rgb(233, 162, 137);
        }

        .form-select:focus {
            border-color: orangered;
            box-shadow: 0 0 0 0.2rem rgb(233, 162, 137);
        }
    </style>
</head>

<body>
    <div class="signup-form ">
        <h2 class="fw-bold mt-2">Become Our <span style="color:orangered;">Member</span>!</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name*" value="<?= isset($name) ? $name : ''; ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['name']); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email*">
                <?php if (isset($errors['email'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['email']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number*">
                <?php if (isset($errors['phone'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['phone']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
                <?php if (isset($errors['gender'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['gender']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="workout-time" class="form-label">Preferred Workout Time</label>
                <select class="form-select" id="workout-time" name="workout-time">
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="evening">Evening</option>
                    <option value="night">Night</option>
                </select>
                <?php if (isset($errors['workout-time'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['workout-time']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="fitness-goals" class="form-label">Fitness Goals</label>
                <textarea class="form-control" id="fitness-goals" name="fitness-goals" rows="3" placeholder="What are your fitness goals?"></textarea>

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password*">
                <?php if (isset($errors['password'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['password']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password*">
                <?php if (isset($errors['confirm-password'])): ?>
                    <div class="text-danger"><?= htmlspecialchars($errors['confirm-password']); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn  w-100">Sign Up</button>

            <a href="index.php" class="btn  w-100 mt-3">Go To Home</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>