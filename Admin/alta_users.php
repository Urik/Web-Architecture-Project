<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alta de usuarios</title>
<script src="Resources/jquery.js" type="text/javascript"></script>
<script src="Resources/jquery.validate.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../css/reset.css" />
<style type="text/css">
#form_compania, #form_productor{
	display:none;
}
input.error{
	border: 1px solid #F00;
}
</style>
</head>

<body>
<?php
session_start();
$usertype = $_SESSION["user_Type_Actual"];
switch ($usertype){
	case "2": 
		header('Location: home_compania.php');
		break;
	case "3":
		header('Location: home_productor.php');
		break;
	case "":
		header('Location: index.php');
		break;
		}
?>
<div style="width:940px; height:40px; text-align:right; margin:auto; background:#0C6; padding-top:20px;"><? $useremail = $_SESSION["user_Actual"]; print("<span style='padding-right:20px'>".$useremail."</span>"); ?><a href="../logout.php">Log Out</a></div>
<h1>Alta Usuarios</h1>
<?php
if(!empty($_POST['e_mail'])){
	require_once("Controlador/Alta.php");
	include_once("Modelo/User.php");
	$email=$_POST['e_mail'];
	$pass=$_POST['password'];
	$user_type=$_POST['user_type'];
	$user = new User($email, $pass, $user_type);
	$alta = new Alta();
	if($user_type == 2){
		include_once("Modelo/Company.php");
		$razon_social=$_POST['razon_social'];
		$direccion=$_POST['direccion_c'];
		$RC=$_POST['RC'];
		$tax_consumidor_final=$_POST['tax_consumidor_final'];
		$tax_monotributo=$_POST['tax_monotributo'];
		$tax_responsable_inscripto=$_POST['tax_responsable_inscripto'];
		$max_comision=$_POST['max_comision'];
		$porcentaje_descuento=$_POST['porcentaje_descuento'];
		$compania = new Company($email,$razon_social,$direccion,$RC,$tax_consumidor_final,$tax_monotributo,$tax_responsable_inscripto,$max_comision,$porcentaje_descuento);
		$alta->AltaCompania($compania, $user);
	}
	else
	if($user_type == 3){
		include_once("Modelo/Productor.php");
		$DNI=$_POST['DNI'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$direccion=$_POST['direccion_p'];
		$telefono_1=$_POST['telefono_1'];
		$telefono_2=$_POST['telefono_2'];
		$productor = new Producer($DNI,$nombre,$apellido,$direccion,$telefono_1,$telefono_2);
		$alta->AltaProductor($productor, $user);
	}
	else{
		$alta->AltaAdmin($user);
	}
	
	
}
?>
<form action="alta_users.php" name="altaform" id="altaform" method="POST">
<label for="e_mail">Email:</label><br />
<input type="text" class="required email" name="e_mail" id="e_mail" /><br />
<label for="password">Password:</label><br />
<input type="password" class="required" name="password" id="password" /></label><br />
<p>Tipo de usuario</p>
<input type="radio" name="user_type" id="admin" value="1" checked="checked" /><label for="admin">Administrador</label>
<input type="radio" name="user_type" id="compania" value="2" /><label for="compania">Compañia</label>
<input type="radio" name="user_type" id="productor" value="3" /><label for="productor">Productor</label><br />
<fieldset id="form_compania">
	<label for="razon_social">Razon Social:</label><br />
	<input type="text" class="" name="razon_social" id="razon_social" /><br />
    <label for="direccion_c">Direccion:</label><br />
	<input type="text" class="" name="direccion_c" id="direccion_c" /><br />
    <label for="RC">Responsabilidad civil:</label><br />
	<input type="text" class="number" name="RC" id="RC" /><br />
    <p><strong>Impuestos para coberturas</strong></p>
    <div id="tax_coberturas" style="margin:auto; width:435px; text-align:center;">
        <div style="float:left">
            <label for="tax_consumidor_final">Consumidor Final:</label><br />
            <input type="text" class="number" name="tax_consumidor_final" id="tax_consumidor_final" />
        </div>
        <div style="float:left">
            <label for="tax_monotributo">Monotributo:</label><br />
            <input type="text" class="number" name="tax_monotributo" id="tax_monotributo" />
        </div>
        <div style="float:left">
            <label for="tax_responsable_inscripto">Responsable Inscripto:</label><br />
            <input type="text" class="number" name="tax_responsable_inscripto" id="tax_responsable_inscripto" />
        </div>
        <div style="clear:both"></div>
    </div><br />
    <label for="max_comision">Porcentaje de comision para productores maxima:</label><br />
	<input type="text" class="number" name="max_comision" id="max_comision" /><br />
    <label for="porcentaje_descuento">Porcentaje descuento:</label><br />
	<input type="text" class="number" name="porcentaje_descuento" id="porcentaje_descuento" /><br />
</fieldset>
<fieldset id="form_productor">
    <label for="nombre">Nombre:</label><br />
	<input type="text" class="" name="nombre" id="nombre" /><br />
    <label for="apellido">Apellido:</label><br />
	<input type="text" class="" name="apellido" id="apellido" /><br />
    <label for="DNI">DNI:</label><br />
	<input type="text" class="number" name="DNI" id="DNI" /><br />
    <label for="direccion_p">Direccion:</label><br />
	<input type="text" class="" name="direccion_p" id="direccion_p" /><br />
    <label for="telefono_1">Telefono 1:</label><br />
	<input type="text" class="number" name="telefono_1" id="telefono_1" /><br />
    <label for="telefono_2">Telefono 2:</label><br />
	<input type="text" class="number" name="telefono_2" id="telefono_2" /><br />
</fieldset>
<input type="submit" name="enviar" id="enviar" value="Enviar" />
<input type="reset" name="limpiar" id="limpiar" value="Limpìar todo" />
</form>
<a href="../home_admin.php">volver</a>
</body>
<script type="text/javascript">
function limpia(){
	$("#form_compania").children("input").val("");
	$("#form_productor").children("input").val("");
	$("#tax_coberturas").children("div").children("input").val("");
};
$().ready(function(){
	$("input[name=user_type]").change(function(){
		var id = $("input[@name=user_type]:checked").attr('id');
		switch(id){
			case "admin": {
							limpia();
							$("#form_compania").hide(); 
							$("#form_productor").hide(); 
							$("#form_compania").children("input").removeClass("required");
							$("#tax_coberturas").children("div").children("input").removeClass("required");
							$("#form_productor").children("input").removeClass("required");
							break;
						}
			case "compania": {
								limpia(); 
								$("#form_compania").show(); 
								$("#form_productor").hide(); 
								$("#form_compania").children("input").addClass("required");
								$("#tax_coberturas").children("div").children("input").addClass("required");
								$("#form_productor").children("input").removeClass("required");
								break;
						}
			case "productor":{
								limpia(); 
								$("#form_compania").hide(); 
								$("#form_productor").show(); 
								$("#form_compania").children("input").removeClass("required");
								$("#tax_coberturas").children("div").children("input").removeClass("required");
								$("#form_productor").children("input").addClass("required");
								$("#form_productor").children("#telefono_2").removeClass("required");
								break;
						}
			default: break;
		};
	});
});
$().ready(function() {
$("#altaform").validate({
		messages:{
			e_mail:{
				required: "Campo requerido.",
				email: "Ingrese un email valido."
			},
			password:{
				required: "Campo requerido.",
			},
			razon_social:{
				required: "Campo requerido.",
			},
			direccion_c:{
				required: "Campo requerido.",
			},
			RC:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			tax_consumidor_final:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			tax_monotributo:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			tax_responsable_inscripto:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			max_comision:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			porcentaje_descuento:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			nombre:{
				required: "Campo requerido.",
			},
			apellido:{
				required: "Campo requerido.",
			},
			DNI:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			direccion_p:{
				required: "Campo requerido.",
			},
			telefono_1:{
				required: "Campo requerido.",
				number: "Debe ingresar un numero.",
			},
			telefono_2:{
				number: "Debe ingresar un numero.",
			},
		}
	});
});
</script>
</html>
