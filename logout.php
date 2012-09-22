<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LogOut</title>
</head>

<body>
<?php
session_start();
if (isset($_SESSION["session_Actual"])){
	$_SESSION = $_SESSION["session_Actual"];
	session_unset($_SESSION["session_Actual"]);
	header('Location: Admin/global_login.php');
}
else{
	session_unset($_SESSION["user_Type_Actual"]);
	header('Location: index.php');
	session_destroy();
}
?>
</body>
</html>