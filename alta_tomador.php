<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alta de Tomador</title>
<link type="text/css" rel="stylesheet" href="../css/reset.css" />
</head>

<body>
<?php
session_start();
$usertype = $_SESSION["user_Type_Actual"];
switch ($usertype){
	case "1": 
		header('Location: home_admin.php');
		break;
	case "2":
		header('Location: home_compania.php');
		break;
	case "":
		header('Location: Index.php');
		break;
		}
?>
<div style="width:940px; height:40px; text-align:right; margin:auto; background:#0C6; padding-top:20px;"><? $useremail = $_SESSION["user_Actual"]; print("<span style='padding-right:20px'>".$useremail."</span>"); ?><a href="../logout.php">Log Out</a></div>
<h1>Alta de Tomador</h1>
<a href="../home_productor.php">Volver</a>
</body>
</html>