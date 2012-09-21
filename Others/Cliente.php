<?php

class Cliente extends User {
    private $adminId;
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $productorId;
    /** @var Productor */
    private $productor = null;
    
    public function getAdminId() {
        return $this->adminId;
    }
    
    public function setAdminId($adminId) {
        $this->adminId = $adminId;
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

    public function getProductorId() {
        if (is_null($this->productor)) {
            
        }
    }

    public function setProductorId($productorId) {
        $this->productorId = $productorId;
    }

    public function getProductor() {
        return $this->productor;
    }

    public function setProductor($productor) {
        $this->productor = $productor;
    }
}

?>