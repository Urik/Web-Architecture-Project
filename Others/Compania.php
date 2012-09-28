<?php
class Compania implements IUser
{
    private $id;
    private $razon_social;	
    private $direccion;
    private $responsabilidadCivil;
    private $tax_consumidor_final;	
    private $tax_monotributo;
    private $tax_responsable_inscripto;
    private $max_comision;	
    private $porcentaje_descuento;
    
    /** @var User */
    private $user;

    public function __construct($id, $razon_social, $direccion, $responsabilidadCivil, $tax_consumidor_final, $tax_monotributo, $tax_responsable_inscripto, $max_comision, $porcentaje_descuento, $user) {
        $this->id = $id;
        $this->razon_social = $razon_social;
        $this->direccion = $direccion;
        $this->responsabilidadCivil = $responsabilidadCivil;
        $this->tax_consumidor_final = $tax_consumidor_final;
        $this->tax_monotributo = $tax_monotributo;
        $this->tax_responsable_inscripto = $tax_responsable_inscripto;
        $this->max_comision = $max_comision;
        $this->porcentaje_descuento = $porcentaje_descuento;
        $this->user = $user;
    }
    
    public function createCobertura($descripcion, $taza) {
        $fields = array(
            "descripcion" => $descripcion,
            "tasa" => $taza,
            "compania_id" => $this->id
        );
        return (new CoberturaDAO())->create($fields);
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setRazon_Social($razon_social){
            $this->razon_social = $razon_social;
    }
    public function setDireccion($direccion){
            $this->direccion = $direccion;
    }	
    public function setRC($rc){
            $this->responsabilidadCivil = $rc;
    }
    public function setTax_Consumidor_Final($tax_consumidor_final){
            $this->tax_consumidor_final = $tax_consumidor_final;
    }
    public function setTax_Monotributo($tax_monotributo){
            $this->tax_monotributo = $tax_monotributo;
    }
    public function setTax_Responsable_Inscripto($tax_responsable_inscripto){
            $this->tax_responsable_inscripto = $tax_responsable_inscripto;
    }	
    public function setMax_Comision($max_comision){
            $this->max_comision = $max_comision;
    }
    public function setPorcentaje_Descuento($porcentaje_descuento){
            $this->porcentaje_descuento = $porcentaje_descuento;
    }
    
    public function getBirthday() {
        return $this->user->getBirthday();
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
            "razon_social" => $this->razon_social,
            "direccion" => $this->direccion,
            "responsabilidad_civil" => $this->responsabilidadCivil,
            "comision_productores" => $this->max_comision,
            "porcentaje_de_descuento" => $this->porcentaje_descuento,
            "user_id" => $this->user->getId()
        );
        return $map;
    }

    public function getEmail(){return $this->user->getEmail(); }
    public function getRazon_Social(){return $this->razon_social;}
    public function getDireccion(){return $this->direccion;}
    public function getRC(){return $this->responsabilidadCivil;}
    public function getTax_Consumidor_Final(){return $this->tax_consumidor_final;}
    public function getTax_Monotributo(){return $this->tax_monotributo;}
    public function getTax_Responsable_Inscripto(){return $this->tax_responsable_inscripto;}
    public function getMax_Comision(){return $this->max_comision;}
    public function getPorcentaje_Descuento(){return $this->porcentaje_descuento;}
    public function getId() { return $this->id; }
}
?>