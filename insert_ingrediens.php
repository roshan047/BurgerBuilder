<?php
    include("includes/db.php");
?>
<html>
    <head>
        
    </head>
    <body bgcolor="yellow">

    <form method="post" action="insert_ingrediens.php" enctype="multipart/form-data" >

        <table width="800" align="center" border="1" bgcolor="#999999" >
            <tr align="center">
                <td colspan="2" >
                    <h1><b>INSERT NEW  INGREDIENTS</b></h1>
                </td>
            </tr>
            <tr>
                <td><b>INGREDIENT CATEGORY NUMBER<b></td>
                <td>
                    
                    <input type="text" name="ing_cat" />
                </td>
            </tr>
            <tr>
                <td><b>INGREDIENT PRICE</b></td>
                <td>
                    <input type="text" name="ing_price" />
                </td>
            </tr>
            <tr>
                <td><b>INGREDIENT TITLE</b></td>
                <td>
                    <input type="TEXT" name="ing_title" />
                </td>
            </tr>
            <tr>
                <td><b>DATE</b></td>
                <td>
                    <input type="text" name="date" />
                </td>
            </tr>
            </tr>
            <tr>
                <td><b>INGREDIENT IMAGE</b></td>
                <td>
                    <input type="FILE" name="product_img1" />
                </td>
            </tr>
            <tr>
                <td><b>NGREDIENT DETAIL</b></td>
                <td>
                    <textarea name="detail"  size="50" maxsize="200" cols="20" rows="10">
                    </textarea>
                </td>
            
            <tr>
                <td colspan="2">
                    <input type="submit" name="insert_ingredient" value="INSERT INGREDIENT" />
                 <input type="reset" value="CLEAR ALL" />
                </td>
                <td>
            </tr>
        </table>      
    </form>
</body>
</html>





<?php
    if(isset($_POST['insert_ingredient'])){

        //text variables
        $product_cat=$_POST['ing_cat'];
        $product_price=$_POST['ing_price'];
        $product_title=$_POST['ing_title'];
        $product_date=$_POST['date'];
    
       
        $product_detail=$_POST['detail'];
        


        //image names


        $product_img1 = $_FILES['product_img1']['name'];


        //image temp names

        $temp_name=$_FILES['product_img1']['tmp_name'];



        if($product_title == '' OR $product_price == '' OR $product_detail == ''){
            echo("<script>alert('please fill all the fields !')</script>");
            exit();
        }
    

        else{

            move_uploaded_file($temp_name,"ingredients_images/$product_img1");


            $inert_product = "INSERT INTO ingredients(ing_cat,ing_price,ing_title
                                ,ing_date,ing_img,ing_detail) VALUES ('$product_cat','$product_price',
                                '$product_title',NOW(),'$product_img1','$product_detail')";


                $run_product = mysqli_query($con,$inert_product); 
                
                if($run_product){


                    echo "<script>alert('   ingredient inserted successfully !')</script>";

                    echo "<script>window.open('index.php?insert_ingrediens','_self')</script>";


                }
                else{
                    echo "<script>alert('   ingredient not inserted  !')</script>";
                    echo "<script>window.open('index.php?insert_ingrediens','_self')</script>";
                }


        }














    }

?>