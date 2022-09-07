<html>
<head>
</head>
<body>
<?php
    if(isset($_GET['view_products'])){

?>
    <table align="center" width="800" bgcolor="#FFCC99">
        <tr align="center">
            <td colspan="7"><h2 align="center">VIEW ALL PRODUCT</h2></td>
        <tr>
                <tr>
                    <th>NO OF PRODUCT</th>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>DATE</th>
                    <th>PRICE</th>
                   
                    
                    

                </tr>
                <?php

                    include("includes/db.php");
                    $i=0;
                    $get_pro="SELECT * FROM product";
                    $run_pro=mysqli_query($con,$get_pro);
                    while($row_pro=mysqli_fetch_array($run_pro)){
                        $p_id=$row_pro['product_id'];
                        $p_img = $row_pro['product_img'];
                        $p_title = $row_pro['product_title'];
                        $p_date = $row_pro['date'];
                        $p_price = $row_pro['price'];
                       
                        $i++;
                    
                ?>
                <tr align="center">

                <td><?php echo $i ?></td>
                <td><img src="product_images/<?php echo $p_img; ?>" width="50" height="50"></td>
                <td><?php echo $p_title; ?></td>
                <td><?php echo $p_date; ?></td>
                <td><?php echo $p_price; ?></td>
                
                <td><a href="index.php?edit_pro=<?php echo $p_id; ?>">EDIT</td>
                <td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">DELETE</td>
                <td></td>

                
                </tr>
                    <?php } ?>
    </table>
                    <?php } ?>

</body>

</html>