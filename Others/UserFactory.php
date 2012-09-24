<?php

require_once "DAOs/ProducerDAO.php";

class UserFactory {

    public function get($id, $userType) {
        $user = null;
        switch ($userType) {
            case "1": //Admin
                break;
            case "2": //Compaia
                break;
            case "3": //Productor
                $user = (new ProducerDAO())->get($id);
                break;
        }
        return $user;
    }

}

?>
