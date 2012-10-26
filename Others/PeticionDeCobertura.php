<?php

/*

 */

/**
 * Description of PeticionDeCobertura
 *
 * @author Usuario
 */
class PeticionDeCobertura extends Thing {

    /** @var Cliente */
    private $cliente;
    private $modelo = 0;
    private $sumaAsegurada = 0000000.0000;
    private $datos = "";
    private $aprobada = false;

    /** @var Insurance */
    private $cobertura;
    private $disminucionDeComision = 000.00;

    /** @var DateTime */
    private $fecha;

    function __construct($id, $cliente, $modelo, $sumaAsegurada, $datos, $aprobada, $cobertura, $disminucionDeComision, $fecha) {
        $this->setId($id);
        $this->cliente = $cliente;
        $this->modelo = $modelo;
        $this->sumaAsegurada = $sumaAsegurada;
        $this->datos = $datos;
        $this->aprobada = $aprobada;
        $this->cobertura = $cobertura;
        $this->disminucionDeComision = $disminucionDeComision;
        $this->fecha = $fecha;
    }

    public function getCosto() {
        $rc = $this->getCobertura()->getCompania()->getRC();
        $taza = $this->getCobertura()->getTaza();
        $sit = $this->getCobertura()->getCompania()->getImpuesto($this->getCobertura()->getCondicionImpositiva());
        $costo = ($this->sumaAsegurada * $taza / 100 + $rc) * ((100 - $this->disminucionDeComision) / 100) * ((100 + $sit) / 100 );
        return $costo;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getSumaAsegurada() {
        return $this->sumaAsegurada;
    }

    public function setSumaAsegurada($sumaAsegurada) {
        $this->sumaAsegurada = $sumaAsegurada;
    }

    public function getDatos() {
        return $this->datos;
    }

    public function setDatos($datos) {
        $this->datos = $datos;
    }

    public function getAprobada() {
        return $this->aprobada;
    }

    public function setAprobada($aprobada) {
        $this->aprobada = $aprobada;
    }

    public function getCobertura() {
        return $this->cobertura;
    }

    public function setCobertura($cobertura) {
        $this->cobertura = $cobertura;
    }

    public function getDisminucionDeComision() {
        return $this->disminucionDeComision;
    }

    public function setDisminucionDeComision($disminucionDeComision) {
        $this->disminucionDeComision = $disminucionDeComision;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getVariablesAsMap() {
        $map = array(
            PeticionDeCoberturaColumns::ID => $this->getId(),
            PeticionDeCoberturaColumns::APROBADA => $this->getAprobada(),
            PeticionDeCoberturaColumns::CLIENTE_ID => $this->getCliente()->getId(),
            PeticionDeCoberturaColumns::COBERTURA_ID => $this->getCobertura()->getId(),
            PeticionDeCoberturaColumns::DATOS => $this->getDatos(),
            PeticionDeCoberturaColumns::DISMINUCION_DE_COMISION => $this->getDisminucionDeComision(),
            PeticionDeCoberturaColumns::FECHA => $this->getFecha(),
            PeticionDeCoberturaColumns::MODELO => $this->getModelo(),
            PeticionDeCoberturaColumns::SUMA_ASEGURADA => $this->getSumaAsegurada()  
        );
        return $map;
    }
}

?>
