<?php include('partials_web/navbar_ys.php');
include('config/constants.php');

?>

<head>
  <title>
    You Slay | Home
  </title>
  
  <link rel="stylesheet" href="css/article_layout_ys.css">

</head>
<div class="m-3">
<form method="post" class="row col-md-8 p-2">
  <div class="col-sm-7">
	<input class="form-control" type="textbox" name="str" placeholder="Type here..." required/>
</div>
<div class="col-sm-5">
	<input  class="btn btn-outline-dark"type="submit" name="submit" value="Search"/>
</div>
</form>
</div>

<?php

if(isset($_POST['submit'])){
	$str=mysqli_real_escape_string($conn,$_POST['str']);
	$sql5="select id, title, image_name from tbl_shoppe where title 
	like '%$str%' or description like '%$str%'";
	$result=mysqli_query($conn,$sql5);
	if(mysqli_num_rows($result)>0){
    echo" <div class='fs-3 fw-normal m-2 p-4'>Recommended Items</div>";

		while($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $title=$row['title'];
      $image_name=$row['image_name'];


?>
          <a class="text-decoration-none fs-4 fw-light badge text-dark bg-light text-wrap col-md-2 m-3" href="product_page.php?id=<?php echo $id;?>">
            <img src="<?php echo SITEURL;?>images/article/<?php echo $image_name;?>" style="height: 90%; width: 90%; background:none;" class="m-2  rounded "></img> <?php echo $title; ?></a>
      <?php
    }
	}else{
		?>
    <div class="fs-4 fw-light text-dark m-3">No data found!</div><?php
	}
}
?>
    <!--Home-->
    <section id="home" class="home pt-1 overflow-unset">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          
          <div class="carousel-item active p-3">
          <div class="home-banner home-banner-1">
          <div class="home-banner-text text-dark p-1">
            <h1 >CLOTHING</h1>
            <a href="clothes_ys.php" class="btn text-uppercase m-1">View!</a>
            
          </div>
          </div>
         </div>
          <div class="carousel-item p-3">
          <div class="home-banner home-banner-2">
          <div class="home-banner-text p-1">
            <h1>ACCESSORIES</h1>
            <a href="accessories_ys.php" class="btn text-uppercase m-1">Click for more!</a>
          </div>
          </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


    </section>


<!--Products-->


<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header m-3">
									
										<h2>Popular Products</h2>
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
      if($featured=='yes')
      {
      ?>
      <div class="col-6 col-md-3 col-sm-6 mt-2 mb-4 p-2">
        <form method="post" class=" shadow p-2 m-1 rounded "  action="product_page.php?id=<?=$id ?>" >
          <img src="<?php echo SITEURL; ?>images/article/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" style="height: 90%; width: 90%; background:none;" class="m-2  rounded " >
          <p class="mt-2 fw-1 fs-4"><?php echo $title; ?></p>
          <span class=" fw-2 fs-3"><?php echo"₹";echo $d_price; ?></span>
          <span class="text-primary text-decoration-line-through"><?php echo"₹";echo $price; ?></span>
          <small class="text-danger "><?php $dpercent=100-(($d_price/$price)*100); echo " (";echo (int)$dpercent; echo "% off )"; ?></small>

          <div class="justify-content-center">
          <button name="view" class="btn btn-outline-warning mt-2 col-12 " >View</button>
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

<?php

?>
				
					
</section>


    <!-- ======= Our Team Section ======= 
    
        <section class="home-testimonial pt-4 ">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center testimonial-pos">
            
            <div class="col-md-12 d-flex justify-content-center ">
                <h2 class="text-dark">TESTIMONIALS</h2>
            </div>
        </div>
        <section class="home-testimonial-bottom">
            <div class="container testimonial-inner">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white mb-3 p-3">
                                
                                
                                <div class="d-flex justify-content-center mt-2 mb-2 p-2"><img class="tm-people" src="images/slider-1.jpg" alt=""></div>
                                <div class="link-name d-flex justify-content-center fs-4">Chikirsha Jain</div>
                                <div class="link-position d-flex justify-content-center">Founder</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white mb-3 p-3">
                            <div class="d-flex justify-content-center mt-2 mb-2 p-2"><img class="tm-people" src="images/slider-1.jpg" alt=""></div>
                                <div class="link-name d-flex justify-content-center fs-4">Bhumi Jain</div>
                                <div class="link-position d-flex justify-content-center">Founder</div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
        </section>
</section>

     End Our Team Section -->

    <?php include('partials_web/footer_ys.php');?>


  
