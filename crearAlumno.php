<?php
include('header.php');
require_once('includes/dao/empresa.dao.php');

if (isset($_POST['na_save'])) {
	require_once('includes/dao/alumno.dao.php');
	
	$dni = $_POST['na_dni'];
	$nombre = $_POST['na_nombre'];
	$apellidos = $_POST['na_apellidos'];
	$seg_social = $_POST['na_seg_social'];
	$telefono = $_POST['na_telefono'];
	$email = $_POST['na_email'];
	$fecha_nac = $_POST['na_fecha_nac'];
	$empresa_cif = $_POST['na_empresa_cif'];
	
	$alu = new Alumno();
	$alu->setDni($dni);
	$alu->setNombre($nombre);
	$alu->setApellidos($apellidos);
	$alu->setSegSocial($seg_social);
	$alu->setTelefono($telefono);
	$alu->setEmail($email);
	$alu->setFechaNac($fecha_nac);
	$alu->setEmpresaCif($empresa_cif);
	
	$alumnoDao = new AlumnoDAO();
	$res = $alumnoDao->crearAlumno($alu);
	if ($res === TRUE){
		echo "<p>Alumno creado correctamente...</p>";		
	} else {
		echo "<p>ERROR al crear el alumno:</p><p>$res</p>";
	}
	echo "<p><a href=\"index.php\">Volver</a></p>";
}

?>
<h2>A&Ntilde;ADIR ALUMNO</h2>
<form name="abmNuevoAlumno" method="post" onSubmit="javascript:return confirmCreaAlumno();">
<label for="na_dni">DNI:
<input name="na_dni" type="text" value=""></label>
<label for="na_nombre">NOMBRE:
<input name="na_nombre" type="text" value=""></label>
<label for="na_apellidos">APELLIDOS:
<input name="na_apellidos" type="text" value=""></label>
<label for="na_seg_socia">SEG. SOCIAL:
<input name="na_seg_social" type="text" value=""></label>
<label for="na_telefono">TELEFONO:
<input name="na_telefono" type="text" value=""></label>
<label for="na_email">EMAIL:
<input name="na_email" type="text" value=""></label>
<label for="na_fecha_nac">FECHA NACIM. (aaa/mm/dd):
<input name="na_fecha_nac" type="text" value=""></label>
<label for="na_empresa_cif">EMPRESA:
<select name="na_empresa_cif" value="">
<?php
$empresaDao = new EmpresaDAO();
$empresas = $empresaDao->cargaEmpresas();
foreach($empresas as $empresa) {
	echo "<option value=\"" . $empresa->getCif() . "\">" . $empresa->getRazonSocial() . "</option>";
}
?>
</select></label>
<div class="clear"></div>
<input type="submit" name="na_save" value="Crear alumno" />
</form>
<a href="index.php">Volver</a>
<?php
include('footer.php');
?>