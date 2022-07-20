<?php include('../config/constants.php'); ?>



    
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <title>Admin@Youslay | Delete Article</title>
    <link rel="icon" type="image/x-icon" href="../images/youslay-logo.png">
    <!--themify icons css-->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!--bootstrap 5 css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--responsive css-->
    <link rel="stylesheet" href="../css/responsive.css">
     <!--bootstrap JS-->
 <script src="js/bootstrap.min.js"></script>
 

</head>
<body class="container" style="background-color:lavenderblush">
<header class="fs-1 fw-light text-center m-5 p-5">
    Do You Want To Delete Article?</header>
    <form action="" method="POST" class="d-grid gap-2 col-6 mx-auto">
    
        <a href="<?php echo SITEURL;?>admin/manage-article.php" class="d-grid gap-2 col-6 mx-auto text-decoration-none">
        <button type="button" class="btn btn-outline-danger" name="n">Cancel</button>
    </a>
  <button type="submit" class="btn btn-outline-warning" name="y" >Yes!Do it</button>
  </form>
    </body>

     </html>  

<?php 


 $id= $_GET['id'];   
if(isset($_POST['y']))
       {
       
          $sql= "DELETE FROM tbl_shoppe WHERE id=$id";
          $res= mysqli_query($conn,$sql);
        
         if($res==true)
         {
          $_SESSION['add'] ="<div class='alert alert-danger'>SUCCESSFULLY DELETED ARTICLE!!</div>";

          header("Location:".SITEURL.'admin/manage-article.php');
         }
         else{
              echo "unSuccessful";
              header("Location:".SITEURL.'admin/manage-article.php');
            }
        }
        
  
?>

