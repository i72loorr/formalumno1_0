<?php

class Alumno {
	
	private $dni;
	private $nombre;
	private $apellidos;
	private $seg_social;
	private $telefono;
	private $email;
	private $fecha_nac;
	private $empresa_cif;
	
	public function __construct() {
	
	}
	
	function getDni() {
		return $this->dni;
	}
	function setDni($dni) {
		$this->dni = $dni;
	}
	
	function getNombre() {
		return $this->nombre;
	}
	function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	
	function getApellidos() {
		return $this->apellidos;
	}
	function setApellidos($apellidos) {
		$this->apellidos = $apellidos;
	}
	
	function getSegSocial() {
		return $this->seg_social;
	}
	function setSegSocial($seg_social) {
		$this->seg_social = $seg_social;
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
	
	function getFechaNac() {
		return $this->fecha_nac;
	}
	function setFechaNac($fecha_nac) {
		$this->fecha_nac = $fecha_nac;
	}
	
	function getEmpresaCif() {
		return $this->empresa_cif;
	}
	function setEmpresaCif($empresa_cif) {
		$this->empresa_cif = $empresa_cif;
	}
	/*
	function load($dni) {
		$con = new DBConnection();
		$sql = "SELECT * FROM ALUMNO WHERE DNI = '$dni'";
		$con->query($sql);
		if ($con->getNumRows() >= 1) {
			$row = $con->getRowAssoc(0);
			$this->dni = $dni;
			$this->nombre = $row['NOMBRE'];
			$this->apellidos = $row['APELLIDOS'];
			$this->seg_social = $row['SEG. SOCIAL'];
			$this->telefono = $row['TELEFONO'];
			$this->email = $row['EMAIL'];
			$this->fecha_nac = $row['FECHANACIMIENTO'];
			$this->empresa_cif = $row['EMPRESA CIF'];
		}
	}
	*/
}

?>