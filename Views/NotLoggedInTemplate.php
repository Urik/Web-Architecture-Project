<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript">
	function isValid(variable) {
		return variable != null && variable != "";
	}

	function formIsValid() 
	{
		var nombre = document.forms["registro"]["name"].value;
		var apellido = document.forms["registro"]["family_name"].value;
		var dni = document.forms["registro"]["dni"].value;
		var direccion= document.forms["registro"]["direccion"].value;
		var email = document.forms["registro"]["email"].value;
		var telefono = document.forms["registro"]["phone"].value;
		var errors = new Array();
		if (!isValid(nombre)) {
			errors.push("Nombre");
		}
        if(!isValid(apellido)) {
			errors.push("Apellido");
		}
		if(!isValid(direccion)) {
			errors.push("Direccion");
		}
		if(!isValid(dni)) {
			errors.push("Dni");
		}
		if(!isValid(email)) {
			errors.push("Email");
		}
		if(!isValid(telefono)) {
			errors.push("Telefono");
		}
		if (errors.length > 0) {
			var errorsString = "Errores en:";
			for (error in errors) {
				errorsString += " " + errors[error] + ",";
			}
			errorsString = errorsString.substring(0, errorsString.length-1); 
			alert(errorsString);
			return false;
		} else {
			return true;
		}
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<h1>Alta de productor</h1>
    <form name="registro" method="post" action="LoginController.php" onsubmit="return formIsValid()">
    	<label>Nombre</label> <input type="text" name="name" /> <br />
        <label>Apellido</label> <input type="text" name="family_name" /><br />
        <label>DNI</label> <input type="text" name="dni" /><br />
        <label>Direccion </label> <input type="text" name="direccion" /><br />
        <label>Email </label><input type="text" name="email" /><br />
        <label>Telefono </label> <input type="text" name="phone" /><br />
        <input type="submit" value="Registrar" />
    </form>
    
</body>
</html>
