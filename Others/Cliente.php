<?php

class Cliente implements IUser{
    private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    /** @var Producer */
    private $productor = null;
    
    /** @var User */
    private $user;

    function __construct($id, $nombre, $apellido, $dni, $direccion, $productor, $user) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->productor = $productor;
        $this->user = $user;
    }
    
    public function getCoberturas() {
        
    }

    public function getId() {
        return $this->$id;
    }
    
    public function setId($adminId) {
        $this->$id = $adminId;
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

    public function getVariablesAsMap() {
        $map = array(
            "id" => $this->id,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "dni" => $this->dni,
            "direccion" => $this->direccion,
            "productor_id" => $this->productorId,
            "user_id" => $this->user->getId()
        );
        return $map;
    }

    public function showHomePage($parameters) {
        $this->user->showHomePage($parameters);
    }
    
    public function getCoberturas() {
        
    }
}

?>