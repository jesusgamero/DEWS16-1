<?php
$hayError = false;
$errores = [];
include (MODEL_PATH . "model_user.php");

include_once (HELPERS_PATH . "helpers.php");

if (isset($_SESSION["tipo"]) && ($_SESSION['tipo'] == 'A' || $_SESSION['tipo'] == 'P')) {
	header("location: ?ctrl=list");
}
else {
	if ($_POST) {
		if (existeUsuario($_POST["usuario"])) {
			$datos = datosUsuario("user", $_POST["usuario"]);

			// Si la clave coincide

			if ($_POST["clave"] == $datos["pass"]) {
				$_SESSION["nombre"] = $datos["nombre"];
				$_SESSION["usuario"] = $datos["user"];
				$_SESSION["tipo"] = $datos["tipo"];
				$_SESSION["hora"] = date("H:i");
				header("location: ?ctrl=list");
			}
			else {
				$errores['clave'] = 'Error de acceso: Contraseña errónea';
				$hayError = TRUE;
			}
		}
		else {
			$errores['usuario'] = 'Error de acceso: El usuario no existe';
			$hayError = TRUE;
		}
	}

	include VIEW_PATH . "login.php";

}