<?php

include('db_connection.php');


$user_name = htmlspecialchars($_POST['user_name']);
$mob = htmlspecialchars($_POST['mob']);
$gender = htmlspecialchars($_POST['gender']);
$email = htmlspecialchars($_POST['email']);


session_start();
$user_id = $_SESSION['user_id'];


$query = "UPDATE gym_users SET name = ?, mobile_number = ?, gender = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssi", $user_name, $mob, $gender, $email, $user_id);

if ($stmt->execute()) {
    
    $_SESSION['user_name'] = $user_name;
    $_SESSION['phone'] = $mob;
    $_SESSION['gender'] = $gender;
    $_SESSION['email'] = $email;

    
    header("Location: user_details.php?status=success");
} else {
   
    header("Location: edit_profile.php?status=error");
}

$stmt->close();
$conn->close();
?>
