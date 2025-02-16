<?php
include("../config/db.php");

if (isset(($_POST['signup']))) {
    $uname = htmlspecialchars($_POST['uname']);
    $pass = htmlspecialchars($_POST['pass']);

    $fetchUser = "SELECT AdminName FROM admin WHERE AdminName='$uname'";
    $query = mysqli_query($conn, $fetchUser);
    $check = mysqli_num_rows($query);

    if ($check > 0) {
        echo "<script>alert('user already exist')</script>";
    } else {
        $addUser = "INSERT INTO admin VALUES ('','$uname','$pass')";
        $query = mysqli_query($conn, $addUser);
        if ($query) {
            echo "<script>
            alert('user registered successfully')
            window.location.href='./login.php'
            </script>";
        } else {
            echo "<script>alert('user registered failed')</script>";
            echo mysqli_errno($conn) . "" . mysqli_error($conn);
        }
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
            <h1>sign up</h1>
        </div>
        <div>
            <form action="" method="post" class="form-style">
                <div class="input-cont">
                    <label for="">username:</label>
                    <input type="text" placeholder="enter username" name="uname" required>
                </div>
                <div class="input-cont">
                    <label for="">password:</label>
                    <input type="text" placeholder="enter pass" name="pass" required>
                </div>
                <button name="signup">sign up</button>
                <div class="check-cont">
                    <p>if you arleady have an account <a href="./login.php">sign in</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
</form>