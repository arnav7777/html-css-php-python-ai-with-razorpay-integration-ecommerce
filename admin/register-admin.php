
<?php include('../config/constants.php'); ?>

<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <title>Admin@Youslay | Admin Register</title>
    <link rel="icon" type="image/x-icon" href="../images/youslay-logo.png">


    
    <!--themify icons css-->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!--bootstrap 5 css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--responsive css-->
    <link rel="stylesheet" href="../css/responsive.css">
     <!--bootstrap JS-->
 <script src="js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="container">

<header class=" fw-light fs-2 bg-light text-center p-2"> REGISTER ADMIN </header>

<form action=" " method="POST">
<div class="mb-3 mt-5">
    <label for="fullname" class="form-label"  >Full Name</label>
    <input type="text" class="form-control" id="exampleInputname" name="full_name" placeholder="full name" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="username" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label " for="exampleCheck1">Accept Privacy Policy</label>
  </div>
  <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
</form>

</div>
    
</body>


<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $full_name=$_POST['full_name'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 

$sql = "INSERT INTO tbl_admin SET
full_name='$full_name',
username='$username',
password='$password'";


$res = mysqli_query($conn, $sql) or die(mysqli_error());

 
if($res==true)
{

  $_SESSION['add'] ="<div class='alert text-success'>Succesfully Registered!</div>";
  
  header("Location:".SITEURL.'admin/login.php');
}
else{
  $_SESSION['add'] ="unSuccessful";
 
  header("Location:".SITEURL.'admin/register-admin.php');
}

}
?>