<?php
include("../config/db.php");
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else{
    echo "<script>alert('login first')</script>";
    echo "<script>window.location.href='../auth/login.php'</script>";
}
?>