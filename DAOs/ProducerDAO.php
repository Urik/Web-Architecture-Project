<?php


require_once "DAOs/UserDAO.php";

require_once "Others/Producer.php";

require_once "DAOs/DAO.php";

class ProducerDAO extends DAO{
    private $tableName = "productores";
    
    /**
     * 
     * @param Producer $object
     * @return boolean
     */
    public function delete($object) {
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
            $producer = $producers[0];
        }
        return $producer;            
    }

    public function getByValuesWithLimit($properties, $limit, $offset) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection, $limit, $offset);
        $producers = array();
        foreach($rows as $row) {
            $user = (new UserDAO())->get($row["user_id"]);
            $producer = new Producer($row["dni"], $row["nombre"], $row["apellido"], $row["direccion"], $row["telefono_1"], $row["telefono_2"], $user);
            $producers[] = $producer;
        }
        return $producers;
    }

    /**
     * 
     * @param Producer $object
     * @return boolean
     */
    public function update($object) {
        $variables = $object->getVariablesAsMap();
        return (new DAOCommonImpl())->update($variables, $this->tableName ) &&
            (new UserDAO())->update($object->getUser());
    }

    /**
     * @param $variables
     * @throws ProducerCreationException
     */
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new ProducerCreationException('Error creating ' . $variables);
        }
    }
    
}

?>
