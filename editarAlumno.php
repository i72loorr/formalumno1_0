<?php
include('header.php');
require_once('includes/dao/empresa.dao.php');
require_once('includes/dao/alumno.dao.php');

$alumnoDao = new AlumnoDAO();
$alu = new Alumno();

if (isset($_POST['ea_save'])) {	
	$dni = $_POST['ea_dni'];
	$nombre = $_POST['ea_nombre'];
	$apellidos = $_POST['ea_apellidos'];
	$seg_social = $_POST['ea_seg_social'];
	$telefono = $_POST['ea_telefono'];
	$email = $_POST['ea_email'];
	$fecha_nac = $_POST['ea_fecha_nac'];
	$empresa_cif = $_POST['ea_empresa_cif'];
	
	$alu->setDni($dni);
	$alu->setNombre($nombre);
	$alu->setApellidos($apellidos);
	$alu->setSegSocial($seg_social);
	$alu->setTelefono($telefono);
	$alu->setEmail($email);
	$alu->setFechaNac($fecha_nac);
	$alu->setEmpresaCif($empresa_cif);
	
	$res = $alumnoDao->editarAlumno($alu);
	if ($res === TRUE){
		echo "<p>Alumno editado correctamente...</p>";		
	} else {
		echo "<p>ERROR al editar el alumno:</p><p>$res</p>";
	}
	echo "<p><a href=\"index.php\">Volver</a></p>";
}
else if (isset($_GET['dniAl']) && !empty($_GET['dniAl'])){
	$dniAl = $_GET['dniAl'];
	
	$alu = $alumnoDao->cargaAlumno($dniAl);
	if (is_null($alu)) {
		echo "<p>ERROR AL CARGAR ALUMNO CON DNI: " . $dniAl . "</p>";
	}
}

?>
<h2>EDITAR ALUMNO</h2>
<form name="abmEditAlumno" method="post" onSubmit="javascript:return confirmEditarAlumno();">
<label for="ea_dni">DNI:
<input name="ea_dni" type="text" value="<?php echo $alu->getDni(); ?>" readonly="readonly"></label>
<label for="ea_nombre">NOMBRE:
<input name="ea_nombre" type="text" value="<?php echo $alu->getNombre(); ?>"></label>
<label for="ea_apellidos">APELLIDOS:
<input name="ea_apellidos" type="text" value="<?php echo $alu->getApellidos(); ?>"></label>
<label for="ea_seg_socia">SEG. SOCIAL:
<input name="ea_seg_social" type="text" value="<?php echo $alu->getSegSocial(); ?>"></label>
<label for="ea_telefono">TELEFONO:
<input name="ea_telefono" type="text" value="<?php echo $alu->getTelefono(); ?>"></label>
<label for="ea_email">EMAIL:
<input name="ea_email" type="text" value="<?php echo $alu->getEmail(); ?>"></label>
<label for="ea_fecha_nac">FECHA NACIM. (aaa/mm/dd):
<input name="ea_fecha_nac" type="text" value="<?php echo $alu->getFechaNac(); ?>"></label>
<label for="ea_empresa_cif">EMPRESA:
<select name="ea_empresa_cif" value="<?php echo $alu->getEmpresaCif(); ?>">
<?php
$empresaDao = new EmpresaDAO();
$empresas = $empresaDao->cargaEmpresas();
foreach($empresas as $empresa) {
	// SELECCIONAR LA QUE VENGA DE BD EN EL ALUMNO
	$sel = "";
	if ($empresa->getCif() == $alu->getEmpresaCif()) {
		$sel = "selected=\"selected\"";
	}
	echo "<option value=\"" . $empresa->getCif() . "\" $sel>" . $empresa->getRazonSocial() . "</option>";
}
?>
</select></label>
<div class="clear"></div>
<input type="submit" name="ea_save" value="Guardar cambios" />
</form>
<a href="index.php">Volver</a>
<?php
include('footer.php');
?>