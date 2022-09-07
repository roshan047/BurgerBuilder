<?php
    include("includes/db.php");
?>
<html>
    <head>
        
    </head>
    <body bgcolor="yellow">

    <form method="post" action="insert_product.php" enctype="multipart/form-data" >

        <table width="800" align="center" border="1" bgcolor="#999999" >
            <tr align="center">
                <td colspan="2" >
                    <h1><b>INSERT NEW PRODUCT</b></h1>
                </td>
            </tr>
            <tr>
                <td><b>PRODUCT TITLE<b></td>
                <td>
                    
                    <input type="text" name="product_title" />
                </td>
            </tr>
            <tr>
                <td><b>DATE</b></td>
                <td>
                    <input type="text" name="date" />
                </td>
            </tr>
            <tr>
                <td><b>PRODUCT IMAGE</b></td>
                <td>
                    <input type="file" name="product_img1" />
                </td>
            </tr>
            <tr>
                <td><b>PRICE</b></td>
                <td>
                    <input type="text" name="price" />
                </td>
            </tr>
            <tr>
                <td><b>DETAIL</b></td>
                <td>
                    <textarea name="detail"  size="50" maxsize="200" cols="20" rows="10">
                    </textarea>
                </td>
            </tr>
            <tr>
                <td><b>STATUS</b></td>
                <td>
                    <input type="text" name="status" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="insert_product" value="INSERT PRODUCT" />
                 <input type="reset" value="CLEAR ALL" />
                </td>
                <td>
            </tr>
        </table>      
    </form>
</body>
</html>





<?php
    if(isset($_POST['insert_product'])){

        //text variables
        $product_title=$_POST['product_title'];
        $product_date=$_POST['date'];
    
        $product_price=$_POST['price'];
        $product_detail=$_POST['detail'];
        $product_status=$_POST['status'];


        //image names


        $product_img1 = $_FILES['product_img1']['name'];


        //image temp names

        $temp_name=$_FILES['product_img1']['tmp_name'];



        if($product_title == '' OR $product_price == '' OR $product_detail == ''){
            echo("<script>alert('please fill all the fields !')</script>");
            exit();
        }
    

        else{

            move_uploaded_file($temp_name,"product_images/$product_img1");


            $inert_product = "INSERT INTO product(product_title,date,product_img
                                ,price,detail,status) VALUES ('$product_title',NOW(),
                                '$product_img1 ','$product_price','$product_detail','$product_status')";


                $run_product = mysqli_query($con,$inert_product); 
                
                if($run_product){


                    echo "<script>alert('   product inserted successfully !')</script>";

                    echo "<script>window.open('index.php?insert_product','_self')</script>";

                }
                else{
                    echo "<script>alert('   product not inserted  !')</script>";
                    echo "<script>window.open('index.php?insert_product','_self')</script>";
                }


        }














    }

?>