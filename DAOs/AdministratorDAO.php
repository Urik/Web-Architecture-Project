<?php

require_once "Others/Administrator.php";

class AdministratorDAO extends DAO {
    private $tableName = "";
    
    /**
     * @param Administrator $object
     */
    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function get($id) {
        $properties = array(
            "id" => $id
        );
        
        $administrators = $this->getByValues($properties);
       if (count($administrators) > 0) {
           return $administrators[0];
       } else {
           return null;
       }
    }

    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection);
        $administrators = array();
        foreach ($rows as $row) {
            $user = (new UserDAO())->get($row["user_id"]);
            $administrator = new Administrator($row["id"], $row["user_id"]);
            $administrators[] = $administrator;
        }
        return $administrators;
    }

    /**
     * @param Administrator $object
     */
    public function update($object) {
        return (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
    }
    
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        return (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
    }


}

?>
