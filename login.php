<?php 
include_once 'config/db.php';
$message = '';
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email =?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user'] = $row;
            // redirect to index.php
            header('Location: index.php');
        }else{
            $message = 'Login fail!';
        }
    }else {
        $message = 'Email record not found';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
</head>
<body>
Login Account
<form action="" method="post">
    Email
    <input type="text" name="email">
    <br> 
    Password
    <input type="password" name="password">
    <br>
    <button>Login</button>
    <div>
        <?php echo $message ?>
    </div>
</form>
</body>
</html>