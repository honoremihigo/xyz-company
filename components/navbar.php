<?php
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
    <div class="nav">
        <div class="logo">
           <img src="../imgs/active_state_240px.png" alt="">
           <h1>xyz</h1>
        </div>
        <div class="nav-links">
            <a href="./index.php">dashboard</a>
            <a href="./employee.php">employees</a>
            <a href="./attendance.php">attendance</a>
            <div class="account-cont">
                <button class="btn" >setting</button>
                <div class="account">
                    <p>welcome,<?php echo $user ?></p>
                    <a href="../auth/logout.php">logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btn = document.querySelector('.btn')
        const cont = document.querySelector('.account')

        btn.onclick = function() {
            console.log(123);
            cont.classList.toggle('show')
        }
    </script>
</body>
</html>