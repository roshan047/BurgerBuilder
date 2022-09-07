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
                
                <li><a href="customer/my_account.php">MY ACCOUNT</a></li>
                <li><a href="build.php">BUILD</a></li>
                <li><a href="cart.php">MY CART</a></li>
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
                <div>
                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        <table width="500" height="500" bgcolor="yellow" align="center">
                            <tr><td colspan="2"  align="center"><h1><b>CREATE ACCOUNT</b></h1></td></tr>
                            <tr><td align="right"><b>NAME</b></td>
                            <td align="left"><input type="text" name="c_name" required style="height:10px;border: 0;background: none;display: block;margin: 5px auto;text-align: center;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></td></tr>
                            <tr><td  align="right"><b>EMAIL</b></td>
                            <td align="left"><input type="text" name="c_email" required style="height:10px;border: 0;background: none;display: block;margin: 5px auto;text-align: center;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></td></tr>
                            <tr><td  align="right"><b>PASSWORD</b></td>
                            <td align="left"><input type="password" name="c_pass" required style="height:10px;border: 0;background: none;display: block;margin: 5px auto;text-align: center;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></td></tr>
                            <tr><td  align="right"><b>COUNTRY</b></td>
                            <td align="center"><select name="c_country" style="display: block;">
                                <option>SELECT COUNTRY</option>
                                <option>INDIA</option>
                                <option>AMEERICA</option>
                                <option>CHINA</option>
                                </select>
                            </td></tr>
                            <tr><td  align="right"><b>CITY</b></td>
                            <td align="left"><input type="text" name="c_city" required style="height:10px;border: 0;background: none;display: block;margin: 5px auto;text-align: center;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></td></tr>
                            <tr><td  align="right"><b>CONTACT</b></td>
                            <td align="left"><input type="text" name="c_contact" required style="height:10px;border: 0;background: none;display: block;margin: 5px auto;text-align: center;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></td></tr>
                            <tr><td  align="right"><b>ADDRESS</b></td>
                            <td  align="left"><textarea rows="10" cols="30" name="c_add" required style="height:100px;border: 0;background: none;display: block;margin: 5px auto;border: 2px solid #3498db;padding: 14px 10px;width: 200px;outline: none;color: black;border-radius: 24px;transition: 0.25s;"></textarea></td></tr>
                            <tr><td  align="right"><b>IMAGE</b></td>
                            <td align="center"><input type="file" name="c_img"></td></tr>
                            <tr>
                            <td align="center"><input type="reset" name="c_reset" value="CLEAR"  style="color:green; border-radius:10px; height:30px; width:100px"></td>
                            <td  align="center"><input type="submit" name="c_register" value="SUBMIT"  style="color:green; border-radius:10px; height:30px; width:100px"></td>
                            </tr>
                        </table>
                    </form>
                     
                </div>
            
        </div>
        
        <div class="footer">
            <h1 style="color:white; padding-top:30px; text-align:center";>copy write 2020 - BY WWW.BURGERBUILDER.COM</h1>
        <!--footer section-->
    </div>
 </div>
</body>
</html>
<?php

if(isset($_POST['c_register'])){
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_add=$_POST['c_add'];
    $c_img=$_FILES['c_img']['name'];
    $c_img_tmp = $_FILES['c_img']['tmp_name'];
    $c_ip= getrealip();
    $insert_customer ="INSERT INTO customer(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_add,customer_img,customer_ip) VALUES('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_add','$c_img','$c_ip')";

    $run_customer=mysqli_query($con,$insert_customer);

    move_uploaded_file($c_img_tmp,"customer/customer_images/$c_img");

    $sel_cart = "SELECT * FROM cart WHERE ip_add='$c_ip' ";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_cart > 0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('YOUR ARE REGISTERED NOW')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('YOUR ARE REGISTERED NOW')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}



?>