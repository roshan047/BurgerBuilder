<?php

include("includes/db.php");
  include("functions/functions1.php");
//getting customer id
if(isset($_GET['c_id'])){
    $customer_id = $_GET['c_id'];
}


$get_items =" SELECT * FROM cart WHERE ip_add='::1' ";
        $run_items = mysqli_query($db,$get_items);
        $count_items = mysqli_num_rows($run_items);

for($i=0;$i<$count_items;$i++){   
            
//getting product rice and number of item
$ip_add= getrealip();
       
        $total = 0;
        $sel_price = "SELECT * FROM cart WHERE ip_add='$ip_add' ";
        $run_price = mysqli_query($db,$sel_price);
        $status = 'pending';
        $invoice_no = mt_rand();
       
        while($record=mysqli_fetch_array($run_price)){
            $pro_id = $record['p_id'];
            //$del_id = $get_qty['p_no'];
            $pro_price = "SELECT * FROM product WHERE product_id='$pro_id' ";
            $run_pro_price = mysqli_query($db,$pro_price);
            $p_price_o=mysqli_fetch_array($run_pro_price);
            $product_p=$p_price_o['price'];
            $product_t=$p_price_o['product_title'];
            while($p_price=mysqli_fetch_array($run_pro_price)){
                $product_price=array($p_price['price']);
                $values = array_sum($product_price);
                $total+=$values;
            }
        }
    
        //getting qunatity from cart
        $get_cart = "SELECT * FROM cart";
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

    

    $insert_order="INSERT INTO customer_orders(customer_id,due_amount,invoice_no,total_product,order_date,order_status,product_id,product_title) VALUES('$customer_id','$product_p','$invoice_no','$qty',NOW(),'$status','$pro_id','$product_t') ";
    $run_order=mysqli_query($con,$insert_order);
    
       
        
        


        $empty_cart = "DELETE FROM cart WHERE p_id='$pro_id' ";
        $run_empty=mysqli_query($con,$empty_cart);

       
        
   


}
       


echo "<script>alert('ORDER PLACED SUCCESSFULLY')</script>";
       
echo "<script>window.open('customer/my_account.php','_self')</script>";

    

    


    
?>