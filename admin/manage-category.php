<?php include ('partials/navbar-admin.php') ?>

<head>
<title>Admin@Youslay | Manage Category</title>

</head>

<h1 class=" p-3 fw-light text-center bg-light">MANAGE CATEGORY</h1>

<a href="<?php echo SITEURL;?>admin/add-category.php">
<button type="button " class="btn btn-outline-warning m-3">ADD CATEGORY</button>
</a>

<div class="table-responsive-md m-5">
<table class="table table-borderless table-hover  ">
<?php
if (isset($_SESSION['add']))
{
   echo $_SESSION['add'];
  unset ($_SESSION['add']);
}

?>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">IMAGE</th>
      <th scope="col">FEATURED</th>
      <th scope="col">ACTIVE</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <?php
  $sql="SELECT *FROM tbl_category";
  $res=mysqli_query($conn,$sql);

  if($res==TRUE)
  {
    $count= mysqli_num_rows($res);
    $sn=1;
    if($count>0)
    {
      while($rows=mysqli_fetch_assoc($res))
      {
        $id=$rows['id'];
        $title=$rows['title'];
        $image_name=$rows['image_name'];
        $featured=$rows['featured'];
        $active=$rows['active'];

        ?>

        
        <tbody> 
        <tr> 
        <th><scope="row"><?php echo $sn++ ?></th>
        <td><?php echo $title ?></td>
        <td>
          
        <?php 
              if($image_name!="")
              {
                ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="100px">

                <?php

              }
              else{
                echo"<div class='text-muted'>Image not Added</div>";
              }

              
              ?>
      
      </td>
        <td><?php echo $featured ?></td> 
        <td><?php echo $active ?></td>
        <td >
          <a href="<?php echo SITEURL;?>admin/update-category.php" class="btn-floating text-decoration-none">
            <button type="button" class="btn btn-outline-success ">Update Category
              <i class="ti-pencil"></i>

            </button>
          </a>
          <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>">
          <button type="button" class="btn btn-outline-danger " >Delete Category
            <i class="ti-trash "></i>

          </button>
        </a>
        </td>
        </tbody>
      </div>
        

        <?php
        }
    }
    else{

    }
  }
  ?>

  </table>
  

  