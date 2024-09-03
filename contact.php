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

    if(empty($name)){

        $errors ['name'] = 'Name is required';
    }

    if(empty($email)){
        $errors['email'] = 'Email is required';
    }

    if(empty($errors)){

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

