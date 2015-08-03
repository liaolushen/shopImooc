<?php
require_once '../include.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
if (strtolower($verify) == strtolower($verify1)) {
    $sql = "select * from imooc_admin where username='{$username}' and password = '{$password}'";
    $row = checkAdmin($sql);
    if ($row) {
        $_SESSION['adminName'] = $row['username'];
        $_SESSION['adminId'] = $row['id'];
        header("location:index.php");
    } else {
        alertMes("login false", "login.php");
    }
} else {
    alertMes("verify wrong", "login.php");
}
