<?php include ('partials/navbar-admin.php') ?>
<head>
<title>Admin@Youslay | Manage Customers</title>

</head>

<h1 class=" p-3 fw-light text-center bg-light">MANAGE CUSTOMERS</h1>



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
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">ADDRESS</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <?php
  $sql="SELECT *FROM customers";
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
        $f_name=$rows['first_name'];
        $l_name=$rows['last_name'];
        $email=$rows['email'];
        $phone=$rows['phone'];
        $add=$rows['address'];

        ?>

        
        <tbody> 
        <tr> 
        <th><scope="row"><?php echo $id; ?></th>
        <td><?php echo $f_name; ?></td>
        <td><?php echo $l_name; ?></td> 
        <td><?php echo $email; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $add; ?></td>
        <td >
          
          <a href="<?php echo SITEURL; ?>admin/delete-customer.php?id=<?php echo $id; ?>">
          <button type="button" class="btn btn-outline-danger " >Delete Customer
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
  

  