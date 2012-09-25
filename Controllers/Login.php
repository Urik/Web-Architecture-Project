<?php

require_once "Models/LogInModel.php";

class LoginController {

    /**
     * Returns a User if logged in, and a null if not logged in.
     * @param string $email
     * @param string $password
     * @return User
     */
    public function loguear($email, $password) {
        return (new LogInModel())->getUser($email, $password);
    }

}

?>