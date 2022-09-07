<?php
    include("includes/db.php");
    if(isset($_GET['edit_ing'])){
        $edit_id=$_GET['edit_ing'];
        $get_edit = "SELECT * FROM ingredients WHERE ing_id='$edit_id' ";
        $run_edit=mysqli_query($con,$get_edit);
        $row_edit=mysqli_fetch_array($run_edit);

        
        $upate_id=$row_edit['ing_id'];
        $p_title=$row_edit['ing_title'];
        $p_date=$row_edit['ing_date'];
        $p_img=$row_edit['ing_img'];
        $p_price=$row_edit['ing_price'];
        $p_detail=$row_edit['ing_detail'];
        

    }


?>
<html>
    <head>
        
    </head>
    <body bgcolor="yellow">

    <form method="post" action="" enctype="multipart/form-data" >

        <table width="800" align="center" border="1" bgcolor="#999999" >
            <tr align="center">
                <td colspan="2" >
                    <h1><b>EDIT INGREDIENTS INFORMTION</b></h1>
                </td>
            </tr>
            <tr>
                <td><b>PRODUCT TITLE<b></td>
                <td>
                    
                    <input type="text" name="product_title" value="<?php echo $p_title?>" />
                </td>
            </tr>
            <tr>
                <td><b>DATE</b></td>
                <td>
                    <input type="text" name="date" value="<?php echo $p_date?>"/>
                </td>
            </tr>
            <tr>
                <td><b>PRODUCT IMAGE</b></td>
                <td>
                    <input type="file" name="product_img1" value="<?php echo $p_img; ?>"/><br><img src="ingredients_images/<?php echo $p_img; ?>" width="50" height="50"/>
                </td>
            </tr>
            <tr>
                <td><b>PRICE</b></td>
                <td>
                    <input type="text" name="price" value="<?php echo $p_price; ?>" />
                </td>
            </tr>
            <tr>
                <td><b>DETAIL</b></td>
                <td>
                    <textarea cols="35" rows="10" name="detail" rows="8" ><?php echo $p_detail ;?>
                    </textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" name="update_pro" value="UPDATE" />
                 <input type="reset" value="CLEAR ALL" />
                </td>
                <td>
            </tr>
        </table>      
    </form>
</body>
</html>





<?php
    if(isset($_POST['update_pro'])){

        //text variables
        $product_title=$_POST['product_title'];
        $product_date=$_POST['date'];
    
        $product_price=$_POST['price'];
        $product_detail=$_POST['detail'];
        

        //image names


        $product_img1 = $_FILES['product_img1']['name'];


        //image temp names

        $temp_name=$_FILES['product_img1']['tmp_name'];



       
            move_uploaded_file($temp_name,"ingredients_images/$product_img1");
            global $upate_id;

            $inert_product = "UPDATE ingredients SET ing_title='$product_title',ing_date=NOW(),ing_img='$product_img1'
                                ,ing_price='$product_price',ing_detail='$product_detail' WHERE ing_id='$upate_id' ";


                $run_product = mysqli_query($con,$inert_product); 
                
                if($run_product){


                    echo "<script>alert('   product updated successfully !')</script>";

                    echo "<script>window.open('index.php?view_ingredients','_self')</script>";

                }
                else{
                    echo "<script>alert('   product not updated  !')</script>";
                    echo "<script>window.open('index.php?edit_ing','_self')</script>";
                }


        














    }

?>