<?php
require_once 'interfaces/ICreator.php'

interface IClientsCreator {
	public function createClient($variables);
	public function updateClient($object);
	public function deleteClient($object);
}

?>