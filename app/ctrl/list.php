<?php
$ofertas = array();
$hayError = false;

// Llamada al modelo

include_once (MODEL_PATH . "model.php");

// Llamada a utilidades

include_once (HELPERS_PATH . "helpers.php");

// Array para crear los select de búsqueda.

$criterio = array(
	'=' => "Igual a",
	'LIKE' => "Contenga",
	'>' => "Mayor",
	'<' => "Menor"
);
define('PROXPAG', 4);
$listado = array();

// /Guardo en sesiones los campos de la búsqueda.

if ($_POST) {
	foreach($_POST as $campo => $valor) {
		$_SESSION[$campo] = $valor;
	}
}

// Si las sesion de búsqueda está vacia es cargo todas las ofertas.

if (sesion('cond1b') == '' && sesion('cond2b') == '' && sesion('cond3b') == '') {

	// Realizo la paginación de las ofertas.

	if (isset($_GET['pag'])) $pag = $_GET['pag'];
	else $pag = 1;
	$maxPag = ((int)(NRegistros()) / PROXPAG) + 1;
	if ($pag < 1 || $pag > $maxPag) $pag = 1;
	$posIni = (($pag - 1) * PROXPAG) + 1;
	$listado = verOfertas($posIni);
	$nreg = NRegistros();

	// Llamada a la vista

	include_once (VIEW_PATH . "list.php");

}
else { //Cargo la búsqueda.
	$cp = "/[0-9]{5}/";
	$hoy = date("d/m/Y");
	$condiciones = array();

	// FILTRADO DE LOS CAMPOS DE BÚSQUEDA
	// Formato código postal inválido.

	if (sesion('cond3b') && !preg_match($cp, sesion('cond3b'))) {
		$errores['cond3b'] = 'Código postal erroneo: El CP tiene que tener cinco dígitos';
		$hayError = TRUE;
	}

	// Formato de la fecha de creación incorrecta.

	if (sesion('cond2b') && !verificarFecha(sesion('cond2b'))) {
		$errores['cond2b'] = 'El formato de la fecha de creación es incorrecto';
		$hayError = TRUE;
	}

	// La fecha de creación tiene que ser posterior a la de hoy.

	if (sesion('cond2b') && verificarFecha(sesion('cond2b')) && formatoFecha(sesion('cond2b')) > formatoFecha($hoy)) {
		$errores['cond2b'] = 'La fecha de creación tiene que ser anterior al día de hoy';
		$hayError = TRUE;
	}

	// En caso de que haya algun error, lo muestro y cargo la lista de nuevo sin nada que mostrar hasta que se corriga la búsqueda.

	if ($hayError) {

		// Llamada a la vista

		$nreg = 0;
		$maxPag = 1;
		include_once (VIEW_PATH . "list.php");

	}
	else { //Si todo está correcto, realizo la búsqueda.
		if (sesion('cond1b') != '') {
			if (sesion('cond1a') == 'LIKE') {
				$cond1 = "descripcion " . $_SESSION['cond1a'] . " '%" . $_SESSION['cond1b'] . "%'";
			}
			else {
				$cond1 = "descripcion" . $_SESSION['cond1a'] . "'" . $_SESSION['cond1b'] . "'";
			}

			$condiciones[] = $cond1;
		}

		if (sesion('cond2b') != '') {
			if (sesion('cond2a') == 'LIKE') {
				$cond2 = "fcreacion " . $_SESSION['cond2a'] . " '%" . formatoFecha($_SESSION['cond2b']) . "%'";
			}
			else {
				$cond2 = "fcreacion" . $_SESSION['cond2a'] . "'" . formatoFecha($_SESSION['cond2b']) . "'";
			}

			$condiciones[] = $cond2;
		}

		if (sesion('cond3b') != '') {
			if (sesion('cond3a') == 'LIKE') {
				$cond3 = "cp " . $_SESSION['cond3a'] . " '%" . $_SESSION['cond3b'] . "%'";
			}
			else {
				$cond3 = "cp" . $_SESSION['cond3a'] . "'" . $_SESSION['cond3b'] . "'";
			}

			$condiciones[] = $cond3;
		}

		$condicion = implode(" and ", $condiciones);
		$nreg = nRegistrosBuscar($condicion);

		// Paginación del buscar.

		if (isset($_GET['pag'])) $pag = $_GET['pag'];
		else $pag = 1;
		$maxPag = ((int)(nRegistrosBuscar($condicion)) / PROXPAG) + 1;
		if ($pag < 1 || $pag > $maxPag) $pag = 1;
		$posIni = (($pag - 1) * PROXPAG) + 1;

		// Muestro la búsqueda

		$listado = verBusqueda($condicion, $posIni);

		// Llamada a la vista

		include_once (VIEW_PATH . "list.php");

	}
}

?>
