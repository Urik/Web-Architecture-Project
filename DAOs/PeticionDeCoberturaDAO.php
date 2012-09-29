<?php

class PeticionDeCoberturaDAO extends DAO {
    private $tableName = "peticiones_de_cobertura";
    
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        return (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
    }

    /**
     * @param PeticionDeCobertura $object
     */
    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function get($id) {
        $variables = array(
            PeticionDeCoberturaColumns::ID => $id
        );
        $coberturas = $this->getByValues($variables);
        return count($coberturas) > 0 ? $coberturas : null;
    }

    /**
     * 
     * @param type $properties
     * @return PeticionDeCobertura[]
     */
    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection);
        $peticiones = array();
        foreach ($rows as $row) {
            $cliente = (new ClientDAO())->get($row[PeticionDeCoberturaColumns::CLIENTE_ID]);
            $cobertura = (new CoberturaDAO())->get($row[PeticionDeCoberturaColumns::COBERTURA_ID]);
            $fecha = new DateTime($row[PeticionDeCoberturaColumns::FECHA]);
            $peticion = new PeticionDeCobertura(
                    $cliente,
                    $row[PeticionDeCoberturaColumns::MODELO], 
                    $row[PeticionDeCoberturaColumns::SUMA_ASEGURADA], 
                    $row[PeticionDeCoberturaColumns::DATOS], 
                    $row[PeticionDeCoberturaColumns::APROBADA], 
                    $cobertura, 
                    $row[PeticionDeCoberturaColumns::DISMINUCION_DE_COMISION], 
                    $fecha);
            $peticiones[] = $peticion;
        }
        return $peticiones;
    }
    /** @param PeticionDeCobertura $object */
    public function update($object) {
        return (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
    }

}

?>
