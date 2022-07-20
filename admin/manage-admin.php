<?php include ('partials/navbar-admin.php') ?>
<head>
<title>Admin@Youslay | Manage Admin</title>

</head>

<h1 class=" p-3 fw-light text-center bg-light">MANAGE ADMIN</h1>

<a href="<?php echo SITEURL;?>admin/add-admin.php">
<button type="button " class="btn btn-outline-warning m-3">ADD ADMIN</button>
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
      <th scope="col">FULLNAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">PASSWORD</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <?php
  $sql="SELECT *FROM tbl_admin";
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
        $full_name=$rows['full_name'];
        $username=$rows['username'];
        $password=$rows['password'];

        ?>

        
        <tbody> 
        <tr> 
        <th><scope="row"><?php echo $sn++; ?></th>
        <td><?php echo $full_name; ?></td>
        <td><?php echo $username; ?></td> 
        <td><?php echo $password; ?></td>
        <td >
          <a href="<?php echo SITEURL;?>admin/update-admin.php" class="btn-floating text-decoration-none">
            <button type="button" class="btn btn-outline-success ">Update Admin
              <i class="ti-pencil"></i>

            </button>
          </a>
          <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>">
          <button type="button" class="btn btn-outline-danger " >Delete Admin
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
  

  