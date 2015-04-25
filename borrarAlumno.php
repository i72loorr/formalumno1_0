<?php
include('header.php');
require_once('includes/dao/empresa.dao.php');
require_once('includes/dao/alumno.dao.php');

$alumnoDao = new AlumnoDAO();
$alu = new Alumno();

if (isset($_POST['ba_delete'])) {	
	$dni = $_POST['ba_dni'];
	$empresa_cif = $_POST['ba_empresa_cif'];
	
	if (isset($dni) && !empty($dni) && isset($empresa_cif) && !empty($empresa_cif)) {
		$res = $alumnoDao->borrarAlumno($dni,$empresa_cif);
		if ($res === TRUE){
			echo "<p>Alumno borrado correctamente...</p>";
		} else {
			echo "<p>ERROR al borrar el alumno:</p><p>$res</p>";
		}		
	}
	else {
		echo "<p>ERROR: No se ha recibido DNI y/o CIF de empresa del alumno a borrar</p>";
	}
	echo "<p><a href=\"index.php\">Volver</a></p>";
}
else if (isset($_GET['dniAl']) && !empty($_GET['dniAl'])){
	$dniAl = $_GET['dniAl'];
	
	$alu = $alumnoDao->cargaAlumno($dniAl);
	if (is_null($alu)) {
		echo "<p>ERROR AL CARGAR ALUMNO CON DNI: " . $dniAl . "</p>";
	}
?>
<h2>BORRAR ALUMNO</h2>
<form name="abmEditAlumno" method="post" onSubmit="javascript:return confirmBorrarAlumno();">
<label for="ba_dni">DNI:
<input name="ba_dni" type="text" value="<?php echo $alu->getDni(); ?>" readonly="readonly"></label>
<label for="ba_nombre">NOMBRE:
<input name="ba_nombre" type="text" value="<?php echo $alu->getNombre(); ?>" readonly="readonly"></label>
<label for="ba_apellidos">APELLIDOS:
<input name="ba_apellidos" type="text" value="<?php echo $alu->getApellidos(); ?>" readonly="readonly"></label>
<label for="ba_seg_socia">SEG. SOCIAL:
<input name="ba_seg_social" type="text" value="<?php echo $alu->getSegSocial(); ?>" readonly="readonly"></label>
<label for="ba_telefono">TELEFONO:
<input name="ba_telefono" type="text" value="<?php echo $alu->getTelefono(); ?>" readonly="readonly"></label>
<label for="ba_email">EMAIL:
<input name="ba_email" type="text" value="<?php echo $alu->getEmail(); ?>" readonly="readonly"></label>
<label for="ba_fecha_nac">FECHA NACIM. (aaa/mm/dd):
<input name="ba_fecha_nac" type="text" value="<?php echo $alu->getFechaNac(); ?>" readonly="readonly"></label>
<label for="ba_empresa_rs">EMPRESA:
<?php
$empresaDao = new EmpresaDAO();
$empresa = $empresaDao->cargaEmpresa($alu->getEmpresaCif());
?>
<input name="ba_empresa_rs" type="text" value="<?php echo $empresa->getRazonSocial(); ?>" readonly="readonly"></label>
<input type="hidden" name="ba_empresa_cif" value="<?php echo $alu->getEmpresaCif(); ?>" />
<div class="clear"></div>
<input type="submit" name="ba_delete" value="Borrar alumno" />
</form>
<a href="index.php">Volver</a>
<?php
}
include('footer.php');
?>