<?php

ob_start();
if(!session_id()){ 
    session_start(); 
} 

define('SITEURL','http://localhost/youslay-back/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shop');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select= mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

?>