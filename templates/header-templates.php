<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'].'/stock';
include_once $root.'/config/config.php';

$user = $_SESSION['user'];
?>
<header>
    <ul>
        <li>
            <a href="<?php echo $baseUrl; ?>">Logo</a>
        </li>
        <li>
            <a href="<?php echo $baseUrl; ?>/pages/products">Product</a>
        </li>
        <li>
            <a href="<?php echo $baseUrl; ?>/pages/stocks">Stock</a>
        </li>
        <li>
            <a href="<?php echo $baseUrl; ?>/pages/users">User</a>
        </li>
    </ul>
    <ul>
        <li>Setting</li>
        <li>Notification</li>
        <li>
            <a href="<?php echo $baseUrl; ?>/profile.php">
                <?php echo $user['name']; ?>
            </a>
        </li>
        <li>
            <a href="<?php echo $baseUrl; ?>/logout.php">Logout</a>
        </li>
    </ul>
</header>