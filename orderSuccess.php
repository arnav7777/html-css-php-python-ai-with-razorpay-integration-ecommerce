<?php 


if(!isset($_REQUEST['id'])){ 
    header("Location: index.php"); 
} 
 
// Include the database config file 
require_once 'config/constants.php'; 
 
// Fetch order details from database 
$result = $conn->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone,c.address FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']); 
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){ 
    $orderInfo = mysqli_fetch_assoc($result); 
}/*else{ 
    header("Location: index.php"); 
} */
?>


<head>
<title>You Slay | Order Status</title>
<link rel="icon" type="image/x-icon" href="images/youslay-logo.png">


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>

<body>
<section id="header">
        <div class="container text-center mb-5 mt-5">
        
              <img src="images/youslay-logo.png" class="img-fluid" style="background:none;">
          
</div>

</section>

    <div  class="container bg-light p-5">
    <h1 class="text-center m-5 fw-lighter">ORDER STATUS</h1>
    <div class="col-md-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
            <div class="alert alert-success" role="alert">
             <h4 class="alert-heading">Order Placed Succesfully!</h4>
             <p>Thank You For Shopping With You Slay! You will get a call from our Admin for confirmation of order.</p>
             <hr>
             <p class="mb-0 text-danger">Please take a Screenshot of this Page for future references.</p>
            </div
            </div>
			
            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="m-1 fw-bold text-decoration-underline">ORDER INFO :</div>
                <p><b>Reference Order ID:</b> #<?php echo $orderInfo['id']; ?></p>
                <p class="fs-3"><b class="text-danger">Total:</b> <?php echo "₹".$orderInfo['grand_total']; ?></p>
                <p><b>Placed On:</b> <?php echo $orderInfo['created']; ?></p>
                <p><b>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p>
                <p><b>Email:</b> <?php echo $orderInfo['email']; ?></p>
                <p><b>Phone:</b> <?php echo $orderInfo['phone']; ?></p>
                <p><b>Address:</b> <?php echo $orderInfo['address']; ?></p>
                <p><b>Payment Type:</b> <?php echo $orderInfo['pay_type']; ?></p>

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
                                $price = $item["discount_price"]; 
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
        <?php } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed!</div>
        </div>
        <?php } ?>
    </div>
        </div>
</body>
<div class=" text-center m-5 p-3">
                        <a href="index.php" class="btn btn-block btn-warning btn-lg">Shop More!</a>
                    </div>
