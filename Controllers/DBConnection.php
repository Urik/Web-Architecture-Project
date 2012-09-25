<?php
require_once("Controllers/Conexion.php");
/*

 */

/**
 * Description of DBConnection
 *
 * @author Usuario
 */
class DBConnection {
    public function connect() {
        $conexion = mysql_connect(constant("SERVER"), constant("DB_USER"), constant("DB_PASS"));
        return $conexion;
    }
    
    public function connectWithParameters($server, $userName, $password) {
        $conexion = mysql_connect($server, $userName, $password);
        return $conexion;
    }
}

?>
