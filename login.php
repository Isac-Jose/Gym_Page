<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gym_details";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $emailError = $passwordError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email1 = $_POST["email"];
        $pass1 = $_POST["password"];

        
        $stmt = mysqli_prepare($conn, "SELECT id, name, mobile_number, gender,password FROM gym_users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email1,);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            
            $row = mysqli_fetch_assoc($result);                       
            $storedPass =   $row['password'];

            if (password_verify($pass1, $storedPass)) {
                
                $_SESSION['user_name'] = $row["name"];
                $_SESSION['phone'] = $row["mobile_number"];
                $_SESSION['gender'] = $row["gender"];
                $_SESSION['email'] = $email1;
                $_SESSION['user_id'] = $row["id"];
                
                header("Location: Index.php");
                exit();
            } else {
                
               $passwordError   =   "Invalid Password.";
            }
        } else {
            
            $emailError = "Email not found!";
        }

        

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
    ?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url(assets/pexels-leonardho-1552252.jpg);
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            color: orangered;
            text-align: center;
            margin-bottom: 30px;
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

        .form-control:focus {
            border-color: orangered;
            box-shadow: 0 0 5px rgba(255, 69, 0, 0.5);
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <?php if (!empty($emailError)): ?>
                    <p style="color: red;"><?php echo $emailError; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php if (!empty($passwordError)): ?>
                    <p style="color: red;"><?php echo $passwordError; ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-orangered btn-block">Login</button>
            <a href="Index.php" class="btn btn-orangered btn-block">Home</a>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>