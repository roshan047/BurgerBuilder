<?php

$servername='localhost';
$username='root';
$password='';
$dbname='burgerbuilder';
$db = new  mysqli($servername,$username,$password,$dbname) or die("not connected".$con->connection_error);



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
                
                <li><a href="cart.php">MY CART</a></li>
                <li><a href="">CONTACT US</a></li>
            </ul>
            <!--navigation section-->
        </div>
        <div class="content_wrapper">
            <!--content area-->
            <div id="headline"> 
                <div id="headline_content"></div>
                <b>WELCOME GUEST</b>
                <b style="color:white">SHOPING CART</b>
                <span>-ITEMS : -PRICE:</span>
            </div>
                <div id="product_box">
                <h1> BUNS </h1>
<?php
                
                
                        global $db;

                    
                        $get_products = "SELECT * FROM ingredients WHERE ing_cat ='1' ";
                        $run_product = mysqli_query($db,$get_products);
                
                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['ing_id'];
                             $pro_cat = $row_products['ing_cat'];
                            $pro_price = $row_products['ing_price'];
                            $pro_title = $row_products['ing_title'];
                            $pro_date = $row_products['ing_date'];
                            $pro_img = $row_products['ing_img'];
                            $pro_detail = $row_products['ing_detail'];
                            echo "
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                    <img src='admin_area/ingredients_images/$pro_img' width='100' height='100' /><br>
                                    <p><b>PRICE :  $pro_price RS</b><p>
                                    <a href='ditails.php?pro_id=$pro_id' style='float:left;'>DETAILS</a>
                                    <a href='index.php?add_cart=$pro_id'><button style='float:right;'>ADD</button></a>
                                                    
                                </div>
                            
                                ";
                           
                           
                        }
                
                        
                        
                   


?>
                     
                </div>



                
        </div>
       

    
        
        <div class="space">
            
    </div>

</div>


<div class="main_wrapper">
<div class="content_wrapper">
    <div id="product_box">
    <h1> TOPPINGS </h1>
                
                <?php
                
                global $db;
                
                
                $get_products = "SELECT * FROM ingredients WHERE ing_cat ='2' ";
                    $run_product = mysqli_query($db,$get_products);
                
                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['ing_id'];
                             $pro_cat = $row_products['ing_cat'];
                            $pro_price = $row_products['ing_price'];
                            $pro_title = $row_products['ing_title'];
                            $pro_date = $row_products['ing_date'];
                            $pro_img = $row_products['ing_img'];
                            $pro_detail = $row_products['ing_detail'];
                            echo "
                                <br>
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                    <img src='admin_area/ingredients_images/$pro_img' width='100' height='100' /><br>
                                    <p><b>PRICE :  $pro_price RS</b><p>
                                    <a href='ditails.php?pro_id=$pro_id' style='float:left;'>DETAILS</a>
                                    <a href='display_ingredient.php?add_build=$pro_id'><button style='float:right;'>ADD</button></a>
                                                    <br>
                                </div>
                            
                                ";
                           
                                

                                

                        
                        }
                
                
                ?>
                
                
    </div>      
</div>

<div class="space">
            
    </div>
     
</div>


<div class="main_wrapper">
<div class="content_wrapper">
    <div id="product_box">
                
    <h1> CHEESE </h1>
                <?php
                
                global $db;
                
                
                $get_products = "SELECT * FROM ingredients WHERE ing_cat ='3' ";
                    $run_product = mysqli_query($db,$get_products);
                
                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['ing_id'];
                             $pro_cat = $row_products['ing_cat'];
                            $pro_price = $row_products['ing_price'];
                            $pro_title = $row_products['ing_title'];
                            $pro_date = $row_products['ing_date'];
                            $pro_img = $row_products['ing_img'];
                            $pro_detail = $row_products['ing_detail'];
                            echo "
                                <br>
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                    <img src='admin_area/ingredients_images/$pro_img' width='100' height='100' /><br>
                                    <p><b>PRICE :  $pro_price RS</b><p>
                                    <a href='ditails.php?pro_id=$pro_id' style='float:left;'>DETAILS</a>
                                    <a href='index.php?add_cart=$pro_id'><button style='float:right;'>ADD</button></a>
                                                    <br>
                                </div>
                            
                                ";
                           
                                

                                

                        
                        }
                
                
                ?>
                
                
    </div> 
    <div class="space">
            
    </div>
     
</div>
</div>


<div class="main_wrapper">
<div class="content_wrapper">
    <div id="product_box">
    <h1> PATTIES </h1>
                
                <?php
                
                global $db;
                
                
                $get_products = "SELECT * FROM ingredients WHERE ing_cat ='4' ";
                    $run_product = mysqli_query($db,$get_products);
                
                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['ing_id'];
                             $pro_cat = $row_products['ing_cat'];
                            $pro_price = $row_products['ing_price'];
                            $pro_title = $row_products['ing_title'];
                            $pro_date = $row_products['ing_date'];
                            $pro_img = $row_products['ing_img'];
                            $pro_detail = $row_products['ing_detail'];
                            echo "
                                <br>
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                    <img src='admin_area/ingredients_images/$pro_img' width='100' height='100' /><br>
                                    <p><b>PRICE :  $pro_price RS</b><p>
                                    <a href='ditails.php?pro_id=$pro_id' style='float:left;'>DETAILS</a>
                                    <a href='index.php?add_cart=$pro_id'><button style='float:right;'>ADD</button></a>
                                                    <br>
                                </div>
                            
                                ";
                           
                                

                                

                        
                        }
                
                
                ?>
                
                
    </div> 
    <div class="space">
            
    </div>
     
</div>
</div>


<div class="main_wrapper">
<div class="content_wrapper">
    <div id="product_box">
    <h1> KETCHUPS </h1>
                
                <?php
                
                global $db;
                
                
                $get_products = "SELECT * FROM ingredients WHERE ing_cat ='5' ";
                    $run_product = mysqli_query($db,$get_products);
                
                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['ing_id'];
                             $pro_cat = $row_products['ing_cat'];
                            $pro_price = $row_products['ing_price'];
                            $pro_title = $row_products['ing_title'];
                            $pro_date = $row_products['ing_date'];
                            $pro_img = $row_products['ing_img'];
                            $pro_detail = $row_products['ing_detail'];
                            echo "
                                <br>
                                <div id='single_product'>
                                <h3>$pro_title</h3>
                                    <img src='admin_area/ingredients_images/$pro_img' width='100' height='100' /><br>
                                    <p><b>PRICE :  $pro_price RS</b><p>
                                    <a href='ditails.php?pro_id=$pro_id' style='float:left;'>DETAILS</a>
                                    <a href='index.php?add_cart=$pro_id'><button style='float:right;'>ADD</button></a>
                                                    <br>
                                </div>
                            
                                ";
                           
                                

                                

                        
                        }
                
                
                ?>
                
                
    </div> 
    <div class="footer">
            <h1 style="color:white; padding-top:30px; text-align:center";>copy write 2020 - BY WWW.BURGERBUILDER.COM</h1>
        <!--footer section-->
</div>
</div>
</div>



                         
</body>
</html>