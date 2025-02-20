<?php
include("../config/db.php");
if(isset($_POST['button'])){
    $uname = htmlspecialchars($_POST['uname']);
    $pass = htmlspecialchars($_POST['pass']);
    $fetchUser = "SELECT * FROM admin WHERE AdminName='$uname'";
    $query = mysqli_query($conn, $fetchUser);
    $checkUser = mysqli_num_rows($query);
    $user = mysqli_fetch_assoc($query);
    if($checkUser > 0){
        if($pass === $user["Password"]){
            $_SESSION['user'] = $uname;
            echo "<script>alert('login success')</script>";
            echo "<script>window.location.href='../dashboard/index.php';</script>";
        }else{
            echo"<script>alert('incorrect password')</script>";
        }
    }else{
        echo "<script>alert('user not found')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../scss/style.css">
</head>
<body>
    <div class="form-cont">
        <div class="logo-cont">
            <img src="../imgs/active_state_240px.png" alt="">
            <h1>sign in</h1>
        </div>
        <form action="" class="form-style" method="post" >
            <div class="input-cont">
                <label for="">username:</label>
                <input type="text" placeholder="enter your username" name="uname" required>
            </div>
            <div class="input-cont">
                <label for="">password:</label>
                <input type="password" placeholder="enter your password" name="pass" required>
            </div>
            <button name="button" >login</button>
            <div class="check-cont" >
            <p><a href="">forgot password</a></p>
            </div>
        </form>
    </div>
</body>
</html>