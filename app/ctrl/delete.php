<?php
	//Llamada al modelo
	include_once(MODEL_PATH."model.php");
	//Llamada a utilidades
	include_once(HELPERS_PATH."helpers.php");
	$idoferta=$_GET["id"];
	
	//Si es la primera vez que entra carga el formulario si es la segunda vez y la barriable borrado es si borra el registro.
	if (!isset($_GET["borrado"])) 
	{
	include_once(VIEW_PATH."delete.php");
	}
	else
	{
		$borrado = $_GET["borrado"];
		if ($borrado=='si')
		{
			borrarOferta($idoferta);
			//Llamada al controlador de la lista
			include_once(CTRL_PATH."list.php");			
		}
	}
	

