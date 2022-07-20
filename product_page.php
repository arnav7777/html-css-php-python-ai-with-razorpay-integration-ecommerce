<?php include('partials_web/navbar_ys.php');
include_once 'Cart.class.php'; 
$cart = new Cart;
require_once 'config/constants.php';
 ?>



  <head>
  <title>
    You Slay | Product
  </title>
  </head>
<!-- product section -->


<?php
if(isset($_GET['id']))
{
$product_id=$_GET['id'];
$sql="SELECT *FROM tbl_shoppe WHERE id=$product_id";
 $res=mysqli_query($conn,$sql);

if($res==TRUE)
{
  $count= mysqli_num_rows($res);
  $c=0;
  if($count>0)
  {
    while($rows=mysqli_fetch_assoc($res))
    {
      $title=$rows['title'];
      $description=$rows['description'];
      $price=$rows['price'];
      $image_name=$rows['image_name'];
      $d_price=$rows['discount_price'];
      
?>


<div class="container p-5">
 <div class="row">
   <div class="col-md-6">
     <img src="<?php echo SITEURL; ?>images/article/<?php echo $image_name; ?>" alt="image" width=100%  height=100% class="mt-3 ">
    </div>
   

   <div class="col-md-6">
     <div class="col-md-12">
       <div class="row">
         <h2 class="mt-3 pt-3"><?php echo $title; ?></h2>
         <input type="hidden" name="article" value="<?php echo $title; ?>">
         </div>
     </div>
     <div class="row">
       <div class="col-md-12">
           <p class="description text-muted">
              YouSlay.co
           </p>
          </div>
       </div>
      
      <!--<div class="row">
        
        <div class="col-md-4 m-1">
          <span><h6 class="">Size:</h6></span>
          <select class="form-select-sm p-2 border-warning rounded " >
            <option selected>Select Size</option>
             <option value="sm">SM</option>
              <option value="m">M</option>
              <option value="l">L</option>
              <option value="xl">XL</option>
          </select>
          
        </div>
      </div>-->
      <div class="row">
        <div class="col-md-12 ">
          <h6 class="m-2 ">OUR PRICE:</h6>
          <span><h2 class="product-price"><?php echo"₹";echo $d_price; ?></h2></span>
         <input type="hidden" name="price" value="<?php echo"₹"; echo $d_price; ?>">

          <span class="text-decoration-line-through  fs-4 text-danger"><?php echo"₹";echo $price; ?></span>
          <span><?php (int)$dpercent=100-(($d_price/$price)*100); echo " (";echo (int)$dpercent; echo "% off )"; ?></span>
        </div>
      </div>

      <div class="row ">
         <div class="col-md-6 mt-2">
          
           
          <a href="cartAction.php?action=addToCart&id=<?php echo $product_id; ?>" name="addToCart" class="btn  btn-outline-warning ">
             Add to Cart </a></> 
             <input type="hidden" name="product_id" value="<?php echo $product_id ?>">         
         </div>
      </div><!-- end row -->
       <div>
        <ul class="nav nav-tabs mt-3">
         <li class="nav-item ">
           <a class="nav-link active" aria-current="page" >Description</a>
         </li>
       </ul>
       <p class="m-1"><?php echo $description; ?></p>
    </div>
         
  <?php
    }
  }
}
}
?>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

   </div>
  </div>
</div>






<?php include('partials_web/footer_ys.php');?>
