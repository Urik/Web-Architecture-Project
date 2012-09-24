<?php

require_once "Others/IUser.php";

class Producer implements IUser {

    private $DNI;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono_1;
    private $telefono_2;
    
    /** @var User */
    private $user;

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
    public function __construct($DNI, $nombre, $apellido, $direccion, $telefono_1, $telefono_2) {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono_1 = $telefono_1;
        $this->telefono_2 = $telefono_2;
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
        return $this->email;
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
}

?>
