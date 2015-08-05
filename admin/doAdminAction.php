<?php
require_once '../include.php';
$act = $_REQUEST['act'];
if ($act == "logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if ($mes) {
    echo $mes;
}
?>
</body>
</html>