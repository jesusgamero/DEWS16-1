<?php

// Llamada al modelo

include (MODEL_PATH . "model_user.php");

// Llamada a utilidades

include_once (HELPERS_PATH . "helpers.php");

$tipo = array(
	'A' => "Administrador",
	'P' => "Psicólogo"
);
$hayError = false;

if ($_SESSION['tipo'] == 'A') { //Solo entra si es administrador.
	if (!$_POST) //Si es la primera vez que entra.
	{

		// Llamada a la vista

		include_once (VIEW_PATH . "insert_user.php");

	}
	else

	// Si he realizado el envio.

	{

		// Contraseña de contacto vacia.

		if (!post('pass')) {
			$errores['pass'] = 'Debes introducir una contraseña';
			$hayError = TRUE;
		}

		// Aquí podríamos colocar un filtrado para mas campos del usuario.

		if ($hayError) {

			// Llamada a la vista

			include_once (VIEW_PATH . "insert_user.php");

		}
		else {
			$usuario = array(
				'tipo' => $_POST['tipo'],
				'nombre' => $_POST['nombre'],
				'user' => $_POST['user'],
				'pass' => $_POST['pass']
			);
			insertaUsuario($usuario);
			header('Location:?ctrl=list_user&insertado=si');
		}
	}
}
else {
	header('Location:?ctrl=login'); //Si no es administrador, me redirige al login.
}

?>
