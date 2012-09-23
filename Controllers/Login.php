<?php

require_once "DBConnection.php";

class Login {

    public function loguear($email, $pass) {
        $dbHandler = new DBConnection();
        $conexion = $dbHandler->connect();
        mysql_select_db(constant("DB_NAME"), $conexion);
        $query = "SELECT email,user_type FROM  `users` WHERE `password` LIKE '" . $pass . "' AND `email` LIKE '" . $email . "'";
        $res = mysql_query($query, $conexion) or die(mysql_error());
        if ($res) {
            session_start();
            while ($row = mysql_fetch_assoc($res)) {
                $_SESSION["user_Actual"] = $row['email'];
                $_SESSION["user_Type_Actual"] = $row['user_type'];
                return $row['user_type'];
            }
        }
        else
            return "";
    }

}

?>