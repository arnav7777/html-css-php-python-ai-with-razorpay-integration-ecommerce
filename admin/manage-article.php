<?php include ('partials/navbar-admin.php') ?>

<head>
<title>Admin@Youslay | Manage Article</title>

</head>

<h1 class=" p-3 fw-light text-center bg-light">MANAGE ARTICLE</h1>

<a href="<?php echo SITEURL;?>admin/add-article.php">
<button type="button " class="btn btn-outline-warning m-3">ADD ARTICLE</button>
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
      <th scope="col" width="2%">ID</th>
      <th scope="col" width="5%">TITLE</th>
      <th scope="col"width="15%">DESCRIPTION</th>
      <th scope="col"width="5%">OG_PRICE</th>
      <th scope="col"width="5%">D_PRICE</th>
      <th scope="col"width="5%">IMAGE</th>
      <th scope="col"width="5%">CATEGORY</th>
      <th scope="col"width="5%">FEATURED</th>
      <th scope="col"width="5%">ACTIVE</th>
      <th scope="col"width="15%"></th>
    </tr>
  </thead>

  <?php
  $sql="SELECT *FROM tbl_shoppe";
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
        $description=$rows['description'];
        $price=$rows['price'];
        $d_price=$rows['discount_price'];
        $image_name=$rows['image_name'];
        $category_id=$rows['category_id'];
        $featured=$rows['featured'];
        $active=$rows['active'];

        ?>

        
        <tbody> 
        <tr> 
        <th><scope="row"><?php echo $sn++ ?></th>
        <td><?php echo $title; ?></td>
        <td><?php echo $description; ?></td> 
        <td><?php echo $price; ?></td>
        <td><?php echo $d_price; ?></td>
        <td><?php 
              if($image_name!="")
              {
                ?>
                <img src="<?php echo SITEURL; ?>images/article/<?php echo $image_name;?>" width="100px">

                <?php

              }
              else{
                echo"<div class='text-muted'>Image not Added</div>";
              }

              
              ?></td>
        <td><?php echo $category_id; ?></td>
        <td><?php echo $featured; ?></td>
        <td><?php echo $active; ?></td>
        <td >
          <a href="<?php echo SITEURL;?>admin/update-article.php ?id=<?php echo $id; ?>" class="btn-floating text-decoration-none">
            <button type="button" class="btn btn-outline-success ">Update Article
              <i class="ti-pencil"></i>

            </button>
          </a>
          <a href="<?php echo SITEURL; ?>admin/delete-article.php?id=<?php echo $id; ?>">
          <button type="button" class="btn btn-outline-danger " >Delete Article
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
  

  