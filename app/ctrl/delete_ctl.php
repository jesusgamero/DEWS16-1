<?php
	//Llamada al modelo
	include_once(__DIR__."/../model/logica.php");
	//Llamada a utilidades
	include_once(__DIR__."/../helpers/utilidades.php");
	$idoferta=$_GET["id"];
	
	//Si es la primera vez que entra carga el formulario si es la segunda vez y la barriable borrado es si borra el registro.
	if (!isset($_GET["borrado"])) 
	{
	include_once(__DIR__."/../view/delete_view.php");
	}
	else
	{
		$borrado = $_GET["borrado"];
		if ($borrado=='si')
		{
			borrarOferta($idoferta);
			//Llamada al controlador de la lista
			include_once(__DIR__."/../ctrl/list_ctl.php");			
		}
	}
	

