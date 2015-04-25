<?php
include('header.php');
require_once('includes/dao/alumno.dao.php');
$alumnoDao = new AlumnoDAO();
$alums = $alumnoDao->cargaAlumnos();
if (isset($alums) && !is_null($alums) && is_array($alums) && sizeof($alums) > 0) {
	echo "<table class=\"data\">";
	echo "<tr><th>DNI</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELEFONO</th><th>EMAIL</th><th>Editar</th><th>Borrar</th></tr>";
	foreach($alums as $alum) {
		echo "<tr>";
		echo "<td>" . $alum->getDni() . "</td>";
		echo "<td>" . $alum->getNombre() . "</td>";
		echo "<td>" . $alum->getApellidos() . "</td>";
		echo "<td>" . $alum->getTelefono() . "</td>";
		echo "<td>" . $alum->getEmail() . "</td>";
		echo "<td><a href=\"editarAlumno.php?dniAl=" . $alum->getDni() . "\">Editar</a></td>";
		echo "<td><a href=\"borrarAlumno.php?dniAl=" . $alum->getDni() . "\">Borrar</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<input type=\"button\" value=\"Crear alumno\" onclick=\"location.href='crearAlumno.php';\"/>";
}
include('footer.php');
?>
