<body>
<?php
    if(isset($_GET['view_customer'])){

?>
    <table align="center" width="800" bgcolor="#FFCC99">
        <tr align="center">
            <td colspan="9"><h2 align="center">ALL CUSTOMERS</h2></td>
        </tr>
                <tr>
                    <th>S_NO</th>
                    <th>C_ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>CONTACT NO</th>
                   
                    
                    

                </tr>
                <?php

                    include("includes/db.php");
                    $i=0;
                    $get_pro="SELECT * FROM customer";
                    $run_pro=mysqli_query($con,$get_pro);
                    while($row_pro=mysqli_fetch_array($run_pro)){
                        $c_id=$row_pro['customer_id'];
                        $c_name = $row_pro['customer_name'];
                        $c_img = $row_pro['customer_img'];
                        $c_email = $row_pro['customer_email'];
                        $C_add = $row_pro['customer_add'];
                        $c_city = $row_pro['customer_city'];
                        $c_con = $row_pro['customer_contact'];
                       
                        $i++;
                    
                ?>
                <tr align="center">

                <td><?php echo $i ?></td>
                <td><?php echo $c_id ?></td>
                <td><?php echo $c_name ?></td>
                <td><img src="../customer/customer_images/<?php echo $c_img; ?>" width="50" height="50"></td>
                <td><?php echo $c_email; ?></td>
                <td><?php echo $C_add; ?></td>
                <td><?php echo $c_city; ?></td>
                <td><?php echo $c_con ?></td>
                
                
                
                </tr>
                    <?php } ?>
    </table>
                    <?php } ?>

</body>

</html>