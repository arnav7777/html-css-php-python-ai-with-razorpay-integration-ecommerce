<?php include ('partials/navbar-admin.php') ?>


<head>
<title>Admin@Youslay | Add Category</title>

</head>

<header class=" fw-light bg-light text-center fs-2 p-2"> ADD CATEGORY </header>


<?php
if (isset($_SESSION['add']))
{
   echo $_SESSION['add'];
  unset ($_SESSION['add']);
}

if (isset($_SESSION['upload']))
{
   echo $_SESSION['upload'];
  unset ($_SESSION['upload']);
}

?>
<div class="container">

<form action=" " method="POST" enctype="multipart/form-data">
<div class="mb-3 mt-3">
    <label for="title" class="form-label"  >TITLE</label>
    <input type="text" class="form-control" id="exampleInputname" name="title" placeholder="Category Title" required>
  </div>

  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  >IMAGE</label>
    <input type="file" class="form-control" id="formFileMultiple" name="image" multiple  >
  </div>


  
  
  <div class="mb-3 ">FEATURED: <br>
  
    <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck1" name="featured" value="yes" required>
    <label for="featuredcheck1" class="form-check-label">Yes</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck2" name="featured" value="no" required>
    <label for="featuredcheck2" class="form-check-label">No</label>

    
  </div>
  <div class="mb-3 ">ACTIVE: <br>
  
    <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck1" name="active" value="yes" required>
    <label for="activecheck1" class="form-check-label">Yes</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck2"name="active" value="no" required>
    <label for="activecheck2" class="form-check-label">No</label>

    
  </div>
  <button type="submit" name="submit" value="add category" class="btn btn-outline-danger">Submit</button>
</form>

</div>


<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $title=$_POST['title'];
  

if(isset($_POST['featured']))
{
  $featured=$_POST['featured'];

}
else{
  $featured="no";

}
if(isset($_POST['active']))
{
  $active=$_POST['active'];

}
else{
  $active="no";

}

if(isset($_FILES['image']['name']))
{
  $image_name=$_FILES['image']['name'];
  $source_path=$_FILES['image']['tmp_name'];
  $destination_path="../images/category/".$image_name;
  $upload=move_uploaded_file($source_path,$destination_path);

 /* if($upload==false)
  {
 
  $_SESSION['upload']= "<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
  header("Location:".SITEURL.'admin/add-category.php');
  die();

  }*/

}
else{
  $image_name="";

}

$sql = "INSERT INTO tbl_category SET
title='$title',
image_name='$image_name',
featured='$featured',
active='$active'";


$res = mysqli_query($conn, $sql) or die(mysqli_error());

 
if($res==true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY ADDED CATEGORY!!</div>";
  
  header('Location:'.SITEURL.'admin/manage-category.php');
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
 
  header('Location:'.SITEURL.'admin/add-category.php');
}

}
?>