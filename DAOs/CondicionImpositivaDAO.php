<?php


class CondicionImpositivaDAO extends DAO {
    private $tableName = "condiciones_impositivas";

    /**
     * @param $variables
     * @throws CondicionImpositivaCreationException
     */
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new CondicionImpositivaCreationException('Can\'t create ' . $variables);
        }
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

    public function getByValuesWithLimit($properties, $limit, $offset) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection, $limit, $offset);
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
