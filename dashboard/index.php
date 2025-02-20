<?php
include("../auth/auth.php");
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
    <?php include('../components/navbar.php') ?>
   <div class="dash-cont" >
    <div class="count-card-cont" >
        <div class="count-card" >
            <h1>14</h1>
            <h3>present employee </h3>
        </div>
        <div class="count-card" >
            <h1>7</h1>
            <h3>late employee</h3>
        </div>
        <div class="count-card" >
            <h1>9</h1>
            <h3>absent employee</h3>
        </div>
    </div>
   </div>
</body>
</html>