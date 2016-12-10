<?php
include(MODEL_PATH."DB_connection.php");

function obtenerProvincias(){
$a=[];
$provincias=[];
$bdatos=Database::getInstance();
$a=$bdatos ->Consulta("SELECT p.cod_provincia, p.nombre from provincia p");

while ($line= mysqli_fetch_array($a,MYSQL_ASSOC))
{
	$provincias[$line['cod_provincia']]=$line['nombre'];
}
return $provincias;
}

function obtenerPsicologos(){
$a=[];
$psico=[];
$bdatos=Database::getInstance();
$a=$bdatos ->Consulta("SELECT u.cod, u.nombre from usuario u WHERE tipo='P'");

while ($line= mysqli_fetch_array($a,MYSQL_ASSOC))
{
	$psico[$line['cod']]=$line['nombre'];
}
return $psico;
}

function nombreProvincias($id)
{
	$bdatos=Database::getInstance();
	$query='SELECT p.nombre FROM provincia p WHERE p.cod_provincia='.$id;
	$res=$bdatos->Consulta($query);
	$registro=$bdatos ->LeeRegistro();
	return $registro['nombre'];
}

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

function nombrePsicologo($id)
{
	$bdatos=Database::getInstance();
	$query='SELECT u.nombre FROM usuario u WHERE u.cod='.$id;
	$res=$bdatos->Consulta($query);
	$registro=$bdatos ->LeeRegistro();
	return $registro['nombre'];
}

function nRegistros()
{
	$MyBD=Database::getInstance();
	$query ="SELECT count(*) as total FROM oferta";
	$result=$MyBD-> Consulta($query);
	$reg=mysqli_fetch_assoc($result);
	return $reg['total'];
}

function nUsuarios()
{
	$MyBD=Database::getInstance();
	$query ="SELECT count(*) as total FROM usuario";
	$result=$MyBD-> Consulta($query);
	$reg=mysqli_fetch_assoc($result);
	return $reg['total'];
}

function nRegistrosBuscar($condicion)
{
	$MyBD=Database::getInstance();
	$query ="SELECT count(*) as total FROM oferta where ".$condicion;
	$result=$MyBD-> Consulta($query);
	$reg=mysqli_fetch_assoc($result);
	return $reg['total'];
}

function insertaOferta($campos)
{
	$bd=Database::getInstance();
	$bd->Insertar("oferta", $campos);
}

function borrarOferta($id)
{
	$bd=Database::getInstance();
	$bd->BorrarRegistro("oferta","idoferta", $id);
}

function modificarOferta($campos,$id){
	
	$bd=Database::getInstance();
	$bd->Update("oferta", $campos, "WHERE idoferta=$id");
}

function verOfertas($posIni)
{
	$bd=database::getInstance();
	$query ="SELECT * FROM oferta LIMIT ".($posIni-1).",".PROXPAG;
	
	$res=array();
	$res=$bd->Consulta($query);
	
	while($line = $bd->LeeRegistro($res))
	{
		$ofertas[]=$line;
	}
	
	if (!isset($ofertas)) //Con esto evito problemas y errores indeseados al no tener ofertas en la tabla.
	{
		return NULL;
	}
	return $ofertas;
}

function verBusqueda($condicion,$posIni)
{
	$bd=database::getInstance();
	$query ="SELECT * FROM oferta where ".$condicion." LIMIT ".($posIni-1).",".PROXPAG;
	
	$res=array();
	$res=$bd->Consulta($query);
	
	while($line = $bd->LeeRegistro($res))
	{
		$ofertas[]=$line;
	}
	
	if (!isset($ofertas)) //Con esto evito problemas y errores indeseados al no tener ofertas en la tabla.
	{
		return NULL;
	}
	return $ofertas;
}
