<?php
if(!isset($_SESSION['user']))
{
   $_SESSION['no-login-message']="<div class='alert text-danger'>Login to Access Admin Panel!</div>";
   header('location:'.SITEURL.'admin/login.php') ;
}
?>