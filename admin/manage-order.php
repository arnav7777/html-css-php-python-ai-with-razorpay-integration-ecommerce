<?php include ('partials/navbar-admin.php') ?>

<head>
<title>Admin@Youslay | Manage Order</title>

</head>
<h1 class=" p-3 fw-light text-center bg-light">MANAGE ORDER</h1>
<div class="table-responsive m-5">
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
      <th scope="col"> ORDER ID</th>
      <th scope="col">ORDER DATE/TIME</th>
      <th scope="col">TOTAL PRICE</th>
      <th scope="col">PAYMENT TYPE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <?php
  $sql="SELECT *FROM orders";
  $res=mysqli_query($conn,$sql);

  if($res==TRUE)
  {
    $count= mysqli_num_rows($res);
    
    if($count>0)
    {
      while($rows=mysqli_fetch_assoc($res))
      {
        $id=$rows['id'];
        $t_price=$rows['grand_total'];
        $created=$rows['created'];
        $status=$rows['status'];
        $pay_type=$rows['pay_type'];

        ?>

        
        <tbody> 
        <tr> 
        <th><scope="row"><?php echo $id; ?></th>
        <td><?php echo $created; ?></td>
        <td><?php echo "₹".$t_price; ?></td> 
        <td><?php echo $pay_type; ?></td> 

        <td><?php
        if($status=="Cancelled")
        {
          echo "<div class='text-danger fw-bold'>$status</div>";
        }else if($status=="Completed")
        {
          echo "<div class='text-success fw-bold'>$status</div>";
        } else{echo $status; }?></td>
        <td >

          <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-floating text-decoration-none">
            <button type="button" class="btn btn-outline-success ">Update/View Order
              <i class="ti-pencil"></i>

            </button>
          </a>
          <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id; ?>">
          <button type="button" class="btn btn-outline-danger " >Delete Order
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
  

  