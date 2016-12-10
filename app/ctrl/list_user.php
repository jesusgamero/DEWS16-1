<?php
$hayError = false;

// Llamada al modelo

include_once (MODEL_PATH . "model_user.php");

// Llamada a utilidades

include_once (HELPERS_PATH . "helpers.php");

define('PROXPAG', 10);

if (isset($_GET['pag'])) $pag = $_GET['pag'];
else $pag = 1;
$maxPag = ((int)(NUsuarios()) / PROXPAG) + 1;

if ($pag < 1 || $pag > $maxPag) $pag = 1;
$posIni = (($pag - 1) * PROXPAG) + 1;
$listado = array();

if ($_SESSION['tipo'] == 'A') {
	if (!$_POST) {
		$listado = verUsuarios($posIni);
		$nreg = NUsuarios();

		// Llamada a la vista

		include_once (VIEW_PATH . "list_user.php");

	}
}
else {
	header('Location:?ctrl=login'); //Si no es administrador, me redirige al login.
}

?>