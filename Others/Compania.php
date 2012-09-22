<?php
class Compania
{
	private $email;
	private $razon_social;	
	private $direccion;
	private $rc;
	private $tax_consumidor_final;	
	private $tax_monotributo;
	private $tax_responsable_inscripto;
	private $max_comision;	
	private $porcentaje_descuento;
	
	public function __construct($email,$razon_social,$direccion,$rc,$tax_consumidor_final,$tax_monotributo,$tax_responsable_inscripto,$max_comision,$porcentaje_descuento){
		$this->email = $email;
		$this->razon_social = $razon_social;
		$this->direccion = $direccion;
		$this->rc = $rc;
		$this->tax_consumidor_final = $tax_consumidor_final;
		$this->tax_monotributo = $tax_monotributo;
		$this->tax_responsable_inscripto = $tax_responsable_inscripto;
		$this->max_comision = $max_comision;
		$this->porcentaje_descuento = $porcentaje_descuento;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	public function setRazon_Social($pasrazon_socialsword){
		$this->razon_social = $razon_social;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}	
	public function setRC($rc){
		$this->rc = $rc;
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
	
	public function getEmail(){return $this->email;}
	public function getRazon_Social(){return $this->razon_social;}
	public function getDireccion(){return $this->direccion;}
	public function getRC(){return $this->rc;}
	public function getTax_Consumidor_Final(){return $this->tax_consumidor_final;}
	public function getTax_Monotributo(){return $this->tax_monotributo;}
	public function getTax_Responsable_Inscripto(){return $this->tax_responsable_inscripto;}
	public function getMax_Comision(){return $this->max_comision;}
	public function getPorcentaje_Descuento(){return $this->porcentaje_descuento;}
	
}
?>