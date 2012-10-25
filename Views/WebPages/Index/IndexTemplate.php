<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <script src="Resources/jquery.js" type="text/javascript"></script>
    <script src="Resources/jquery.validate.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="../../../css/login.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/bootstrap.min.css" />
</head>

<body>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">CAECE</a>
    </div>
</div>

<div class="container" id="login_form">
    <div class="hero-unit" id="hero">
        <h1>Agencia de seguros</h1>
        <h2>Fuiste alpiste</h2>
    </div>

    <div class="row">
        <div class="span1"></div>
        <div class="span10">
            <form action="../../../index.php" method="POST" name="login_form" class="form-inline" id="login_form">
                <legend>Log In</legend>
                <label for="email">Email:</label>
                <input name="email" id="email" type="text" class="required email" /><label for="email" class="error" generated="true"></label>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" class="required" /><label for="pass" class="error" generated="true"></label>
                <input type="submit" name="submit" class="btn" id="submit" value="Enviar" />
            </form>
        </div>
        <div class="span1"></div>
    </div>

    <div class="row">
        <div class="span1"></div>
        <div class="span10" id="quote">
            <h1>Seguros? Por favor, un hombre de verdad toma riesgos.<br /> <small>Capitan del Titanic.</small></h1>
        </div>
        <div class="span1"></div>
    </div>
</div>
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

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>