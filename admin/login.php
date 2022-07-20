<?php include('../config/constants.php'); 
?>



<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <title>Admin@Youslay | Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../images/youslay-logo.png">

    
    <!--themify icons css-->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!--bootstrap 5 css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--responsive css-->
    <link rel="stylesheet" href="../css/responsive.css">
     
    </head>

    <body style="background:lavenderblush; ">
    
   

    
    
    <form class=" container-fluid m-5 p-2 bg-white rounded-3 w-50  mx-auto d-block shadow-lg" action="" method="POST">
      <div class=" col-6 mx-auto px-auto">
        <img src="../images/youslay-logo.png" alt="" class="img-fluid">
        </div>
      
       <div class="col-md-6 col-sm-12 m-1 p-2  mx-auto d-block">
          <label for="colFormLabelsm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
           <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
     </div>
     <div class="col-md-6 col-sm-12 m-1 p-2 mx-auto d-block">
        <label for="colFormLabelsm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
       <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="password">
     </div>
 <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-center mt-2 ">
  <button type="submit" name="submit" value="login" class="btn btn-outline-danger ">Log In</button>
  <button type="" name="signup" value="signup" class="btn btn-outline-warning ">Register</button>
  
  
  
</div>

<?php
if(isset($_SESSION['login']))

echo $_SESSION['login'];
unset ($_SESSION['login']);

if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset ( $_SESSION['add']);
}

if(isset($_SESSION['no-login-message']))
{
  echo $_SESSION['no-login-message'];
  unset ( $_SESSION['no-login-message']);
}




?>
<br><br>
</form>
<!--bootstrap JS-->
<script src="../js/bootstrap.min.js"></script>
    </body>


</html>

<?php

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

  $res=mysqli_query($conn,$sql);

  $count=mysqli_num_rows($res);

  if($count==1)
  {
    $_SESSION['login']="<div >login successful.</div>";
    $_SESSION['user']=$username;
    header('location:'.SITEURL.'admin/index.php');

  }
  else{
    $_SESSION['login']="<div class='text-muted'>login Unsuccessful! Please enter proper details.</div>";
     
    header('location:'.SITEURL.'admin/login.php');

  }

}

if(isset($_POST['signup']))
{
  header('location:'.SITEURL.'admin/register-admin.php');

}


?>