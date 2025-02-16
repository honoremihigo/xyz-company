<?php
include("../auth/auth.php");
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM employee WHERE EmployeeId=$id");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
        <h1>edit employee</h1>
        <?php foreach($data as $emp){ ?>
            <form action="" class="form-style grid-form-style " method="post">
                <div>
                    <label for="">first name:</label>
                    <input type="text"  value="<?php echo $emp['FirstName'] ?>" required name="fname">
                </div>
                <div>
                    <label for="">last name:</label>
                    <input type="text" value="<?php echo $emp['LastName'] ?>"  required name="lname">
                </div>
                <div>
                    <label for="">gender:</label>
                    <select name="gender" id="">
                        <option selected disabled>choose your gender</option>
                        <option value="male" <?php if($emp['Gender'] == 'male') echo 'selected' ?>>male</option>
                        <option value="female" <?php if($emp['Gender'] == 'female') echo 'selected' ?>>female</option>
                    </select>
                </div>
                <div>
                    <label for="">date of birth:</label>
                    <input type="date" value="<?php echo $emp['DOB'] ?>" required name="dob">
                </div>
                <div>
                    <label for="">phone number:</label>
                    <input type="tel" value="<?php echo $emp['PhoneNumber'] ?>" required name="phone">
                </div>
                <div>
                    <label for="">email:</label>
                    <input type="text" value="<?php echo $emp['Department'] ?>" required name="email">
                </div>
                <button name="add">edit candidate</button>
            </form>
        <?php } ?>
        <a href="./employee.php">go back</a>
    </div>
</body>
</html>