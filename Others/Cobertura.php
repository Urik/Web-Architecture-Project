<?php

class Cobertura extends Thing {
    private $descripcion = "";
    private $taza = 000.00; 
    private $compania = null;
    
    public function __construct($id, $descripcion, $taza, $compania) {
        $this->setId($id);
        $this->descripcion = $descripcion;
        $this->taza = $taza;
        $this->compania = $compania;
    }


    /**
     * @return Cliente[] 
     */
    public function getBeneficiarios() {
        //TODO Obtener beneficiarios
    }
    
    /** @var Compania */
    private $compania = null;
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getTaza() {
        return $this->taza;
    }

    public function setTaza($taza) {
        $this->taza = $taza;
    }

    public function getCompania() {
        return $this->compania;
    }

    public function setCompania($compania) {
        $this->compania = $compania;
    }

    public function getVariablesAsMap() {
        $map = array(
            "id" => $this->getId(),
            "descripcion" => $this->descripcion,
            "taza" => $this->getTaza(),
            "compania_id" => $this->getCompania()->getId()
        );
        return $map;
    }

}

?>
