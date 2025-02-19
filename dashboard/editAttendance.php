<?php
include("../auth/auth.php");
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM attendance WHERE AttendanceId=$id");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);


if(isset($_POST['edit'])){
    $checkInTime = htmlspecialchars($_POST['checkin']);
    $status = htmlspecialchars($_POST['status']);
    $checkOutTime = htmlspecialchars($_POST['checkout']);
    $error = mysqli_error($conn);
    $query = mysqli_query($conn, "UPDATE attendance SET CheckInTime='$checkInTime' , CheckOutTime='$checkOutTime', Status='$status' WHERE AttendanceId=$id ");
    if ($query) {
        echo "<script>
        alert('attendance updating sucessfully')
        window.location.href = './attendance.php'
        </script>";
    } else {
        echo "<script>
        alert('attendance updating failed :')
        </script> $error ";
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
    <div class="form-cont " >
        <h1>edit attendance</h1>
        <?php foreach($data as $emp){ ?>
            <form action="" class="form-style" method="post">
                <div>
                    <label for="">check in time:</label>
                    <input type="time" value="<?php echo $emp['CheckInTime'] ?>" required  name="checkin">
                </div>
                <div>
                    <label for="">check out time:</label>
                    <input type="time" value="<?php echo $emp['CheckOutTime'] ?>" required  name="checkout">
                </div>
                <div>
                    <label for="">status</label>
                    <select name="status" id="" required >
                        <option value="" selected disabled > choose status </option>
                        <option value="present" <?php if( $emp['Status']== 'present') echo 'selected' ?> >present</option>
                        <option value="absent" <?php if( $emp['Status']== 'absent') echo 'selected' ?> >absent</option>
                        <option value="late" <?php if( $emp['Status']== 'late') echo 'selected' ?> >late</option>
                    </select>
                </div>
                <button name="edit">edit candidate</button>
            </form>
        <?php } ?>
        <a href="./attendance.php">go back</a>
    </div>
</body>
</html>