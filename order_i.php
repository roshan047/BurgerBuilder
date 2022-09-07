<?php

include("includes/db.php");
  include("functions/function_i.php");
//getting customer id
if(isset($_GET['c_id'])){
    $customer_id = $_GET['c_id'];
}

        $sel_price = "SELECT * FROM build_b WHERE ip_add='::1' ";
        $run_price = mysqli_query($db,$sel_price);
        $count_pro=mysqli_num_rows($run_price);


for($i=0;$i<$count_pro;$i++){

//getting product price and number of item
        $ip_add= getrealip_i();
       
        $total = 0;
        $sel_price = "SELECT * FROM build_b WHERE ip_add='$ip_add' ";
        $run_price = mysqli_query($db,$sel_price);
        $status = 'pending';
        $invoice_no = mt_rand();
        while($record=mysqli_fetch_array($run_price)){
            $pro_id = $record['i_no'];
            $pro_price = "SELECT * FROM ingredients WHERE ing_id='$pro_id' ";
            $run_pro_price = mysqli_query($db,$pro_price);
            $p_price_i=mysqli_fetch_array($run_pro_price);
            $product_price_i=$p_price_i['ing_price'];
            $ingredient_title_i=$p_price_i['ing_title'];
            while($p_price=mysqli_fetch_array($run_pro_price)){
                $product_price=array($p_price['ing_price']);
                $values = array_sum($product_price);
                $total+=$values;
            }
        }
    
        //getting qunatity from cart

    $get_cart = "SELECT * FROM build_b";
    $run_cart = mysqli_query($con,$get_cart);
    $get_qty = mysqli_fetch_array($run_cart);
    $qty = $get_qty['qty'];
    if($qty==1){
        //$qty=1;
        $sub_total = $total;
    }
    else{
        $qty=$qty;
        $sub_total= $total*$qty;
    }
    $insert_order="INSERT INTO build_orders(customer_id,amount,invoice_no,date,status,ing_id,ing_o_title) VALUES('$customer_id','$product_price_i','$invoice_no',NOW(),'$status','$pro_id','$ingredient_title_i') ";
    $run_order=mysqli_query($con,$insert_order);
    
        
        

        

        $empty_cart ="DELETE FROM build_b WHERE i_no='$pro_id' ";
        $run_empty=mysqli_query($con,$empty_cart);
    

    
}
        echo "<script>alert('ORDER PLACED SUCCESSFULLY')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
?>