<?php
include(MODEL_PATH."DB_connection.php");

function datosUsuario($campo, $busqueda) {
	$datos = array();
	$conex = Database::getInstance();
	$conex->Consulta("SELECT * FROM usuario WHERE $campo = '$busqueda'");
	while ($rs = $conex->LeeRegistro()) {
		$datos = $rs;
	}
	return $datos;
}

function existeUsuario($usuario) {
	$bdatos=Database::getInstance();
	$query="SELECT COUNT(*) AS total FROM usuario WHERE user = '$usuario'";
	$res=$bdatos->Consulta($query);
	$registro=$bdatos ->LeeRegistro();
	
	if ($registro["total"] > 0) {
		return true;
	} else {
 		return false;
	}
}

function nUsuarios()
{
	$MyBD=Database::getInstance();
	$query ="SELECT count(*) as total FROM usuario";
	$result=$MyBD-> Consulta($query);
	$reg=mysqli_fetch_assoc($result);
	return $reg['total'];
}

function insertaUsuario($campos)
{
	$bd=Database::getInstance();
	$bd->Insertar("usuario", $campos);
}

function borrarUsuario($id)
{
	$bd=Database::getInstance();
	$bd->BorrarRegistro("usuario","cod", $id);
}

function modificarUsuario($campos,$id){
	
	$bd=Database::getInstance();
	$bd->Update("usuario", $campos, "WHERE cod=$id");
}

function verUsuarios($posIni)
{
	$bd=database::getInstance();
	$query ="SELECT * FROM usuario LIMIT ".($posIni-1).",".PROXPAG;
	
	$res=array();
	$res=$bd->Consulta($query);
	
	while($line = $bd->LeeRegistro($res))
	{
		$usuarios[]=$line;
	}
	
	if (!isset($usuarios)) //Con esto evito problemas y errores indeseados al no tener usuarios en la tabla.
	{
		return NULL;
	}
	return $usuarios;
}