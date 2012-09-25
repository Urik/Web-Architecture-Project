<?php

require_once "Controllers/DBConnection.php";
require_once ('/Others/UserFactory.php');

class LogInModel {

    public function getUser($email, $password) {
        $dbHandler = new DBConnection();
        $conexion = $dbHandler->connect();
        mysql_select_db(constant("DB_NAME"), $conexion);
        $query = "SELECT id,email,user_type FROM  `users` WHERE `password` LIKE '" . $password . "' AND `email` LIKE '" . $email . "'";
        $res = mysql_query($query, $conexion) or die(mysql_error());
        $user = null;
        if ($res) {
            if (session_id() == '') {
                session_start();
            }
            while ($row = mysql_fetch_assoc($res)) {
                $_SESSION["user_Actual"] = $row['email'];
                $_SESSION["user_Type_Actual"] = $row['user_type'];
                $user = (new UserFactory())->get($row["id"], $row["user_type"]);
            }
        } 
        return $user;
    }
}

?>
