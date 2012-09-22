<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<script src="Resources/jquery.js" type="text/javascript"></script>
<script src="Resources/jquery.validate.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
</head>

<body>
<h1>Login</h1>
<?php
if(!empty($_POST['email'])){
	session_start();
	require_once("Controllers/Login.php");
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
			header('Location: home_admin.php');
			break;
		case "2":
			header('Location: home_compania.php');
			break;
		case "3":
			header('Location: home_productor.php');
			break;
		}
	}
	
}
?>
<form action="index.php" method="POST" name="login_form" id="login_form">
<label for="email">Email:</label><br />
<input name="email" id="email" type="text" class="required email" /><label for="email" class="error" generated="true"></label><br />
<label for="pass">Password:</label><br />
<input type="password" name="pass" id="pass" class="required" /><label for="pass" class="error" generated="true"></label><br />
<input type="submit" name="submit" id="submit" value="Enviar" />
</form> 
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
				required: "campo requerido."
			}
		}
	});
});
</script>
</html>