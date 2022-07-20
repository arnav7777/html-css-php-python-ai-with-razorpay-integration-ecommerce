<?php include ('partials/navbar-admin.php');

if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset ($_SESSION['add']);
}
?>

<head>
<title>Admin@Youslay | Add Article</title>

</head>

<header class=" fw-light bg-light text-center fs-2 p-2"> ADD ARTICLE </header>
<div class="container">

<form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="title" class="form-label"  >Title</label>
    <input type="text" class="form-control" id="exampleInputname" name="title" placeholder="Enter article title" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="5" placeholer="Description about article..."></textarea>
 </div>
 <div class=" mb-3">
    <label for="Price" class="form-label" >Original Price</label>
    <input type="number" class="form-control" id="price" placeholder="original Price" name="price" required>
  </div>
  <div class=" mb-3">
    <label for="Price" class="form-label" >Discount Price</label>
    <input type="number" class="form-control" id="d_price" placeholder="discount Price" name="d_price" required>
  </div>
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  >Image</label>
    <input type="file" class="form-control" id="formFileMultiple" name="image" multiple  >
  </div>
  
  <select class="form-select form-select-sm "  name="category">

    <option selected>Categories</option>

    <?php
    $sql="SELECT * FROM tbl_category WHERE active='yes'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
           $id=$row['id'];
           $title=$row['title'];
           ?>
             <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
            <?php
        }
    }
    else
     {
        ?>
       <option value="0">No category found</option>
       <?php
       } ?>
  </select>
  
  <div class="mb-3 ">Featured: <br>
  
    <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck1" name="featured" value="yes" required>
    <label for="featuredcheck1" class="form-check-label">Yes</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck2" name="featured" value="no" required>
    <label for="featuredcheck2" class="form-check-label">No</label>
  </div>
  <div class="mb-3 ">Active: <br>
  
    <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck1" name="active" value="yes" required>
    <label for="activecheck1" class="form-check-label">Yes</label>
    <input type="radio" class=" m-1 p-1 form-check-input" id="activeCheck2"name="active" value="no" required>
    <label for="activecheck2" class="form-check-label">No</label>
   </div>

   <div class="mb-3 ">SIZES: <br>
  
    <input type="checkbox" class=" m-1 p-1 form-check-input" id="activeCheck1" name="xs" value="yes" >
    <label for="activecheck1" class="form-check-label">Xtra small</label>
    <input type="checkbox" class=" m-1 p-1 form-check-input" id="activeCheck2"name="s" value="yes" >
    <label for="activecheck2" class="form-check-label">Small</label>
    <input type="checkbox" class=" m-1 p-1 form-check-input" id="activeCheck1" name="m" value="yes" >
    <label for="activecheck1" class="form-check-label">Medium</label>
    <input type="checkbox" class=" m-1 p-1 form-check-input" id="activeCheck1" name="l" value="yes" >
    <label for="activecheck1" class="form-check-label">Large</label>
    <input type="checkbox" class=" m-1 p-1 form-check-input" id="activeCheck1" name="xl" value="yes" >
    <label for="activecheck1" class="form-check-label">Xtra large</label>
   </div>
 
  <button type="submit" name="submit" class="btn btn-outline-danger">Add Article!</button>
</form>



<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $title=$_POST['title'];
 $description=$_POST['description'];
 $price=$_POST['price'];
 $d_price=$_POST['d_price'];
 $category=$_POST['category'];


 if(isset($_FILES['image']['name']))
 {
  $image_name=$_FILES['image']['name'];
  $src=$_FILES['image']['tmp_name'];
  $dst="../images/article/".$image_name;
  $upload=move_uploaded_file($src,$dst);
 }

 else{
   $image_name="";
 
 }

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
 if(isset($_POST['xs']))
 {
  $xs=$_POST['xs'];
 
 }
 else{
   $xs="no";}

   if(isset($_POST['s']))
 {
  $s=$_POST['s'];
 
 
 }
 else{
   $s="no";}

   if(isset($_POST['m']))
 {
  $m=$_POST['m'];
 
 
 }
 else{
   $m="no";}

   if(isset($_POST['l']))
 {
  $l=$_POST['l'];
 
 
 }
 else{
   $l="no";}

   if(isset($_POST['xl']))
 {
  $xl=$_POST['xl'];
 
 
 }
 else{
   $xl="no";}
 



 

$sql2 = "INSERT INTO tbl_shoppe SET
title='$title',
description='$description',
price=$price,
discount_price=$d_price,
image_name='$image_name',
category_id='$category',
featured='$featured',
active='$active'";

$article_id=$conn->id;
$sql3 = " INSERT INTO size SET 
article_id='$article_id',
xs='$xs',s='$s',l='$l',m='$m',xl='$xl'";

$result= mysqli_query($conn, $sql2);
$result2= mysqli_query($conn, $sql3);

 
if($result == true && $result2 == true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY ADDED ARTICLE!!</div>";
  header('Location:'.SITEURL.'admin/manage-article.php');

  
  
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!!</div>";
 
  header('Location:'.SITEURL.'admin/add-article.php');
}

}
?>

</div>