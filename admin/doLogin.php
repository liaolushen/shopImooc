<?php
require_once '../include.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
@$autoFlag = $_POST['autoFlag']; // 可能有警告，直接忽略
if (strtolower($verify) == strtolower($verify1)) {
    $sql = "select * from imooc_admin where username='{$username}' and password = '{$password}'";
    $row = checkAdmin($sql);
    if ($row) {
        if ($autoFlag) {
            setcookie("adminId", $row['id'], time() + 7 * 24 * 3600);
            setcookie("adminName", $row['username'], time() + 7 * 24 * 3600);
        }
        $_SESSION['adminName'] = $row['username'];
        $_SESSION['adminId'] = $row['id'];
        header("location:index.php");
    } else {
        alertMes("login false", "login.php");
    }
} else {
    alertMes("verify wrong", "login.php");
}
