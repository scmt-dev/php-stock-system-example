<?php 
session_start();
$user = $_SESSION['user'];
if (!($user)) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
</head>
<body>
    <h1>Update Profile</h1>
    <form action="" method="post">
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
        </p>
        <p>
            <label for="image">Image</label>
            <input type="file" accept="image/*" name="image" id="image">
        </p>
        <p>
            <input type="submit" name="submit" value="Update">
        </p>
    </form>
</body>
</html>