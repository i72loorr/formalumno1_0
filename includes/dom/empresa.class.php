<?php

class Empresa {
	
	private $cif;
	private $razon_social;
	private $domicilio;
	private $ciudad;
	private $provincia;
	private $telefono;
	private $email;
	
	public function __construct() {
	
	}
	
	function getCif() {
		return $this->cif;
	}
	function setCif($cif) {
		$this->cif = $cif;
	}
	
	function getRazonSocial() {
		return $this->razon_social;
	}
	function setRazonSocial($razon_social) {
		$this->razon_social = $razon_social;
	}
	
	function getDomicilio() {
		return $this->domicilio;
	}
	function setDomicilio($domicilio) {
		$this->domicilio = $domicilio;
	}
	
	function getCiudad() {
		return $this->ciudad;
	}
	function setCiudad($ciudad) {
		$this->ciudad = $ciudad;
	}
	
	function getProvincia() {
		return $this->provincia;
	}
	function setProvincia($provincia) {
		$this->provincia = $provincia;
	}
	
	function getTelefono() {
		return $this->telefono;
	}
	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}
	
	function getEmail() {
		return $this->email;
	}
	function setEmail($email) {
		$this->email = $email;
	}
}

?>