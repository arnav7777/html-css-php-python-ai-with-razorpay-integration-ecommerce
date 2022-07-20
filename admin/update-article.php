<?php include ('partials/navbar-admin.php') ?>
<?php

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql2="SELECT * FROM tbl_shoppe WHERE id=$id";
  $res2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_assoc($res2);

  $title=$row2['title'];
  $description=$row2['description'];
  $price=$row2['price'];
  $current_image=$row2['image_name'];
  $current_category=$row2['category_id'];
  $featured=$row2['featured'];
  $active=$row2['active'];
  $sql3="SELECT * FROM size WHERE articleid=$id";
  $res3=mysqli_query($conn,$sql3);
  //$row3=mysqli_fetch_assoc($res3);
}
?>



<head>
<title>Admin@Youslay | Update Article</title>

</head>
<header class=" fw-light bg-light text-center fs-2 p-2"> UPDATE ARTICLE </header>
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3 mt-5">
    <label for="title" class="form-label"  >Title</label>
    <input type="text" class="form-control" id="exampleInputname" name="title" placeholder="Enter article title"  value=<?php echo $title?> required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="5" placeholer="Description about article..."><?php echo $description ?></textarea>
 </div>
 <div class=" mb-3">
    <label for="Price" class="form-label" >Price</label>
    <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo $price?>" required>
  </div>
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  > Current Image : </label><br>
    <?php
    if($current_image=="")
    {
      echo"<div class='text-muted'>No Image</div>";
    }
    else{
      ?>
      <img src="<?php echo SITEURL ;?>images/article/<?php echo $current_image ;?>" width="150px">  </div><?php
    }
    ?>
   
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label"  > New Image</label>
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
           $category_id=$row['id'];
           $category_title=$row['title'];
           ?>
             <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
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
  
    <input <?php if($featured=="yes"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck1" name="featured" value="yes" required>
    <label for="featuredcheck1" class="form-check-label">Yes</label>
    <input <?php if($featured=="no"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="featuredCheck2" name="featured" value="no" required>
    <label for="featuredcheck2" class="form-check-label">No</label>
  </div>
  <div class="mb-3 ">Active: <br>
  
    <input <?php if($active=="yes"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="activeCheck1" name="active" value="yes" required>
    <label for="activecheck1" class="form-check-label">Yes</label>
    <input <?php if($active=="no"){echo "checked";}?> type="radio" class=" m-1 p-1 form-check-input" id="activeCheck2"name="active" value="no" required>
    <label for="activecheck2" class="form-check-label">No</label>
   </div>

   
   
   <input type="hidden" name="id" value="<?php echo $id?>" >
   <input type="hidden" name="current_image" value="<?php echo $current_image?>" >
  <button type="submit" name="submit" class="btn btn-outline-danger">Update Article!</button>
</form>



<?php
//process the value from form and save it in database

if(isset($_POST['submit']))
{

  $title=$_POST['title'];
 $description=$_POST['description'];
 $price=$_POST['price'];
 $category=$_POST['category'];
 $current_image=$_POST['current_image'];
 $featured=$_POST['featured'];
 $active=$_POST['active'];

 if(isset($_FILES['image']['name']))
 {
   $image_name=$_FILES['image']['name'];

  if($image_name!="")
   {
     $src=$_FILES['image']['tmp_name'];
     $dst="../images/article/".$image_name;
     $upload=move_uploaded_file($src,$dst);
   
   if($current_image!="")
   {
    $remove_path="../images/article/".$current_image;
    $remove=unlink($remove_path);
   }
  }
  else{
    $image_name=$current_image;
  
  }
 }

 else{
   $image_name=$current_image;
 
 }

 


 

$sql3 = "UPDATE  tbl_shoppe SET
title='$title',
description='$description',
price=$price,
image_name='$image_name',
category_id='$category',
featured='$featured',
active='$active' WHERE  id=$id";


$result1= mysqli_query($conn, $sql3);

 
if($result1 == true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY UPDATED ARTICLE!!</div>";
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