<?php
include("../auth/auth.php");

$results = mysqli_query($conn, "SELECT * FROM employee ORDER BY FirstName ASC  ");
$employee = mysqli_fetch_all($results, MYSQLI_ASSOC);
$empCount = mysqli_num_rows($results);
$count = 1;

if (isset($_POST['add'])) {
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $department = htmlspecialchars($_POST['depart']);
    $dob = htmlspecialchars($_POST['dob']);
    $results = mysqli_query($conn, "INSERT INTO employee VALUES('','$fname','$lname','$gender','$dob','$phone','$department')");
    if ($results) {
        echo "<script>
        alert('employee added sucessfully')
        window.location.href = window.location.href
        const formCont = document.querySelect('.hide-form-cont')
        formCont.classList.remove('showForm')
        </script>";
    } else {
        echo "<script>
        alert('employee adding failed')
        </script>";
    }
}

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $results = mysqli_query($conn,"DELETE FROM employee WHERE EmployeeId= '$id'");
    if ($results) {
        echo "<script>
        alert('candidate deleted sucessfully')
        window.location.href = window.location.href
        </script>";
    } else {
        echo "<script>
        alert('candidate deleteing failed')
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
    <script src="../script.js" defer></script>
</head>

<body>
    <?php include('../components/navbar.php') ?>
    <div class="dash-cont">
        <h1>employee management</h1>
        <button class="showbtn">
            add employee
        </button>
        <div class="form-hide-cont">
            <button class="hide">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="500" height="500">
                    <path d="M9.15625 6.3125L6.3125 9.15625L22.15625 25L6.21875 40.96875L9.03125 43.78125L25 27.84375L40.9375 43.78125L43.78125 40.9375L27.84375 25L43.6875 9.15625L40.84375 6.3125L25 22.15625Z" />
                </svg>
            </button>
            <h1>add employee</h1>
            <form action="" class="form-style grid-form-style " method="post">
                <div>
                    <label for="">first name:</label>
                    <input type="text" required name="fname">
                </div>
                <div>
                    <label for="">last name:</label>
                    <input type="text" required name="lname">
                </div>
                <div>
                    <label for="">gender:</label>
                    <select name="gender" id="">
                        <option selected disabled>choose your gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div>
                    <label for="">date of birth:</label>
                    <input type="date" required name="dob">
                </div>
                <div>
                    <label for="">phone number:</label>
                    <input type="tel" required name="phone">
                </div>
                <div>
                    <label for="department">department:</label>
                    <input type="text" required name="depart">
                </div>
                <button name="add">add candidate</button>
            </form>
        </div>
        <?php if ($empCount > 0) { ?>
            <table class="table-style">
                <tr>
                    <th>no</th>
                    <th>names</th>
                    <th>gender</th>
                    <th>date of birth</th>
                    <th>phone</th>
                    <th>department</th>
                    <th>actions</th>
                </tr>
                <?php foreach ($employee as $emp) { ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $emp['FirstName'] ?> <?php echo $emp['LastName'] ?> </td>
                        <td><?php echo $emp['Gender'] ?></td>
                        <td><?php echo $emp['DOB'] ?></td>
                        <td><?php echo $emp['PhoneNumber'] ?></td>
                        <td><?php echo $emp['Department'] ?></td>
                        <td class="td">
                            <form action="" method="post" >
                                <input type="hidden" value="<?php  echo $emp['EmployeeId'] ?>" name="id" >
                                <button name="del" >delete</button>
                            </form>
                            <a href="./editEmployee.php?id=<?php echo $emp['EmployeeId']?>">edit</a>
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