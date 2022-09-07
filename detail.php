<?php
    session_start();
  include("includes/db.php");
  include("functions/functions1.php");
  
?>
<html>
<head>
<title>
burgerbuilder
</title>
<link rel="stylesheet" href="styles/mainframe.css" media="all" />
</head>
<body>
                                            <!-- main frame-->
    <div class="main_wrapper">
        <div class="header_wrapper">
            <img src="images/logo.jpg" style= "float:left ";>
            <img src="images/banner2.jpg" style="float:right";>
            <!--header staart here-->
            
        </div>
        <div id="navbar">
            <ul id="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="customer_register.php">SIGN UP</a></li>
                <li><a href="">MY ACCOUNT</a></li>
                <li><a href="display_ingredient.php">BUILD</a></li>
                <li><a href="cart.php">MY CART</a></li>
                <li><a href="">CONTACT US</a></li>
            </ul>
            <!--navigation section-->
        </div>
        <div class="content_wrapper">
            <?php cart(); ?>
            <!--content area-->
            <div id="headline"  style="line-height: 45px;"> 
                <div id="headline_content"  style="line-height: 36px;" ></div>
                <?php 
                    if(!isset($_SESSION['customer_email'])){
                        echo "<b>WELCOME GUEST</b> <b style='color:yellow'> YOUR CART</b>";

                    }
                    else{
                        echo "<b text-align:'center'>WELCOME : " . "<span style='color:skyblue' >" . $_SESSION['customer_email'] . "</span>" . "<b style='color:yellow'</b>" . "</b>";

                    }
                ?>
               
               <span text-align="center">-ITEMS : <?php items(); ?> - PRICE:  <?php total_price(); echo "RS" ;?>   
               
                <?php  
              if(!isset($_SESSION['customer_email'])){
                echo "<a href='checkout.php' style='color:yellow;'><b>LOGIN</b><a>";
              }
              else{
                  echo "<a href='logout.php' style='color:yellow;'><b>LOGOUT</b><a>";
              }
               ?>
                  </span>
            </div>
                <div id="product_box">
            <?php
                global $db;
            if(isset($_GET['pro_id'])){
                    $product_id=$_GET['pro_id'];
                    $get_products = "SELECT * FROM product WHERE product_id='$product_id'";
                    $run_product = mysqli_query($db,$get_products);
    
                 while($row_products=mysqli_fetch_array($run_product)){
                        $pro_id = $row_products['product_id'];
                        $pro_title = $row_products['product_title'];
                        $pro_date = $row_products['date'];
                        $pro_img = $row_products['product_img'];
                        $pro_price = $row_products['price'];
                        $pro_detail = $row_products['detail'];
                        $pro_status = $row_products['status'];
                        echo "
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                <img src='admin_area/product_images/$pro_img' width='300' height='300'  /><br>
                                <p><b>PRICE :  $pro_price RS</b><p>
                                <a href='index.php' style='float:left;'>BACK</a>
                                <a href='index.php?add_cart=$pro_id'><button style='float:right;'>ADD TO CART</button></a>
    
                                </div>
                               
                               
                                ";
                    }
                }
            ?>
                
                     
                </div>
            
        </div>
        
        <div class="footer">
            <h1 style="color:white; padding-top:30px; text-align:center";>copy write 2020 - BY WWW.BURGERBUILDER.COM</h1>
        <!--footer section-->
    </div>




















    </div>
</body>
</html>