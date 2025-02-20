<?php
$date = date('Y-m-d');
include("../auth/auth.php");
$results = mysqli_query($conn, "SELECT * FROM employee");
$empCount = mysqli_num_rows($results);

$query = mysqli_query($conn, "SELECT DISTINCT * FROM attendance WHERE date='$date' AND Status='present' ");
$presentCount = mysqli_num_rows($query);

$late = mysqli_query($conn, "SELECT DISTINCT * FROM attendance WHERE date='$date' AND Status='late' ");
$lateCount = mysqli_num_rows($late);

$absent = mysqli_query($conn, "SELECT DISTINCT * FROM attendance WHERE date='$date' AND Status='late' ");
$absentCount = mysqli_num_rows($absent);

$run_attendance_query = mysqli_query($conn, "SELECT * FROM employee INNER JOIN attendance ON employee.EmployeeId = attendance.EmployeeId WHERE attendance.date='$date' ");
$attendances = mysqli_fetch_all($run_attendance_query, MYSQLI_ASSOC);
$run_attendance_query = mysqli_query($conn, "SELECT * FROM employee INNER JOIN attendance ON employee.EmployeeId = attendance.EmployeeId");
$attendances = mysqli_fetch_all($run_attendance_query, MYSQLI_ASSOC);
$attendCount = mysqli_num_rows($run_attendance_query);
$count = 1;



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
    <div class="dash-cont">
        <div>
            <h1>welcome,<?php echo $user ?></h1>
            <h2><?php echo date("l, F jS, Y") ?></h2>
        </div>
        <div class="count-card-cont">
            <div class="count-card">
                <h1><?php echo $empCount ?></h1>
                <h3>employee </h3>
            </div>
            <div class="count-card">
                <h1><?php echo $presentCount ?></h1>
                <h3>present employee </h3>
            </div>
            <div class="count-card">
                <h1><?php echo $lateCount ?></h1>
                <h3>late employee</h3>
            </div>
            <div class="count-card">
                <h1><?php echo $absentCount ?></h1>
                <h3>absent employee</h3>
            </div>
        </div>
        <?php if ($attendCount > 0) { ?>
            <table class="table-style">
                <tr>
                    <th>no</th>
                    <th>names</th>
                    <th>gender</th>
                    <th>status</th>
                    <th>check in time</th>
                    <th>check out time</th>
                    <th>date</th>
                </tr>

                <?php foreach ($attendances as $emp) { ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $emp['FirstName'] ?> <?php echo $emp['LastName'] ?> </td>
                        <td><?php echo $emp['Gender'] ?></td>
                        <td><?php echo $emp['Status'] ?></td>
                        <td><?php echo $emp['CheckInTime'] ?></td>
                        <td><?php echo $emp['CheckOutTime'] ?></td>
                        <td><?php echo $emp['date'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>no attendance made</p>
        <?php } ?>
    </div>
</body>

</html>