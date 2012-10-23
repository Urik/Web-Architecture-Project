<?php

require_once "../Others/Insurance.php";

/*

 */

/**
 * Description of InsuranceDAO
 *
 * @author Usuario
 */
class InsuranceDAO extends DAO {
    private $tableName = "coberturas";
    
    /**
     * @param Insurance $object
     */
    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }
    public function get($id) {
        $properties = array(
            "id" => $id
        );
        $insurances = $this->getByValues($properties);
        if (count($insurances) > 0) {
            return $insurances[0];
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
            $insurance = new Insurance($row[CoberturaColumns::ID],
                    $row[CoberturaColumns::DESCRIPCION], 
                    $row[CoberturaColumns::TASA],
                    $row[CoberturaColumns::COMPANIA_ID],
                    $condicion);
            $coberturas[] = $insurance;
        }
        return $coberturas;
    }

    /**
     * @param Insurance $object
     */
    public function update($object) {
        return (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
    }

    /**
     * @param $variables
     * @throws CoberturaCreationException
     */
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new CoberturaCreationException('Can\'t create '.$variables);
        }
    }
}

?>
