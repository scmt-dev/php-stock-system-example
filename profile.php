<?php 
session_start();

$user = $_SESSION['user'];

if(!$user) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div>
        <h1>Hello, <?php echo $user['name']; ?></h1>
        <p>email: <?php echo $user['email']; ?></p>
        <p>role: <?php echo $user['role']; ?></p>
        <a href="profile-edit.php">update profile</a> | 
        <a href="change-password.php">change password</a> | 
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>