<?php
	//Llamada al modelo
	include_once(MODEL_PATH."model.php");
	//Llamada a utilidades
	include_once(HELPERS_PATH."helpers.php");
	
	//Obtenego el id y guardo en el array datosoferta todos los datos de esa oferta con ese id.
	$idoferta=$_GET["id"];
	$datosoferta=obtenerOferta($idoferta);
	
	//Llamada a la vista
	include_once(VIEW_PATH."info.php");

	

