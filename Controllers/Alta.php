<?
require_once("Conexion.php");
class Alta
{
	public function AltaAdmin ($objeto)
	{
		$conexion = mysql_connect(constant("SERVER"), constant("DB_USER"), constant("DB_PASS"));
		mysql_select_db(constant("DB_NAME"), $conexion);
			$query = "INSERT INTO  `users` (`email` ,`password` ,`user_type`)";
			$query.= "VALUES ( '".$objeto->getEmail()."',  '".$objeto->getPassword()."', 1)";
			$res = mysql_query($query, $conexion) or die(mysql_error());
	}
    public function AltaCompania ($objeto, $objeto2)
	{
		$conexion = mysql_connect(constant("SERVER"), constant("DB_USER"), constant("DB_PASS"));
		mysql_select_db(constant("DB_NAME"), $conexion);
			$query = "INSERT INTO  `users` (`email` ,`password` ,`user_type`)";
			$query.= "VALUES ( '".$objeto2->getEmail()."',  '".$objeto2->getPassword()."', 2)";
			$res1 = mysql_query($query, $conexion) or die(mysql_error());
			$query2 = "INSERT INTO  `companies` (`email`, `razon_social`, `direccion`, `rc`, `tax_consumidor_final`, `tax_monotributo`, `tax_responsable_inscripto`, `max_comision`, `porcentaje_descuento`)";
			$query2.= "VALUES ( '".$objeto->getEmail()."',  '".$objeto->getRazon_Social()."',  '".$objeto->getDireccion()."',  '".$objeto->getRC()."',  '".$objeto->getTax_Consumidor_Final()."',  '".$objeto->getTax_Monotributo()."',  '".$objeto->getTax_Responsable_Inscripto()."',  '".$objeto->getMax_Comision()."',  '".$objeto->getPorcentaje_Descuento()."')";
			$res2 = mysql_query($query2, $conexion) or die(mysql_error());
	}
    public function AltaProductor ($objeto, $objeto2)
	{
		$conexion = mysql_connect(constant("SERVER"), constant("DB_USER"), constant("DB_PASS"));
		mysql_select_db(constant("DB_NAME"), $conexion);
			$query = "INSERT INTO  `users` (`email` ,`password` ,`user_type`)";
			$query.= "VALUES ( '".$objeto2->getEmail()."',  '".$objeto2->getPassword()."', 3)";
			$res = mysql_query($query, $conexion) or die(mysql_error());
			$query2 = "INSERT INTO  `productores` (`DNI`, `nombre`, `apellido`, `direccion`, `email`, `telefono_1`, `telefono_2`)";
			$query2.= "VALUES ( '".$objeto->getDNI()."',  '".$objeto->getNombre()."',  '".$objeto->getApellido()."',  '".$objeto->getDireccion()."',  '".$objeto->getEmail()."',  '".$objeto->getTelefono_1()."',  '".$objeto->getTelefono_2()."')";
			$res2 = mysql_query($query2, $conexion) or die(mysql_error());
	}
}
?>

