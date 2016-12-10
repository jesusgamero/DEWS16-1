<?php
include (MODEL_PATH . "DB_connection.php");

/**Obstiene el nombre de todas las provincias de la base de datos.
* @return unknown $provincias[] Array con todos los datos de todas las provincias.
*/

function obtenerProvincias()
{
	$a = [];
	$provincias = [];
	$bdatos = Database::getInstance();
	$a = $bdatos->Consulta("SELECT p.cod_provincia, p.nombre from provincia p");
	while ($line = mysqli_fetch_array($a, MYSQL_ASSOC)) {
		$provincias[$line['cod_provincia']] = $line['nombre'];
	}

	return $provincias;
}

/**
 * Obtiene la lista de todos los usuarios que son psicologos.
 * @return unknown $pico[] Devuelve el array con los datos de los psicologos.
 */

function obtenerPsicologos()
{
	$a = [];
	$psico = [];
	$bdatos = Database::getInstance();
	$a = $bdatos->Consulta("SELECT u.cod, u.nombre from usuario u WHERE tipo='P'");
	while ($line = mysqli_fetch_array($a, MYSQL_ASSOC)) {
		$psico[$line['cod']] = $line['nombre'];
	}

	return $psico;
}

/**
 * Función que recibe un i y devuelve un nombre.
 * @param unknown $id ID de las provincias.
 * @return unknown $registro['nombre'] Devuelve el nombre de la provincia.
 */

function nombreProvincias($id)
{
	$bdatos = Database::getInstance();
	$query = 'SELECT p.nombre FROM provincia p WHERE p.cod_provincia=' . $id;
	$res = $bdatos->Consulta($query);
	$registro = $bdatos->LeeRegistro();
	return $registro['nombre'];
}

/**Obtiene los datos de una oferta a la que le he pasado el id.
* @param unknown $id ID de la oferta.
* @return unknown $datos Array de datos de la oferta indicada.
*/

function obtenerOferta($id)
{
	$datos = array();
	$conex = Database::getInstance();
	$conex->Consulta("SELECT * FROM oferta WHERE idoferta = '$id'");
	while ($rs = $conex->LeeRegistro()) {
		$datos = $rs;
	}

	return $datos;
}

/**Recibe el id del psicologo y devuelve el nombre.
* @param unknown $id ID del psicologo.
* @return $registro['nombre'] Nombre del psicologo.
*/

function nombrePsicologo($id)
{
	$bdatos = Database::getInstance();
	$query = 'SELECT u.nombre FROM usuario u WHERE u.cod=' . $id;
	$res = $bdatos->Consulta($query);
	$registro = $bdatos->LeeRegistro();
	return $registro['nombre'];
}

/**Devuelve el número de ofertas registradas en la base de datos.
* @return unknown $reg['total'] Total de ofertas registradas.
*/

function nRegistros()
{
	$MyBD = Database::getInstance();
	$query = "SELECT count(*) as total FROM oferta";
	$result = $MyBD->Consulta($query);
	$reg = mysqli_fetch_assoc($result);
	return $reg['total'];
}

/**Recibe una condición, realiza la búsqueda y devuelve el número de resultados.
* @param unknown $condicion Condición de búsqueda
* @return unknown $reg['total'] Número de ofertas encontradas.
*/

function nRegistrosBuscar($condicion)
{
	$MyBD = Database::getInstance();
	$query = "SELECT count(*) as total FROM oferta where " . $condicion;
	$result = $MyBD->Consulta($query);
	$reg = mysqli_fetch_assoc($result);
	return $reg['total'];
}

/**Inserta una oferta con los campos indicado
* @param unknown $campos Campos de la oferta.
*/

function insertaOferta($campos)
{
	$bd = Database::getInstance();
	$bd->Insertar("oferta", $campos);
}

/**Borra una oferta indicada
* @param unknown $id Id de la oferta a borrar.
*/

function borrarOferta($id)
{
	$bd = Database::getInstance();
	$bd->BorrarRegistro("oferta", "idoferta", $id);
}

/**Modifica los campos de una oferta indicada.
* @param unknown $campos Campos a modificar.
* @param unknown $id Id de la oferta.
*/

function modificarOferta($campos, $id)
{
	$bd = Database::getInstance();
	$bd->Update("oferta", $campos, "WHERE idoferta=$id");
}

/**Muestras ofertas desde la posición indicada.
* @param unknown $posIni Posición inicial.
* @return unknown $ofertas Ofertas mostradas.
*/

function verOfertas($posIni)
{
	$bd = database::getInstance();
	$query = "SELECT * FROM oferta LIMIT " . ($posIni - 1) . "," . PROXPAG;
	$res = array();
	$res = $bd->Consulta($query);
	while ($line = $bd->LeeRegistro($res)) {
		$ofertas[] = $line;
	}

	if (!isset($ofertas)) //Con esto evito problemas y errores indeseados al no tener ofertas en la tabla.
	{
		return NULL;
	}

	return $ofertas;
}

/**Realiza la búsqueda y devuelve los resultados.
* @param unknown $condicion Condición de búsqueda.
* @param unknown $posIni Posición inicial.
* @return unknown $ofertas Resultado de las ofertas de la búsqueda.
*/

function verBusqueda($condicion, $posIni)
{
	$bd = database::getInstance();
	$query = "SELECT * FROM oferta where " . $condicion . " LIMIT " . ($posIni - 1) . "," . PROXPAG;
	$res = array();
	$res = $bd->Consulta($query);
	while ($line = $bd->LeeRegistro($res)) {
		$ofertas[] = $line;
	}

	if (!isset($ofertas)) //Con esto evito problemas y errores indeseados al no tener ofertas en la tabla.
	{
		return NULL;
	}

	return $ofertas;
}