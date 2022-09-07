<?php
    include("includes/db.php");
    if(isset($_GET['delete_ing'])){
        $delete_id=$_GET['delete_ing'];
        $delete_pro="DELETE FROM ingredients WHERE ing_id='$delete_id' ";
        $run_delete=mysqli_query($con,$delete_pro);
        if($run_delete){
            echo "<script>alert('ITEM DELETED')</script>";
            echo"<script>window.open('index.php?view_ingredients','_self')</script>";
        }

    }
    ?>