<?php

class ClientsCreatorImpl implements IClientsCreator {
	public function createClient($variables) {
	$clientDAO = new ClientDAO();
        try {
            $clientDAO->create($clientVariables);
        } catch (DBErrorException $e) {
            throw new ProducerCreationException("Error creating Producer",0, $e);
        }
	}
	public function updateClient($object) {
        return (new ClientDAO())->update($client);
	}
	public function deleteClient($object) {
        return (new ClientDAO())->delete($client);
	}
}

?>