<?php include('partials_web/navbar_ys.php');
include('config/constants.php');
?>
<head>
  <title>
    You Slay | Accessories
  </title>
  <link rel="stylesheet" href="css/article_layout_ys.css">

</head>
<body>
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header m-5">
									
										<h2>Accessories</h2>
								</div>
						</div>
				</div>
        <div class="col-md-12">
          <div class="row">

          
       
   
   
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
      $featured=$rows['featured'];
      $category_id=$rows['category_id'];
	  $active=$rows['active'];

      if($category_id== 2 && $active=='yes')
      {
      ?>
      <div class="col-6 col-md-3 col-sm-6 mt-2 mb-4">
      <form method="post" class=" shadow p-2 m-1 rounded "  action="product_page.php?id=<?php echo $id ?>" >
          <img src="<?php echo SITEURL; ?>images/article/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" style="height: 90%; width: 90%; background:none;" class="m-2  rounded " >
          <p class="mt-2 fw-1 fs-4"><?php echo $title; ?></p>
          <span class=" fw-2 fs-3"><?php echo $d_price; ?></span>
          <span class="text-primary text-decoration-line-through"><?php echo $price; ?></span>
          <small class=" text-danger"><?php $dpercent=100-(($d_price/$price)*100); echo " (";echo (int)$dpercent; echo "% off )"; ?></small>

          <div class="justify-content-center">
          <button name="view" class="btn btn-outline-warning mt-2 col-12" >View</button>
          </div>
        </form>
        </div>
        <?php
            }
          }
        }
      }
    
        ?>
        </div>
        </div>
    </div>


				
					
</section>

</body>
  
<?php include('partials_web/footer_ys.php');?>
