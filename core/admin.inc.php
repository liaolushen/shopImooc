<?php
function checkAdmin($sql) {
    return fetchOne($sql);
}

function checkLogined() {
    if ($_SESSION['adminId'] == "") {
        header("location:login.php");
    }
}

function logout() {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 1);
    }
    session_destroy();
    header("location:login.php");
}