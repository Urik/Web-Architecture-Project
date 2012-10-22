<?php
require_once 'interfaces/ICreator.php'

interface IProducersCreator {
	public function createProducer($variables);
	public function updateProducer($object);
	public function deleteProducer($object);
}

?>