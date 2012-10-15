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
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
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

    public function getByValuesWithLimit($properties, $limit, $offset) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection, $limit, $offset);
        $coberturas = array();
        $condicionDAO = new CondicionImpositivaDAO();
        foreach ($rows as $row) {
            $condicion = $condicionDAO->get(CoberturaColumns::CONDICIONES_IMPOSITIVAS_ID);
            $cobertura = new Cobertura($row[CoberturaColumns::ID], 
                    $row[CoberturaColumns::DESCRIPCION], 
                    $row[CoberturaColumns::TASA],
                    $row[CoberturaColumns::COMPANIA_ID],
                    $condicion);
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
