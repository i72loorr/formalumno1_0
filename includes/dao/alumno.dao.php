<?php
require_once('includes/dbconn.class.php');
require_once('includes/dom/alumno.class.php');

class AlumnoDAO {

	function __construct() {
	
	}
	
	function cargaAlumno($dni) {
		$con = new DBConnection();
		$sql = "SELECT * FROM ALUMNO WHERE DNI = '$dni'";
		$con->query($sql);
		if ($con->getNumRows() >= 1) {
			$row = $con->getRowAssoc(0);
			$alu = new Alumno();
			$alu->setDni($dni);
			$alu->setNombre($row['NOMBRE']);
			$alu->setApellidos($row['APELLIDOS']);
			$alu->setSegSocial($row['SEG. SOCIAL']);
			$alu->setTelefono($row['TELEFONO']);
			$alu->setEmail($row['EMAIL']);
			$alu->setFechaNac($row['FECHANACIMIENTO']);
			$alu->setEmpresaCif($row['EMPRESA_CIF']);
			return $alu;
		}
		return NULL;
	}
	
	function cargaAlumnos() {
		$con = new DBConnection();
		$sql = "SELECT * FROM ALUMNO";
		$con->query($sql);
		if ($con->getNumRows() >= 1) {
			$alums = array();
			for ($row_no = $con->getNumRows() - 1; $row_no >= 0; $row_no--) {
				$row = $con->getRowAssoc($row_no);
				$alu = new Alumno();
				$alu->setDni($row['DNI']);
				$alu->setNombre($row['NOMBRE']);
				$alu->setApellidos($row['APELLIDOS']);
				$alu->setSegSocial($row['SEG. SOCIAL']);
				$alu->setTelefono($row['TELEFONO']);
				$alu->setEmail($row['EMAIL']);
				$alu->setFechaNac($row['FECHANACIMIENTO']);
				$alu->setEmpresaCif($row['EMPRESA_CIF']);
				$alums[] = $alu;
			}
			return $alums;
		}
		return NULL;
	}
	
	function crearAlumno($alu) {
		$sql = "INSERT INTO ALUMNO (DNI, NOMBRE, APELLIDOS, `SEG. SOCIAL`, TELEFONO, EMAIL, FECHANACIMIENTO, EMPRESA_CIF) VALUES (";
		$sql .= "'" . $alu->getDni() . "', ";
		$sql .= "'" . $alu->getNombre() . "', ";
		$sql .= "'" . $alu->getApellidos() . "', ";
		$sql .= "'" . $alu->getSegSocial() . "', ";
		$sql .= "'" . $alu->getTelefono() . "', ";
		$sql .= "'" . $alu->getEmail() . "', ";
		$sql .= "'" . $alu->getFechaNac() . "', ";
		$sql .= "'" . $alu->getEmpresaCif() . "')";
		
		$con = new DBConnection();
		$con->query($sql);
		if ($con->getActualResult() != TRUE) {
			return $con->getError();
		}
		return TRUE;
	}
	
	function editarAlumno($alu) {
		$sql = "UPDATE ALUMNO SET ";
		$sql .= "NOMBRE = '" . $alu->getNombre() . "', ";
		$sql .= "APELLIDOS = '" . $alu->getApellidos() . "', ";
		$sql .= "`SEG. SOCIAL` = '" . $alu->getSegSocial() . "', ";
		$sql .= "TELEFONO = '" . $alu->getTelefono() . "', ";
		$sql .= "EMAIL = '" . $alu->getEmail() . "', ";
		$sql .= "FECHANACIMIENTO = '" . $alu->getFechaNac() . "', ";
		$sql .= "EMPRESA_CIF = '" . $alu->getEmpresaCif() . "' ";
		$sql .= "WHERE DNI = '" . $alu->getDni() . "'";
		
		$con = new DBConnection();
		$con->query($sql);
		if ($con->getActualResult() != TRUE) {
			return $con->getError();
		}
		return TRUE;
	}
	
	function borrarAlumno($dni, $empresa_cif) {
		$sql = "DELETE FROM ALUMNO WHERE DNI = '$dni' AND EMPRESA_CIF = '$empresa_cif'";
		
		$con = new DBConnection();
		$con->query($sql);
		if ($con->getActualResult() != TRUE) {
			return $con->getError();
		}
		return TRUE;
	}

}

?>