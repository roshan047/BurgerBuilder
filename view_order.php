<body>
<?php
    if(isset($_GET['view_order'])){

?>
    <table align="center" width="800" bgcolor="#FFCC99">
        <tr align="center">
            <td colspan="9"><h2 align="center">ALL CUSTOMERS</h2></td>
        </tr>
                <tr>
                    <th>ORDER_NO</th>
                   
                    <th>CUSTOMER</th>
                    <th>amount</th>

                    <th>INVOICE_NO</th>
                    <th>PRODUCT_ID</th>
                    <th>QUANTITY</th>
                    <th>STATUS</th>
                    <th>NAME</th>
                    <th>OPTION</th>
                    
                   
                    
                    

                </tr>
                <?php

                    include("includes/db.php");
                    $i=0;
                    $get_pro="SELECT * FROM customer_orders";
                    $run_pro=mysqli_query($con,$get_pro);
                    while($row_pro=mysqli_fetch_array($run_pro)){
                        $o_no=$row_pro['order_id'];
                        $c_id = $row_pro['customer_id'];
                        $amt = $row_pro['due_amount'];
                        $v_no = $row_pro['invoice_no'];
                        $p_id = $row_pro['product_id'];
                        $qty = $row_pro['total_product'];
                        $status = $row_pro['order_status'];
                        $p_title=$row_pro['product_title'];
                        $i++;
                    
                ?>
                <tr align="center">

                <td><?php echo $o_no ?></td>
                <td><?php echo $c_id ?></td>
                <td><?php echo $amt ?></td>
                <td><?php echo $v_no ?></td>
                <td><?php echo $p_id; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $p_title; ?></td>
                <td><a href="delete_order.php?delete_order=<?php echo $o_no ?>">CANCEL</a></td>
                
                
                
                </tr>
                    <?php } ?>
    </table>
                    <?php } ?>

</body>

</html>