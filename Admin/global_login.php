<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Global Login</title>
<link type="text/css" rel="stylesheet" href="../css/reset.css" />
</head>

<body>
<?php
session_start();
$usertype = $_SESSION["user_Type_Actual"];
switch ($usertype){
	case "1":
		break;
	case "2": 
		header('Location: ../home_compania.php');
		break;
	case "3":
		header('Location: ../home_productor.php');
		break;
	case "":
		header('Location: ../index.php');
		break;
		}
?>		
<div style="width:940px; height:40px; text-align:right; margin:auto; background:#0C6; padding-top:20px;"><? $useremail = $_SESSION["user_Actual"]; print("<span style='padding-right:20px'>".$useremail."</span>"); ?><a href="../logout.php">Log Out</a></div>
<h1>Global Login</h1>
<?
if(!empty($_POST['email'])){
	require_once("../Controlador/Login.php");
	$_SESSION["session_Actual"] = $_SESSION;
	$login = new Login();
	$usertype = $login->loguear($_POST['email'],$_POST['pass']); 
	echo $usertype;
	if ($usertype == ""){
		echo "<p>Usuario o contraseña incorrectos</p>";
	}
	else
	{
		switch ($usertype){
	case "1": 
		header('Location: ../home_admin.php');
		break;
	case "2":
		header('Location: ../home_compania.php');
		break;
	case "3":
		header('Location: ../home_productor.php');
		break;
	}
	}
	
}
?>
<form action="global_login.php" method="POST" name="login_form" id="login_form">
<label for="email">Email:</label><br />
<input name="email" id="email" type="text" class="required email" /><label for="email" class="error" generated="true"></label><br />
<label for="pass">Password:</label><br />
<input type="password" name="pass" id="pass" class="required" /><label for="pass" class="error" generated="true"></label><br />
<input type="submit" name="submit" id="submit" value="Enviar" />
</form> 
<a href="../home_admin.php">Volver</a>
</body>
<script type="text/javascript">
$().ready(function() {
$("#login_form").validate({
		messages:{
			email:{
				required: "campo requerido.",
				email: "ingrese un email valido."
			},
			pass:{
				required: "campo requerido.",
			}
		}
	});
});
</script>
</body>
</html>