<?php
include("../auth/auth.php")
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
    <h1><?php echo $user ?></h1>
</body>
</html>