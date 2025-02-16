<?php
include("../config/db.php");
session_destroy();
echo "<script>
alert('you logged out')
window.location.href = '../auth/login.php';
</script>";
?>