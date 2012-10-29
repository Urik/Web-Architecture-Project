<?php

require_once 'Others/IUser.php';
require_once '../Interfaces/IClientsCreator.php';
require_once '../Interfaces/IProducersCreator.php';
require_once '../Interfaces/IInsurancesCreator.php';
require_once 'InsurancesCreatorImpl.php';
require_once 'ClientsCreatorImpl.php';
require_once 'ProducersCreatorImpl.php';

class Administrator implements IUser, IProducersCreator, IInsurancesCreator {
    private $id;
    /** @var User */
    private $user;

    /** @var ClientsCreatorImpl */
    private $clientsCreator;

    /** @var ProducersCreatorImpl */
    private $producersCreator;

    /** @var InsurancesCreatorImpl */
    private  $insurancesCreator;
    
    function __construct($id, $user) {
        $this->user = $user;
        $this->clientsCreator = new ClientsCreatorImpl();
        $this->producersCreator = new ProducersCreatorImpl();
        $this->insurancesCreator = new InsurancesCreatorImpl();
    }

    
    public function getBirthday() {
        $this->user->getBirthday();
    }

    public function getEmail() {
        $this->user->getEmail();
    }

    public function getId() {
        return $this->id;
    }

    public function getNick() {
        $this->user->getNick();
    }

    public function getPassword() {
        $this->user->getPassword();
    }

    public function getVariablesAsMap() {
        $map = array(
            "id" => $this->id,
            "user_id" => $this->user->getId()
        );
        return $map;
    }
    
    public function getUser() {
        return $this->user;
    }


    public function createClient($variables)
    {
        $this->clientsCreator->createClient($variables);
    }

    public function updateClient($object)
    {
        $this->clientsCreator->updateClient($object);
    }

    public function deleteClient($object)
    {
        $this->clientsCreator->deleteClient($object);
    }

    public function createInsurance($variables)
    {
        $this->insurancesCreator->createInsurance($variables);
    }

    public function updateInsurance($object)
    {
        $this->insurancesCreator->updateInsurance($object);
    }

    public function deleteInsurance($object)
    {
        $this->insurancesCreator->deleteInsurance($object);
    }

    public function createProducer($variables)
    {
        $this->producersCreator->createProducer($variables);
    }

    public function updateProducer($object)
    {
        $this->producersCreator->updateProducer($object);
    }

    public function deleteProducer($object)
    {
        $this->producersCreator->deleteProducer($object);
    }
}

?>
