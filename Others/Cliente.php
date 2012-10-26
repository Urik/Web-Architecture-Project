<?php

require_once "Others/IUser.php";

class Cliente implements IUser{
    private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $telefono1 = "";
    private $telefono2 = "";
    private $cuit = "";
    /** @var CondicionImpositiva */
    private $condicionImpositiva;
    /** @var Producer */
    private $productor = null;
        
    /** @var User */
    private $user;
    
    function __construct($id, $nombre, $apellido, $dni, $direccion, $productor, $user, $telefono1, $telefono2, $cuit, $condicionImpositiva) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->productor = $productor;
        $this->user = $user;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->cuit = $cuit;
        $this->condicionImpositiva = $condicionImpositiva;
    }
    
    /**
     * 
     * @param PeticionDeCoberturaDAO $coberturasDAO
     */
    public function getClientCoberturas($peticionDeCoberturasDAO) {
        return $peticionDeCoberturasDAO->getByValues([
            PeticionDeCoberturaColumns::CLIENTE_ID => $this->getId(),
            PeticionDeCoberturaColumns::APROBADA => true
        ]);
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($adminId) {
        $this->id = $adminId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getProductor() {
        return $this->productor;
    }

    public function setProductor($productor) {
        $this->productor = $productor;
    }
    
    public function getBirthday() {
        return $this->user->getBirthday();
    }

    public function getEmail() {
        return $this->user->getEmail();
    }

    public function getNick() {
        return $this->user->getNick();
    }

    public function getPassword() {
        return $this->user->getPassword();
    }
    
    public function getTelefono1() {
        return $this->telefono1;
    }

    public function setTelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }

    public function getTelefono2() {
        return $this->telefono2;
    }

    public function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    public function getCuit() {
        return $this->cuit;
    }

    public function setCuit($cuit) {
        $this->cuit = $cuit;
    }

    public function getCondicionImpositiva() {
        return $this->condicionImpositiva;
    }

    public function setCondicionImpositiva($condicionImpositiva) {
        $this->condicionImpositiva = $condicionImpositiva;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }


    public function getVariablesAsMap() {
        $map = array(
            ClientColumns::ID => $this->id,
            ClientColumns::NOMBRE => $this->nombre,
            ClientColumns::APELLIDO => $this->apellido,
            ClientColumns::DNI => $this->dni,
            ClientColumns::DIRECCION => $this->direccion,
            ClientColumns::PRODUCTOR_ID => $this->productorId,
            ClientColumns::USER_ID => $this->user->getId()
        );
        return $map;
    }
}

?>