<?php
require_once dirname(__FILE__) . "/../DAOs/ClientDAO.php";
require_once dirname(__FILE__) . "/../Exceptions/ProducerCreationException.php";

class ClientsCreatorImpl implements IClientsCreator {

    /**
     * @param $variables
     * @throws ProducerCreationException
     */
    public function createClient($variables) {
	$clientDAO = new ClientDAO();
        try {
            $clientDAO->create($variables);
        } catch (DBErrorException $e) {
            throw new ProducerCreationException("Error creating Producer",0, $e);
        }
	}
	public function updateClient($object) {
        return (new ClientDAO())->update($object);
	}
	public function deleteClient($object) {
        return (new ClientDAO())->delete($object);
	}
}

?>