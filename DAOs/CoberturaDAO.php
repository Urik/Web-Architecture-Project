<?php

require_once "../Others/Cobertura.php";

/*

 */

/**
 * Description of CoberturaDAO
 *
 * @author Usuario
 */
class CoberturaDAO extends DAO {
    private $tableName = "coberturas";
    
    /**
     * @param Cobertura $object
     */
    public function delete($object) {
        (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }
    public function get($id) {
        $properties = array(
            "id" => $id
        );
        $coberturas = $this->getByValues($properties);
        if (count($coberturas) > 0) {
            return $coberturas[0];
        } else {
            return null;
        }
    }

    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection);
        $coberturas = array();
        foreach ($rows as $row) {
            $cobertura = new Cobertura($row["id"], $row["descripcion"], $row["taza"]);
            $coberturas[] = $cobertura;
        }
        return $coberturas;
    }

    /**
     * @param Cobertura $object
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
