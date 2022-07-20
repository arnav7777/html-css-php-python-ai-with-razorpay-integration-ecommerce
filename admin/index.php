<?php include ('partials/navbar-admin.php'); ?>

<html>
  <head>
  <title>Admin@Youslay | Dashboard</title>

  </head>
    <h1 class=" p-3 fw-light text-center bg-light">DASHBOARD</h1>
    <div class="m-3 p-1 row">
        
<div class="card border-info m-3 mx-auto " style="max-width: 18rem;">
  <div class="card-header fw-bold fs-3"> CATEGORIES</div>
  <?php
    $sql="SELECT *FROM tbl_category";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    
    ?>
  <div class="card-body">
    <p class="card-text fw-bold fs-3 text-center"><?php echo $count; ?></p>
  </div>
</div>

<div class="card border-info m-3 mx-auto" style="max-width: 18rem;">
  <div class="card-header fw-bold fs-3">TOTAL ORDERS</div>
  <?php
    $sql2="SELECT *FROM orders";
    $res2=mysqli_query($conn,$sql2);
    $count2=mysqli_num_rows($res2);
    
    ?>
  <div class="card-body">
    <p class="card-text fw-bold fs-3 text-center"><?php echo $count2; ?></p>
  </div>
</div>
<div class="card border-info m-3 mx-auto" style="max-width: 18rem;">
  <div class="card-header fw-bold fs-3">TOTAL REVENUE</div>
  <?php
   
    $sql3="SELECT SUM(grand_total) AS totalrev FROM orders where status='Completed'";
    $res3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_assoc($res3);
    
    
    ?>
  <div class="card-body">
    <p class="card-text fw-bold fs-3 text-center" ><?php
    if($row3['totalrev']>0){
       echo "₹".$row3["totalrev"];} 
    else{
      echo "₹ 0";}
      ?></p>
  </div>
</div>
</div>

</html>