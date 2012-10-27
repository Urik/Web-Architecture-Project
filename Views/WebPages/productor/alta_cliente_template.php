<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Alta de Tomador</title>
    <link type="text/css" rel="stylesheet" href="../../../css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/default.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/android.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/alta_cliente.css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../js/glDatePicker.min.js"></script>
</head>

<body>
    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    ?>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">CAECE</a>
            <ul class="nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="productor/alta_cliente_template.php">Alta</a></li>
                        <li><a>Baja</a></li>
                        <li><a>Modificacion</a></li>
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
        <div class="row">
            <div class="span12">
                <h3>Alta de cliente</h3>
            </div>
        </div>
        <form method="post" action="../../../Controllers/Altas/ClientRegistrationController.php">
            <div class="row">
                <div class="span12"">
                    <div class="row">
                        <div class="span4">
                            <h2>Datos de usuario</h2>
                            <label for="nick">Nombre de usuario</label>
                            <input type="text" name="nick" id="nick">

                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password">

                            <label for="repeated_password">Repita la contraseña</label>
                            <input type="password" name="repeated_password" id="repeated_password">

                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="span8">
                            <h2>Datos personales</h2>
                            <div class="row">
                                <div class="span4">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name">

                                    <label for="last_name">Apellido</label>
                                    <input type="text" name="last_name" id="last_name">

                                    <label for="birth_date">Fecha de nacimiento</label>
                                    <input type="text" name="birth_date" id="birth_date" onkeypress="return false">

                                    <label for="address">Direccion</label>
                                    <input type="text" name="address" id="address">
                                </div>
                                <div class="span4">
                                    <label for="phone">Telefono</label>
                                    <input type="text" name="phone" id="phone">

                                    <label for="cuit">CUIT</label>
                                    <input type="text" name="cuit" id="cuit">

                                    <label for="condicion_impositiva">Condicion impositva</label>
                                    <select name="condicion_impoisitva" id="condicion_impositiva">
                                    <?php foreach($condiciones as $condicion): ?>
                                        <option value="<? $condicion ?>"<? $condicion ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="span12">
                        <input type="submit" class="btn">
                    </div>
                </div>
                </div>
            </div>
        </form>
        <a href="../home_productor.php">Volver</a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#birth_date').glDatePicker({
                cssName: "default",
                startDate: new Date("January 1, 1990"),
                endDate: -1,
                selectedDate: new Date("January 1, 1990"),
                onChange: function(target, newDate) {
                    target.val (
                        newDate.getDate() + "/" +
                            (newDate.getMonth() + 1) + "/" +
                            newDate.getFullYear()
                    );
                }
            });
        });
    </script>
</body>
</html>