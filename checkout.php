<?php 
include('partials_web/navbar_ys.php');

// Include the database config file 
require_once 'config/constants.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: index.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>You Slay | Checkout </title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<div class="container">
    <h2 class="text-center fs-normal m-3">CHECKOUT</h2>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
                <?php }if(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
				
                <div class="col-md-4 order-md-2 mb-4">
                    <h5 class="d-flex  align-items-center mb-3">
                        <span class="text-muted m-1">Your Cart</span>
                        <span class="badge bg-secondary  rounded-pill "><?php echo $cart->total_items(); ?></span>
                    </h5>
                    <ul class="list-group mb-3">
                        <?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $item["title"]; ?></h6>
                                <small class="text-muted"><?php echo"₹".$item["discount_price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo "₹".$item["subtotal"]; ?></span>
                        </li>
                        <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total :</span>
                            <strong><?php echo "₹".$cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="index.php" class="btn btn-block btn-info">Add Items</a>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Contact Details</h4>
                    <form  method="POST" id="checkout-selection">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
                                <input type="textbox" class="form-control" name="first_name" id="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']:''; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:''; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"  id="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:''; ?>" required>
                        </div>
                        <input type="hidden" name="action" value="placeOrder"/>
                        <input type="hidden"  name="amt"  id="amt" value="<?php echo $cart->total(); ?>"></input>
                        <input type="radio" name="checkout" value="COD">COD<br>
                        <input type="radio" name="checkout" value="Razorpay">Razorpay<br>

                        <input class="btn btn-success" type="submit" id="btn" name="checkoutSubmit" value="Place Order"  />
                    </form>
                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($) 
        {
            var form = $('#checkout-selection');
            var radio = $('input[name="checkout"]');
            var choice = '';

            radio.change(function(e) 
            {
                choice = this.value;
                if (choice === 'COD') 
                {    
                    form.attr('action', 'cartAction.php?placeOrder');
                } 
                else 
                {
                    
                    form.attr('action', 'razorpay/pay.php?checkout=automatic');
                }
            });
        });
    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('partials_web/footer_ys.php');?>




