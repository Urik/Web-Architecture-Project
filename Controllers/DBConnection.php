<?php
require_once("Conexion.php");

class DBConnection {
        public function connect() {
        $conexion = mysql_connect(constant("SERVER"), constant("DB_USER"), constant("DB_PASS"));
        mysql_select_db(constant("DB_NAME"));
        return $conexion;
    }
    
    public function connectWithParameters($server, $userName, $password) {
        $conexion = mysql_connect($server, $userName, $password);
        return $conexion;
    }
}

?>
