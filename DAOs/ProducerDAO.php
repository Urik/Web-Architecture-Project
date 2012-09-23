<?php

class ProducerDAO extends DAO{
    private $tableName = "productores";
    public function delete(Producer $object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    /**
     * 
     * @param type $id
     * @return Producer
     */
    public function get($id) {
        $properties = array(
            "id" => $id
        );
        $producers = $this->getByValues($properties);
        $producer = null;
        if (count($producers)>0) {
            $producer = next($producers);
        }
        return $producer;            
    }

    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = parent::performQuery($this->tableName, $properties, $connection);
        $producers = array();
        foreach($rows as $row) {
            $producer = new Producer($row["dni"], $row["nombre"], $row["apellido"], $row["direccion"], $row["email"], $row["telefono_1"], $row["telefono_2"]);
            $user = (new UserDAO())->get($row["user_id"]);
            $producer->setUser($user);
            $producers[] = $producer;
        }
        return $producers;
    }

    public function update(Producer $object) {
        $variables = $object->getVariablesAsMap();
        return (new DAOCommonImpl())->update($this->tableName, $variables) &&
            (new UserDAO())->update($object->getUser());
    }

}

?>
