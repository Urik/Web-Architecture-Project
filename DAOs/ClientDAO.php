<?php

require_once dirname(__FILE__) . "/../Others/Cliente.php";
require_once dirname(__FILE__) . "/DAO.php";
require_once dirname(__FILE__) . "/UserDAO.php";
require_once dirname(__FILE__) . "/ProducerDAO.php";
require_once dirname(__FILE__) . "/../Exceptions/ClientCreationException.php";
require_once dirname(__FILE__) . "/../Controllers/DBConnection.php";
require_once dirname(__FILE__) . "/../Others/ClientColumns.php";
require_once dirname(__FILE__) . "/../DAOs/CondicionImpositivaDAO.php";

class ClientDAO extends DAO {

    private $tableName = "clientes";

    /**
     * 
     * @param Cliente $object
     */
    public function delete($object) {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    public function get($id) {
        $properties = array(
            "id" => $id
        );
        $clients = $this->getByValues($properties);
        return count($clients) > 0 ? $clients[0] : null;
    }

    public function getByValuesWithLimit($properties, $limit, $offset) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection, $limit, $offset);
        $clients = array();
        foreach ($rows as $row) {
            $user = (new UserDAO())->get($row["user_id"]);
            $productor = (new ProducerDAO())->get($row[ClientColumns::PRODUCTOR_ID]);
            $condicionImpositiva = (new CondicionImpositivaDAO())->get($row[ClientColumns::CONDICION_IMPOSITIVA_ID]);
            $cliente = new Cliente($row[ClientColumns::ID],
                $row[ClientColumns::NOMBRE],
                $row[ClientColumns::APELLIDO],
                $row[ClientColumns::DNI],
                $row[ClientColumns::DIRECCION],
                $productor,
                $user,
                $row[ClientColumns::TELEFONO_1],
                $row[ClientColumns::TELEFONO_2],
                $row[ClientColumns::CUIT],
                $condicionImpositiva
            );
            $clients[] = $cliente;
        }
        return $clients;
    }

        /**
     * 
     * @param string $coberturaId
     * @param PeticionDeCoberturaDAO $peticionDeCoberturaDAO
     */
    public function getByCobertura($coberturaId, $peticionDeCoberturaDAO) {
        $properties = array(
            PeticionDeCoberturaColumns::COBERTURA_ID => $coberturaId
        );
        $peticiones = $peticionDeCoberturaDAO->getByValues($properties);
        $clients = array();
        foreach ($peticiones as $peticion) {
            $clients[] = $peticion->getCliente();
        }
        return $clients;
    }
    
    /**
     * 
     * @param Cliente $object
     * @return type
     */
    public function update($object) {
        return (new DAOCommonImpl())->update($object->getVariablesAsMap(), $this->tableName);
    }

    /**
     * @param $variables
     * @return bool
     * @throws ClientCreationException
     */
    public function create($variables) {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new ClientCreationException('Error creating ' . $variables);
        }

    }
}

?>
