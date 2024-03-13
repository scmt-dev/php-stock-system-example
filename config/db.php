<?php
// connection to database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'stock');

$db = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->set_charset("utf8");

if ($db->connect_error) {
    echo $db->connect_error;
}