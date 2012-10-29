<?php

require_once dirname(__FILE__) . "/IUser.php";
require_once dirname(__FILE__) . "/../Interfaces/IClientsCreator.php";
require_once dirname(__FILE__) . "/../Others/ClientsCreatorImpl.php";

class Producer implements IUser, IClientsCreator {

    private $DNI;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono_1;
    private $telefono_2;
    /** @var User */
    private $user;

    /** @var ClientsCreatorImpl */
    private $clientsCreator;
    
    /**
     * Should only be used by DAO's
     * @param type $DNI
     * @param type $nombre
     * @param type $apellido
     * @param type $direccion
     * @param type $email
     * @param type $telefono_1
     * @param type $telefono_2
     */
    public function __construct($DNI, $nombre, $apellido, $direccion, $telefono_1, $telefono_2, $user, IClientsCreator $clientsCreator = null) {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono_1 = $telefono_1;
        $this->telefono_2 = $telefono_2;
        $this->user = $user;
        if (is_null($clientsCreator)) {
            $clientsCreator = new ClientsCreatorImpl();
        }
        $this->clientsCreator = $clientsCreator;
    }
    

    /**
     * Creates a new Client for the Producer
     * @param type $nombre
     * @param type $apellido
     * @param type $dni
     * @param type $direccion
     * @param type $userId
     * @param type $productorId
     * @param ClientDAO $clientDAO
     * @throws ProducerCreationException
     */
    public function createClient($clientVariables) {
        try{
            $this->clientsCreator->createClient($clientVariables);
        } catch (ClientCreationException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    public function updateClient($client) {
        $this->clientsCreator->updateClient($client);
    }
    
    public function deleteClient($client) {
        $this->clientsCreator->deleteClient($client);
    }
    
    /**
     * Creates an insurance petition for a customer. 
     * @param string $client The customer we are making the insurance for.
     * @param string $insurance The insurance the customer wants.
     * @param string $datosDeUnidad Description of the car.
     * @param int $modelo Year the car was made in
     * @param int $suma Amount insured, in cents. 
     * @param int $comisionReduction How much the producer wants to reduce from his comision, in cents.
     * @param PeticionDeCoberturaDAO $insurancePetitionDAO  Petitions DAO.
     */
    public function askForInsurance($clientID, $insuranceID, $datosDeUnidad, $modelo, $suma, $comisionReduction, $insurancePetitionDAO) {
        if (date("Y") - $modelo > 15) {
            throw new InvalidModelException("The model can't be older than 15 years");
        } 
        return $insurancePetitionDAO->create([
            PeticionDeCoberturaColumns::CLIENTE_ID => $clientID,
            PeticionDeCoberturaColumns::COBERTURA_ID => $insuranceID,
            PeticionDeCoberturaColumns::DATOS => $datosDeUnidad,
            PeticionDeCoberturaColumns::MODELO => $modelo,
            PeticionDeCoberturaColumns::SUMA_ASEGURADA => $suma,
            PeticionDeCoberturaColumns::DISMINUCION_DE_COMISION => $comisionReduction
        ]);
    }
    
    /**
     * 
     * @param ClientDAO $clientDAO
     */
    public function getClients($clientDAO) {
        return $clientDAO->getByValues([ClientColumns::PRODUCTOR_ID => $this->getId()]);
    }
    
    
    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefono_1($telefono_1) {
        $this->telefono_1 = $telefono_1;
    }

    public function setTelefono_2($telefono_2) {
        $this->telefono_2 = $telefono_2;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getEmail() {
        return $this->user->getEmail();
    }

    public function getTelefono_1() {
        return $this->telefono_1;
    }

    public function getTelefono_2() {
        return $this->telefono_2;
    }

    public function getUser() {
        return $this->user;
    }
    
    public function getBirthday() {
       return $this->user->getBirthday(); 
    }

    public function getId() {
        return $this->user->getId();
    }

    public function getNick() {
        return $this->user->getNick();
    }

    public function getPassword() {
        return $this->user->getPassword();
    }
    
    public function getView() {
        return $this->user->getView();
    }
    
    public function getVariablesAsMap() {
        $map = array(
            "dni" => $this->DNI,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "direccion" => $this->direccion,
            "email" => $this->email,
            "telefono_1" => $this->telefono_1,
            "telefono_2" => $this->telefono_2,
            "user_id" => $this->user->getId()
        );
        return $map;
    }

}

?>
