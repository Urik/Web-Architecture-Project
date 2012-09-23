<?php

require_once "DAO.php";

class UserDAO extends DAO {
    private $tableName = "users";
    
    public function get($id) {
        $connection = (new DBConnection())->connect();
        $parameters = array(
            "id" => $id
        );
        $rows = parent::performQuery($this->tableName, $parameters, $connection);
        $user = null;
        if(count($rows) > 0) {
            $row = next($rows);
            $user = new User($row["id"], $row["nick"], $row["password"], $row["email"], $row["birthday"]);
        }
        return $user;
    }

    /**
     * Returns an array of User conatining all the users matching certain criteria.
     * @param type $properties An array of the form "columnName => value".
     */
    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $userRows = parent::performQuery($this->tableName, $properties, $connection);
        $users = array();
        foreach ($userRows as $row) {
            $user = new User(
                            $row["id"],
                            $row["nick"],
                            $row["password"],
                            $row["email"],
                            $row["birth_date"]);
            $user->setDAO($this);
            $users[] = $user;
        }
        return $users;
    }
    
    public function delete(User $object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function update(User $object) {
        $variables = $object->getVariablesAsMap();
        return (new DAOCommonImpl())->update($this->tableName, $variables);
    }
}

?>
