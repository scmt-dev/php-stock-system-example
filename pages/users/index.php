<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Users
    </title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <?php 
    include('../../templates/header-templates.php');
    ?>
    <main>
        <div>
            <input type="search" />
            <button>Search</button>
            <a href="<?php echo $baseUrl; ?>/pages/users/add.php">
                Add
            </a>
        </div>
        <p>
            This is user page
        </p>
    </main>
    <footer></footer>
</body>
</html>