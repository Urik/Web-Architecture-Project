<?php
//TODO Terminar el ClientDAO
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
        
    }

    public function getByValues($properties) {
        
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
