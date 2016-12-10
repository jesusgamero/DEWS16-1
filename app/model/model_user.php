<?php
include (MODEL_PATH . "DB_connection.php");

/**Devuelve los datos de un usuario cuyo campo le paso como parámetro.
* @param unknown $campo Campo a buscar.
* @param unknown $busqueda Criterio de búsqueda.
* @return unknown $datos Datos del usuario.
*/

function datosUsuario($campo, $busqueda)
{
	$datos = array();
	$conex = Database::getInstance();
	$conex->Consulta("SELECT * FROM usuario WHERE $campo = '$busqueda'");
	while ($rs = $conex->LeeRegistro()) {
		$datos = $rs;
	}

	return $datos;
}

/**Devuelve si existe un usuario o no.
* @param unknown $usuario Nombre de usuario.
* @return boolean Devuelve si existe o no.
*/

function existeUsuario($usuario)
{
	$bdatos = Database::getInstance();
	$query = "SELECT COUNT(*) AS total FROM usuario WHERE user = '$usuario'";
	$res = $bdatos->Consulta($query);
	$registro = $bdatos->LeeRegistro();
	if ($registro["total"] > 0) {
		return true;
	}
	else {
		return false;
	}
}

/**Devuelve el número de usuarios registrados.
* @return unknown $reg['total'] Número de usuarios.
*/

function nUsuarios()
{
	$MyBD = Database::getInstance();
	$query = "SELECT count(*) as total FROM usuario";
	$result = $MyBD->Consulta($query);
	$reg = mysqli_fetch_assoc($result);
	return $reg['total'];
}

/**Inserta un usuario.
* @param unknown $campos Datos del usuario.
*/

function insertaUsuario($campos)
{
	$bd = Database::getInstance();
	$bd->Insertar("usuario", $campos);
}

/**Borra un usario.
* @param unknown $id ID del usuario-
*/

function borrarUsuario($id)
{
	$bd = Database::getInstance();
	$bd->BorrarRegistro("usuario", "cod", $id);
}

/**Modifica un usuario
* @param unknown $campos Campos a modificar.
* @param unknown $id ID del usuario.
*/

function modificarUsuario($campos, $id)
{
	$bd = Database::getInstance();
	$bd->Update("usuario", $campos, "WHERE cod=$id");
}

/**Muestra los usuarios.
* @param unknown $posIni Posición inicial dada.
* @return unknown $usuarios Datos de los usuarios devueltos.
*/

function verUsuarios($posIni)
{
	$bd = database::getInstance();
	$query = "SELECT * FROM usuario LIMIT " . ($posIni - 1) . "," . PROXPAG;
	$res = array();
	$res = $bd->Consulta($query);
	while ($line = $bd->LeeRegistro($res)) {
		$usuarios[] = $line;
	}

	if (!isset($usuarios)) //Con esto evito problemas y errores indeseados al no tener usuarios en la tabla.
	{
		return NULL;
	}

	return $usuarios;
}