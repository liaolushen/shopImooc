<?php
require_once '../include.php';
$id = $_REQUEST['id'];
$sql = "select id, username, email from imooc_admin where id='{$id}'";
$row = fetchOne($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>add admin</title>
</head>
<body>
    <h3>添加管理员</h3>
    <form action="doAdminAction.php?act=editAdmin&id=<?php echo $row['id']?>" method="post">
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <td align="right">管理员名称</td>
                <td><input type="text" name="username" placeholder="<?php echo $row['username'];?>"/></td>
            </tr>
            <tr>
                <td align="right">管理员密码</td>
                <td><input type="text" name="password"/></td>
            </tr>
            <tr>
                <td align="right">管理员邮箱</td>
                <td><input type="text" name="email" placeholder="<?php echo $row['email'];?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="修改管理员" /></td>
            </tr>
        </table>
    </form>
</body>
</html>