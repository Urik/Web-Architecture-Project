<?php
class Productor
{
	private $DNI;
	private $nombre;	
	private $apellido;
	private $direccion;
	private $email;	
	private $telefono_1;
	private $telefono_2;
	
	public function __construct($DNI,$nombre,$apellido,$direccion,$email,$telefono_1,$telefono_2){
		$this->DNI = $DNI;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->direccion = $direccion;
		$this->email = $email;
		$this->telefono_1 = $telefono_1;
		$this->telefono_2 = $telefono_2;
	}
	
	public function setDNI($DNI){
		$this->DNI = $DNI;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}	
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setTelefono_1($telefono_1){
		$this->telefono_1 = $telefono_1;
	}	
	public function setTelefono_2($telefono_2){
		$this->telefono_2 = $telefono_2;
	}
	
	public function getDNI(){return $this->DNI;}
	public function getNombre(){return $this->nombre;}
	public function getApellido(){return $this->apellido;}
	public function getDireccion(){return $this->direccion;}
	public function getEmail(){return $this->email;}
	public function getTelefono_1(){return $this->telefono_1;}
	public function getTelefono_2(){return $this->telefono_2;}
	
}
?>
