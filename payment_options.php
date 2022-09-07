<html>
<head></head>
<body>
<?php

  include("includes/db.php");
  
  
  //include("functions/functions1.php");
?>


<div>
<?php
$ip= getrealip();
$get_customer = "SELECT * FROM customer WHERE customer_ip='$ip' ";
$run_customer=mysqli_query($con,$get_customer);
$customer = mysqli_fetch_array($run_customer);
$customer_id = $customer['customer_id'];

?>
<table align="center" bgcolor="yellow" width="900" height="200">
<tr>
    <td  align="center">
<h1><b>PAYMENT OPTIONS</b></h1>
</td>
    </tr>
    <tr>
    <td  align="center">
<b><a href="order.php?c_id=<?php echo $customer_id ; ?>">PAY ON DILIVERY</a></b>
</td>
    </tr>
    </table>
</div>
</body>
</html>