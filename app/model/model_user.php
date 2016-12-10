<?php
include(MODEL_PATH."DB_connection.php");

function datosUsuario($campo, $busqueda) {
	$conex = Database::getInstance();
	$conex->Consulta("SELECT * FROM usuario WHERE $campo = '$busqueda'");
	while ($rs = $conex->LeeRegistro()) {
		$datos[] = $rs;
	}
	foreach ($datos as $dato) {
		$datos = $dato;
	}
	return $datos;
}

function existeUsuario($usuario) {
	$conex = Database::getInstance();
	$conex->Consulta("SELECT COUNT(*) AS total FROM usuario WHERE user = '$usuario'");
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	if ($total["total"] > 0) {
		return true;
	} else {
 		return false;
	}
}
