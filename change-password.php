<?php 
session_start();
if (!($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include_once 'config/db.php';
$message = '';
if(isset($_POST['submit'])){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    $hasError = false;

    if(!$oldPassword) {
        $message = "Old password is required";
        $hasError = true;
    }

    if(strlen($newPassword) < 6){
        $message = "Password must be at least 6 characters";
        $hasError = true;
    }

    if($newPassword != $confirmNewPassword){
        $message = "Passwords do not match";
        $hasError = true;
    }

    if(!$hasError){
        $user = $_SESSION['user'];
        $id = $user['id'];
        $sql = "SELECT * FROM users WHERE id =$id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // check old password
        if(!password_verify($oldPassword, $row['password'])){
            $message = "Old password is incorrect";
        }else{
            // update new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$hashedPassword' WHERE id = $id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $message = "Password changed successfully";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form action="" method="post">
        <label for="oldPassword">Old Password</label>
        <input type="password" name="oldPassword" id="oldPassword" required>
        <br>
        <label for="newPassword">New Password</label>
        <input type="password" name="newPassword" id="newPassword" minlength="6" required>
        <br>
        <label for="confirmNewPassword">Confirm New Password</label>
        <input type="password" name="confirmNewPassword" id="confirmNewPassword" required>
        <br>
        <a href="index.php">Home</a> | 
        <input type="submit" name="submit" value="Change Password">
        <p><?php echo $message; ?></p>
    </form>
</body>
</html>