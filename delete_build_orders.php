<?php
    include("includes/db.php");
    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];
        $delete_pro="DELETE FROM build_orders WHERE order_no='$delete_id' ";
        $run_delete=mysqli_query($con,$delete_pro);
        if($run_delete){
            echo "<script>alert('ORDER CANCELED')</script>";
            echo"<script>window.open('index.php?view_build_orders','_self')</script>";
        }

    }
    ?>