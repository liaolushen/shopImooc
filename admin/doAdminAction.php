<?php
require_once '../include.php';
$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];
if ($act == "logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin();
} elseif ($act == "editAdmin") {
    $mes = editAdmin($id);
} elseif ($act == "delAdmin") {
    $mes = delAdmin($id);
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