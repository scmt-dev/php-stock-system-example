<?php
session_start();
if (!($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Stock Application
    </title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php 
    include_once('templates/header-templates.php');
    ?>
    <main>
        <div>
            <h2>Products</h2>
            <span>10</span>
        </div>
        <div>
            <h2>Stock</h2>
            <span>100</span>
        </div>
        <div>
            <h2>Out Stock</h2>
            <span>2</span>
        </div>
    </main>
    <footer></footer>
</body>
</html>