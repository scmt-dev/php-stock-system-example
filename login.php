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

    <?php
        $users = [
            array('email' => 'email1@example.com', 'password' => '12345'),
            array('email' => 'email2@example.com', 'password' => '12345'),
        ];
        
    ?>
</form>
</body>
</html>