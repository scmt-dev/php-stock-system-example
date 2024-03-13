<?php
    include_once '../../config/db.php';
    $message = '';
    if(isset($_POST['name'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $sql = 'INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, password_hash($password, PASSWORD_BCRYPT), $role);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $message = 'User added successfully';
        }else{
            $message = 'User could not be added';
        }
        $stmt->close();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <form action="" method="post">
        <h1>Add User</h1>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="name">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="name">Role</label>
            <select name="role" id="role">
                <option value="user">User</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <label for="profile">Profile</label>
            <input type="file" name="profile" id="profile">
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
        <?php
            echo $message;
        ?>
    </form>
</body>
</html>