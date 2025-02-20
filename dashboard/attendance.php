<?php
include('../auth/auth.php');

$results = mysqli_query($conn, "SELECT * FROM employee ORDER BY FirstName ASC ");
$employees = mysqli_fetch_all($results, MYSQLI_ASSOC);
$empCount = mysqli_num_rows($results);
$count = 1;

$run_attendance_query = mysqli_query($conn, "SELECT * FROM employee INNER JOIN attendance ON employee.EmployeeId = attendance.EmployeeId");
$attendances = mysqli_fetch_all($run_attendance_query, MYSQLI_ASSOC);
$attendCount = mysqli_num_rows($run_attendance_query);

if (isset($_POST['add'])) {
    $empId = htmlspecialchars($_POST['empId']);
    $checkInTime = htmlspecialchars($_POST['checktime']);
    $status = htmlspecialchars($_POST['status']);
    $date = date('Y-m-d');
    $results = mysqli_query($conn, "INSERT INTO attendance VALUES('','$empId','$date','$checkInTime','','$status')");
    if ($results) {
        echo "<script>
        alert('attendance added sucessfully')
        window.location.href = window.location.href
        const formCont = document.querySelect('.hide-form-cont')
        formCont.classList.remove('showForm')
        </script>";
    } else {
        echo "<script>
        alert('attendance adding failed')
        </script>";
    }
}

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $results = mysqli_query($conn,"DELETE FROM attendance WHERE AttendanceId= '$id'");
    if ($results) {
        echo "<script>
        alert('attendance deleted sucessfully')
        window.location.href = window.location.href
        </script>";
    } else {
        echo "<script>
        alert('attendance deleteing failed')
        </script>";
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
    <script src="../script.js " defer></script>
</head>

<body>
    <?php include('../components/navbar.php') ?>
    <div class="dash-cont">
        <button class="showbtn">
            add attendance
        </button>
        <div class="form-hide-cont">
            <button class="hide">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="500" height="500">
                    <path d="M9.15625 6.3125L6.3125 9.15625L22.15625 25L6.21875 40.96875L9.03125 43.78125L25 27.84375L40.9375 43.78125L43.78125 40.9375L27.84375 25L43.6875 9.15625L40.84375 6.3125L25 22.15625Z" />
                </svg>
            </button>
            <h1>add attendance</h1>
            <form action="" class="form-style " method="post">
                <div>
                    <label for="">choose employee:</label>
                    <select name="empId" id="" required>
                        <option disabled selected>choose candidate</option>
                        <?php foreach ($employees as $employee) { ?>
                            <option value="<?php echo $employee['EmployeeId'] ?>"><?php echo $employee['FirstName'] ?> <?php echo $employee['LastName'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="">checkin time:</label>
                    <input type="time" required name="checktime">
                </div>
                <div>
                    <label for="">status:</label>
                    <select name="status" id="" required>
                        <option value="" selected disabled>choose status</option>
                        <option value="present">present</option>
                        <option value="absent">absent</option>
                        <option value="late">late</option>
                    </select>
                </div>
                <button name="add">add attendance</button>
            </form>
        </div>
        <div>
            <form action="" class="search-form-style" >
                <input type="search" placeholder="search by name">
                <button>search</button>
            </form>
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
                    <th>action</th>
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
                        <td class="td">
                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $emp['AttendanceId'] ?>" name="id">
                                <button name="del">delete</button>
                            </form>
                            <a href="./editAttendance.php?id=<?php echo $emp['AttendanceId'] ?>">edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>no candidate added yet</p>
        <?php } ?>
    </div>
</body>

</html>