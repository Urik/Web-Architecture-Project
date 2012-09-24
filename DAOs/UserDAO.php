<?php

require_once "Others/user.php";

require_once "DAOs/DAO.php";

class UserDAO extends DAO {
    private $tableName = "users";
    
    
    /**
     * 
     * @param string $id
     * @return User
     */
    public function get($id) {
        $connection = (new DBConnection())->connect();
        $parameters = array(
            "id" => $id
        );
        $rows = parent::performQuery($this->tableName, $parameters, $connection);
        $user = null;
        if(count($rows) > 0) {
            $row = $rows[0];
            $user = new User($row["id"], $row["nick"], $row["password"], $row["email"], new DateTime($row["birth_date"]));
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
    
    /**
     * 
     * @param User $object
     * @return boolean
     */
    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    /**
     * 
     * @param User $object
     * @return boolean
     */
    public function update($object) {
        $variables = $object->getVariablesAsMap();
        return (new DAOCommonImpl())->update($this->tableName, $variables);
    }
}

?>
