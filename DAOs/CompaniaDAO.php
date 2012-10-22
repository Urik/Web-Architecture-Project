<?php

class CompaniaDAO extends DAO {
    //TODO Test the shit out of this DAO.
    private $tableName = "companias";

    /**
     * @param $variables
     * @throws CompaniaCreationException
     */
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new CompaniaCreationException(' Can\'t create ' . $variables);
        }
    }

    public function delete($object) {
        $connection = (new DBConnection())->connect();
        $query = "DELETE FROM impuestos_para_coberturas WHERE compania_id = " . $object->getId();
        mysql_query($query, $connection);
        mysql_close($connection);
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function get($id) {
        $values = [CompaniaColumns::ID => $id];
        $companias = $this->getByValues($values);
        $compania = null;
        if (count($companias) > 0) {
            $compania = $companias[0];
        }
        return $compania;
    }

    public function getByValuesWithLimit($properties, $limit, $offset) {
        $connection = (new DBConnection())->connect();
        $companiasRows = $this->performQuery($this->tableName, $properties, $connection, $limit, $offset);
        $companias = array();
        foreach ($companiasRows as $row) {
            $user = (new UserDAO())->get($row[CompaniaColumns::USER_ID]);
            $impuestosRows = $this->getImpuestos($row[CompaniaColumns::ID]);
            $impuestos = array();
            $condicionDAO = new CondicionImpositivaDAO();
            foreach($impuestosRows as $impuestoRow) {
                $condicion = $condicionDAO->get($impuestoRow["condicion_impositiva_id"]);
                $impuestos[$condicion] = $impuestoRow["impuesto"];
            }
            $compania = new Compania(
                    $row[CompaniaColumns::ID], 
                    $row[CompaniaColumns::RAZON_SOCIAL], 
                    $row[CompaniaColumns::DIRECCION], 
                    $row[CompaniaColumns::RESPONSABILIDAD_CIVIL], 
                    $row[CompaniaColumns::COMISION_PRODUCTORES], 
                    $row[CompaniaColumns::PORCENTAJE_DE_DESCUENTO], 
                    $user, 
                    $impuestos
                );
            $companias[] = $compania;
        }
        mysql_close($connection);
        return $companias;
    }

    /**
     * 
     * @param Compania $object
     */
    public function update($object) {
        $connection = (new DBConnection())->connect();
        $impuestos = $object->getImpuestos();
        $companiaId = $object->getId();
        foreach($impuestos as $impuesto) {
            $condicion = key($impuestos);
            $this->updateImpuesto($companiaId, $condicion->getId(), $impuesto, $connection);
        }
        $resultado = (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
        mysql_close($connection);
        return $resultado;
    }
    
    private function updateImpuesto($companiaId, $condicionId, $impuesto, $connection) {
        $sql = 'UPDATE impuestos_para_coberturas 
                SET impuesto = ' . $impuesto . '
                WHERE compania_id = ' . $companiaId . ' AND condicion_impositiva_id = ' . $condicionId;
        return mysql_query($sql, $connection);
    }
    
    private function getImpuestos($companiaId) {
        $result = mysql_query("
            SELECT condicion_impositiva_id, impuesto 
            FROM impuestos_para_coberturas 
            WHERE compania_id = " . $companiaId);
        $rows = array();
        while($row = mysql_fetch_row($result)) {
            $rows[] = [
                "condicion_impositiva_id" => $row["condicion_impositiva_id"],
                "impuesto" => $row["impuesto"]
            ]; 
        }
        return $result;
    }
}

?>
