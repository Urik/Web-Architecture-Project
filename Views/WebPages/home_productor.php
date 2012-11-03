<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Productor</title>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
<?php
if(!isset($_SESSION)) {
    session_start();
}
//$parameters = $_SESSION["parameters"];
$usertype = $_SESSION["user_Type_Actual"];
?>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">CAECE</a>
        <ul class="nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Controllers/Altas/ClientRegistrationController.php">Alta</a></li>
                    <li><a>Baja</a></li>
                    <li><a href="Controllers/Modifications/ClientModificationController.php?clientId=3">Modificacion</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Coberturas<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a>Solicitar</a></li>
                    <li><a>Anular</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav pull-right">
            <li><a class="pull-right" href="logout.php">Log Out</a></li>
        </ul>
    </div>
</div>
<div class="container">
</div>
<h1>Home Productor</h1>
    <a href="productor/alta_cliente_template.php">Alta Tomador</a><br>
    <a href="productor/modif_tomador.php">Baja/Modificacion Tomador</a><br>
    <a href="productor/alta_solicitud.php">Solicitar Cobertura</a><br>
    <a href="productor/modif_solicitud.php">Anular Cobertura Solicitada</a><br>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>