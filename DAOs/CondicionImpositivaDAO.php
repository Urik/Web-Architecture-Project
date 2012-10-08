<?php


class CondicionImpositivaDAO extends DAO {
    private $tableName = "condiciones_impositivas";
    
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        return (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
    }

    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function get($id) {
        $values = [CondicionImpositivaColumns::ID => $id];
        $condiciones = $this->getByValues($values);
        $condicion = null;
        if (count($condiciones) > 0) {
            $condicion = $condiciones[0];
        }
        return $condicion;
    }

    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection);
        $condiciones = array();
        foreach ($rows as $row) {
            $condicion = new CondicionImpositiva(
                    $row[CondicionImpositivaColumns::ID], 
                    $row[CondicionImpositivaColumns::NAME], 
                    $row[CondicionImpositivaColumns::DESCRIPTION]);
            $condiciones[] = $condicion;
        }
        return $condicion;
    }

    /**
     * @param CondicionImpositiva $object
     */
    public function update($object) {
        return (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
    }

}

?>
