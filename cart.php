<?php
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
                <li><a href="customer/my_account.php">MY ACCOUNT</a></li>
                <li><a href="build.php">BUILD</a></li>
               
                <li><a href="contact_us.php">CONTACT US</a></li>
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
                   <form action="cart.php" method="post" enctype="multipart/form-data">
                    <table width="900" align="center" bgcolor="#0099CC">
                        <tr align="center">
                            <td><b>REMOVE</b></td>
                            <td><b>PRODUCT</b></td>
                            <td><b>QUANTITY</b></td>
                            <td><b>TOTAL PRICE</b></td>
                        </tr>
                        <?php 
                             $ip_add= getrealip();
                             
                             $total = 0;
                             $sel_price = "SELECT * FROM cart WHERE ip_add='$ip_add' ";
                             $run_price = mysqli_query($con,$sel_price);
                             while($record=mysqli_fetch_array($run_price)){
                                 $cart_no=$record['p_no'];
                                 $pro_id = $record['p_id'];
                                 $pro_price = "SELECT * FROM product WHERE product_id='$pro_id' ";
                                 $run_pro_price = mysqli_query($con,$pro_price);
                                 while($p_price=mysqli_fetch_array($run_pro_price)){
                                     $product_price=array($p_price['price']);
                                     $product_title = $p_price['product_title'];
                                     $product_img = $p_price['product_img'];
                                     $only_price=$p_price['price'];
                                     $values = array_sum($product_price);
                                     $total+=$values;
                                  
                                
                           ?>
                               
                        <tr align="center">
                        <td><a href="cart.php?remove_order=<?php echo $cart_no ?>">remove</a></td>
                            <?php
                                if(isset($_GET['remove_order'])){
                                    $delete_id=$_GET['remove_order'];
                                   $delete_pro="DELETE FROM cart WHERE p_no='$delete_id' ";
                                   $run_delete=mysqli_query($con,$delete_pro);
                                   if($run_delete){
                                    //echo "<script>alert('ITEM REMOVED')</script>";
                                   echo"<script>window.open('cart.php','_self')</script>";
                                   }
           
                                   }
           

                            ?>
                            <td><?php echo $product_title; ?><br><img src="admin_area/product_images/<?php echo $product_img; ?>" height="80" width="80"></td>
                            <td><input type="text" name="qty" value="1" size="3"></td>
                            <?php
                                //quantity of items in cart
                                  if(isset($_POST['update'])){
                                        $qty= $_POST['qty'];
                                        $insert_qty="UPDATE cart SET qty='$qty' WHERE ip_add='$ip_add'";
                                        $run_qty= mysqli_query($con,$insert_qty);
                                        $total=$total*$qty;
                                        
            
                                    
                                } 
                            ?>
                            <td><?php echo $only_price; ?></td>
                        </tr>
                            <?php } } ?>
                            <tr>
                                    <td colspan="4" align="right">
                                        <?php echo "TOTAL PRICE" ; ?>
                                 
                                 <b><?php echo $total . " RS"; ?></b>
                                 </td>   
                            </tr>
                            <tr></tr>
                            <tr>
                                    <td colspan="2" align="center"><input type="submit" name="update" value="UPDATE CART" style="color:red; border-radius:10px; height:30px; width:200px"> </td>
                                    <td><input type="submit" name="continue" value="BACK TO MENU" style="color:red; border-radius:10px; height:30px; width:200px"></td>
                                    <td><button><a href="checkout.php" style="color:green; border-radius:10px; height:50px; width:100px">CHECKOUT</a></button></td>
                            </tr>
                  </table>
                   </form>
                   
                   <?php
                   // update or remove cart items
                   function updatecart(){
                       global $con;
                    if(isset($_POST['update'])){
                        
                        }
                    
                        // back to menu
                    if(isset($_POST['continue'])){
                        echo "<script>window.open('index.php','_self')</script>";

                    }
                }
               echo @$up_cart = updatecart();
                   ?>
                </div>
            
        </div>
        
        <div class="footer">
            <h1 style="color:white; padding-top:30px; text-align:center;";>copy write 2020 - BY WWW.BURGERBUILDER.COM</h1>
        <!--footer section-->
    </div>




















    </div>
</body>
</html>