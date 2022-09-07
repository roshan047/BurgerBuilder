<?php
    session_start();
    include("includes/db.php");



?>


<html>
<head>
    <link rel="stylesheet" href="styles/login_style.css">
</head>
<body>
<form class="box" action="admin_login.php" method="post">
    <h1>ADMIN LOGIN</h1>
    <input type="text" name="u_name" placeholder="username">
    <input type="password" name="pass" placeholder="password">
    <input type="submit" name="login" value="LOGIN">



</form>


</body>
</html>


<?php
    if(isset($_POST['login'])){
        $user_name=$_POST['u_name'];
        $user_pass=$_POST['pass'];

        $sel_admin = "SELECT * FROM admins WHERE a_name='$user_name' AND a_pass='$user_pass' ";

        $run_admin=mysqli_query($con,$sel_admin);

        $check_admin = mysqli_num_rows($run_admin);
        if($check_admin==1){
            $_SESSION['a_name']=$user_name;
            echo "<script>window.open('index.php?logged_in=LOGIN SUCCESSFUL','_self')</script>";
        }
        else{
            echo "<script>alert('INVAILED USERNAME OR PASSWORD')</script>";
        }
    }




?>