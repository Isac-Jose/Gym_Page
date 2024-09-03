<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gym_details";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Get user ID from query parameter
$userId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($userId > 0) {
    $result = mysqli_query($conn, "SELECT * FROM gym_users WHERE id = $userId");

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if (!$user) {
            die("User not found.");
        }
    } else {
        die("Error executing query: " . mysqli_error($conn));
    }
} else {
    die("Invalid User ID");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            font-size: 1.5em;
            margin-bottom: 16px;
        }
        .card p {
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>User Details</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['mobile_number']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
    </div>
</body>
</html>
