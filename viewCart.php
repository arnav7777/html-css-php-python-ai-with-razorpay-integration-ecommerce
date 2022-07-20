<?php 
 include('partials_web/navbar_ys.php');

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>
<html>

<head>
<title>You Slay | View Cart - Shopping Cart</title>
<script src="js/jquery.min.js"></script>
<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            alert('Cart update successful!!');
            location.reload();


        }else{
            alert('Refreshing the page to update Cart!!');
            location.reload();

        }
    });
}
</script>

</head>
<body>
<div class="container">
    <h3 class="m-3 p-1 fw-light ">SHOPPING CART</h3>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                
                                <th width="5%">Sn.</th>
                                <th width="25%">Product</th>
                                <th width="10%">Price</th>
                                <th width="7%">Quantity</th>
                                <th class="text-right" width="20%">Total</th>
                                <th width="10%"> </th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sn=1;
                            if($cart->total_items() > 0){ 
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
                                foreach($cartItems as $item){ 
                            ?>
                            <tr>
                               
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $item["title"]; ?></td>
                                <td><?php echo "₹".$item["discount_price"].''; ?></td>
                             <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td class="text-right"><?php echo "₹".$item["subtotal"].' '; ?></td>
                                <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;">Remove </button> </td>
                                
                            </tr>
                            <?php } }else{ ?>
                            <tr><td colspan="5"><h4 class="text-center fw-light">Empty Cart!</h4></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo "₹".$cart->total().''; ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2 mt-2">
                <div class="row">
                    <div class=" d-grid gap-2 mt-2 col-md-3">
                        <a href="index.php" class="btn col-sm-12 btn-warning text-white">Continue Shopping</a>
                    </div>
                    <div class=" d-grid gap-2 mt-2 col-md-3">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn col-sm-12 btn-primary">Checkout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php include('partials_web/footer_ys.php');?>

</html>