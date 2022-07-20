<?php 

include_once 'Cart.class.php'; 
$cart = new Cart; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <link rel="icon" type="image/x-icon" href="images/youslay-logo.png">


    <!--themify icons css-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <!--bootstrap 5 css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--style css-->

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/founders.css">
     
   <!--bootstrap JS-->
   <script src="js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body data-bs-spy="scroll" data-bs-target=".navbar">
    

    <!--Navbar-->
    <section id="header">
    <nav class="navbar navbar-expand-lg stick-top ">
        <div class="container">
          <a class="navbar-brand" href="index.php">
              <img src="images/youslay-logo.png" class="img-fluid" style="background:none;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-align-justify navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            
              <li class="nav-item">
                <a class="nav-link"  href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="http://127.0.0.1:5000">talk to our chatbot!</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact_ys.php">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Products
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="accessories_ys.php">Accessories</a></li>
                  <li><a class="dropdown-item" href="clothes_ys.php">Clothing</a></li>
                </ul>
              
              </li>
              <li class="nav-item">
              
        <a href="viewCart.php"  class="nav-link text-decoration-none">Cart
           (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'0'; ?>)</a>
    
              </li>
              </ul>
          </div>
        </div>
      </nav>
    </section>
    
</body>