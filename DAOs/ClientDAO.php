<?php

require_once "Others/Cliente.php";

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

    public function getByValues($properties) {
        $connection = (new DBConnection())->connect();
        $rows = $this->performQuery($this->tableName, $properties, $connection);
        $clients = array();
        foreach ($rows as $row) {
            $user = (new UserDAO())->get($row["user_id"]);
            $productor = (new ProducerDAO())->get($row["producer_id"]);
            $cliente = new Cliente($row["id"], $row["nombre"], $row["apellido"], $row["dni"], $row["direccion"], $productor, $user);
            $clients[] = $cliente;
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

}

?>
