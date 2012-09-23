<?php

require_once "DAO.php";

class UserDAO extends DAO{
    public function get($id) {
        
    }

    /**
     * Returns an array of User conatining all the users matching certain criteria.
     * @param type $properties An array of the form "columnName => value".
     */
    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $userRows = parent::performQuery("users", $properties, $connection);
        $users = array();
        foreach ($userRows as $row) {
            $user = new User(
                    $row["id"], 
                    $row["nick"], 
                    $row["password"], 
                    $row["email"], 
                    $row["birth_date"]);
            $users[] = $user;
        }
        return $users;
    }

}

?>
