<?php
    session_start();
  include("includes/db.php");
  include("functions/function_i.php");
  
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
                <li><a href="customer/my_account.php">MY ACCOUNT</a></li>
                <li><a href="build.php">BUILD</a></li>
                <li><a href="cart_i.php">MY CART</a></li>
                <li><a href="my_account.php">CONTACT US</a></li>
            </ul>
            <!--navigation section-->
        </div>
        <div class="content_wrapper">
            <?php cart_i(); ?>
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
               
               <span text-align="center">-ITEMS : <?php items_i(); ?> - PRICE:  <?php total_price_i(); echo "RS" ;?>   
               
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
                <div id="product_box" >
                    <?php 
                        if(!isset($_SESSION['customer_email'])){
                            include("customer/customer_login.php");

                        }
                        else{
                            include("payment_options_i.php");
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