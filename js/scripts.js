function confirmCreaAlumno() {
	if (confirm('Se va a crear un nuevo alumno, ¿esta seguro?')) {
		return true;
	} else {
		return false;
	}
}

function confirmEditarAlumno() {
	if (confirm('Se van a modificar los datos del alumno, ¿esta seguro?')) {
		return true;
	} else {
		return false;
	}
}

function confirmBorrarAlumno() {
	if (confirm('Se va a eliminar el alumno, ¿esta seguro?')) {
		return true;
	} else {
		return false;
	}
}