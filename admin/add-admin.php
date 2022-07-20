<?php include ('partials/navbar-admin.php') ?>



<head>
<title>Admin@Youslay | Add Admin</title>

</head>

<header class=" fw-light bg-light text-center fs-2 p-2"> ADD ADMIN </header>
<div class="container">
<form action=" " method="POST">
<div class="mb-3 mt-3">
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

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESS!!</div>";
  
  header('Location:'.SITEURL.'admin/manage-admin.php');
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
 
  header('Location:'.SITEURL.'admin/add-admin.php');
}

}
?>