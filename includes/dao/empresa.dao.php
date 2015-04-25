<?php
require_once('includes/dbconn.class.php');
require_once('includes/dom/empresa.class.php');

class EmpresaDAO {

	function __construct() {
	
	}
	
	function cargaEmpresa($cif) {
		$con = new DBConnection();
		$sql = "SELECT * FROM EMPRESA WHERE CIF = '$cif'";
		$con->query($sql);
		if ($con->getNumRows() >= 1) {
			$row = $con->getRowAssoc(0);
			$emp = new Empresa();
			$emp->setCif($cif);
			$emp->setRazonSocial($row['RAZON_SOCIAL']);
			$emp->setDomicilio($row['DOMICILIO']);
			$emp->setCiudad($row['CIUDAD']);
			$emp->setProvincia($row['PROVINCIA']);
			$emp->setTelefono($row['TELEFONO']);
			$emp->setEmail($row['EMAIL']);
			return $emp;
		}
		return NULL;
	}
	
	function cargaEmpresas() {
		$con = new DBConnection();
		$sql = "SELECT * FROM EMPRESA";
		$con->query($sql);
		if ($con->getNumRows() >= 1) {
			$emprs = array();
			for ($row_no = $con->getNumRows() - 1; $row_no >= 0; $row_no--) {
				$row = $con->getRowAssoc($row_no);
				$emp = new Empresa();
				$emp->setCif($row['CIF']);
				$emp->setRazonSocial($row['RAZON_SOCIAL']);
				$emp->setDomicilio($row['DOMICILIO']);
				$emp->setCiudad($row['CIUDAD']);
				$emp->setProvincia($row['PROVINCIA']);
				$emp->setTelefono($row['TELEFONO']);
				$emp->setEmail($row['EMAIL']);
				$emprs[] = $emp;
			}
			return $emprs;
		}
		return NULL;
	}

}

?>