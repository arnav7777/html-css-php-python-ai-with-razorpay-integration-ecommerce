

<?php include('../config/constants.php') ?>
<?php include('login-check.php');?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <link rel="icon" type="image/x-icon" href="../images/youslay-logo.png">
    <!--themify icons css-->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!--bootstrap 5 css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--style css-->
    <link rel="stylesheet" href="../css/admin.css">
    
    <!--responsive css-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!--bootstrap JS-->
     <script src="../js/bootstrap.min.js"></script>
   
  </head>

 <body>
    <section id="header">
     <nav class="navbar navbar-expand-lg stick-top ">
        <div class="container">
          <a class="navbar-brand" href="#">
              <img src="../images/youslay-logo.png" class="img-fluid">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-align-justify navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manage-admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manage-category.php">Category</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="manage-article.php">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manage-order.php">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manage-customer.php">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              
              </ul>
          </div>
        </div>
      </nav>
    </section>

     
 </body>

</html>