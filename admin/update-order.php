<?php include ('partials/navbar-admin.php') ?>
<?php

if(isset($_GET['id']))
{
  $id=$_GET['id'];
   
 
// Fetch order details from database 
$result = $conn->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone,c.address FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_GET['id']); 
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){ 
    $orderInfo = mysqli_fetch_assoc($result); 
    $curr_status=$orderInfo['status'];
}
?>


<head>
<title>You Slay | Update Order</title>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>



</head>

<body>

<header class=" fw-light bg-light text-center fs-2 p-2"> UPDATE/VIEW ORDER </header>

    
<div  class="container  p-5">
<form action="" method="POST" enctype="multipart/form-data">
    
			
            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <h3 class="text-success"><b>Order ID:</b> #<?php echo $orderInfo['id']; ?></h3>
                <h4 class="text-danger"><b>Total:</b> <?php echo "₹".$orderInfo['grand_total']; ?></h4>
                <label for="status" class="form-label fw-bold fs-5"  > Status: </label>             

                <select name="status" class="form-select ">
    <option value="Pending" name="Pending"<?php if($curr_status=="Pending") { echo "SELECTED"; } ?>>Pending</option>
    <option value="Dispatched" name="Dispatched"<?php if($curr_status=="Dispatched") { echo "SELECTED"; } ?>>Dispatched</option>
    <option value="Completed" name="Completed"<?php if($curr_status=="Completed") { echo "SELECTED"; } ?>>Completed</option>
    <option value="Cancelled" name="Cancelled"<?php if($curr_status=="Cancelled") { echo "SELECTED"; } ?>>Cancelled</option>
  </select>
                
                <p><b>Placed On:</b> <?php echo $orderInfo['created']; ?></p>
                <p><b>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p>
                <p><b>Email:</b> <?php echo $orderInfo['email']; ?></p>
                <p><b>Phone:</b> <?php echo $orderInfo['phone']; ?></p>
                <p><b>Address:</b> <?php echo $orderInfo['address']; ?></p>
            </div>
			
            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $result = $conn->query("SELECT i.*, p.title, p.discount_price FROM order_items as i LEFT JOIN tbl_shoppe as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($num_rows > 0){  
                            while($item = mysqli_fetch_assoc($result)){ 
                                $price = $item['discount_price']; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
                        <tr>
                            <td><?php echo $item["title"]; ?></td>
                            <td><?php echo "₹".$price; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo "₹".$sub_total; ?></td>
                        </tr>
                        <?php } 
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
   <input type="hidden" name="id" value="<?php echo $id?>" >

  <button type="submit" name="submit" class="btn btn-outline-danger mt-4">Update Order</button>
  <a href="<?php echo SITEURL; ?>admin/manage-order.php" class="btn btn-outline-info mt-4">Back</a>
    </div>
                      </form>
        </div>

</body>
<?php
if(isset($_POST['submit']))
{

 $curr_status=$_POST['status'];

 $result1=$conn->query("UPDATE orders SET 
status='$curr_status' WHERE  id=$id");



if($result1==true)
{

  $_SESSION['add'] ="<div class='alert alert-success'>SUCCESSFULLY UPDATED ORDER!!</div>";
  header('Location:'.SITEURL.'admin/manage-order.php'); 
}
else
{
  $_SESSION['add'] ="<div class='alert alert-danger'>UNSUCCESSFUL!! PLEASE TRY AFTER SOME TIME.</div>";
 
  header('Location:'.SITEURL.'admin/manage-order.php');
}

}
?>

