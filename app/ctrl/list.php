<?php
	$ofertas = array();
	$hayError=false;
	//Llamada al modelo
	include_once(MODEL_PATH."model.php");
	//Llamada a utilidades
	include_once(HELPERS_PATH."helpers.php");
	
	define ('PROXPAG',4);
		
	if (isset($_GET['pag']))
		$pag=$_GET['pag'];
	else
		$pag=1;
		
	$maxPag=((int) (NRegistros())/PROXPAG)+1;
	if ($pag<1 || $pag>$maxPag)
		$pag=1;
		
	$posIni=(($pag-1)*PROXPAG)+1;
	$listado= array();
	if (!$_POST)
	{
		$listado=verOfertas($posIni);
		$nreg=NRegistros();
		//Llamada a la vista
		include_once(VIEW_PATH."list.php");
	}
	else
	{ 
	$cp = "/[0-9]{5}/";
	$hoy = date("d/m/Y");
	$condiciones= array();
	
	//FILTRADO DE LOS CAMPOS DE BÚSQUEDA
	
		// Formato código postal inválido.
		if (post('cond3b') && !preg_match($cp,post('cond3b')))
			{
				$errores['cond3b']='Código postal erroneo: El CP tiene que tener cinco dígitos';
				$hayError=TRUE;
			}
			
		// Formato de la fecha de creación incorrecta.
		if (post('cond2b') && ! verificarFecha(post('cond2b')))
			{
				$errores['cond2b']='El formato de la fecha de creación es incorrecto';
				$hayError=TRUE;
			}
		
		// La fecha de creación tiene que ser posterior a la de hoy.		
		if (post('cond2b') && verificarFecha(post('cond2b')) && formatoFecha(post('cond2b')) > formatoFecha($hoy))
			{
				$errores['cond2b']='La fecha de creación tiene que ser anterior al día de hoy';
				$hayError=TRUE;
			}
	
		if (post('cond1b')!='')
		{
			if (post('cond1a')=='LIKE')
			{
			$cond1="descripcion ".$_POST['cond1a']." '%".$_POST['cond1b']."%'";
			}
			else
			{
			$cond1="descripcion".$_POST['cond1a']."'".$_POST['cond1b']."'";
			}
			$condiciones[]=$cond1;
		}
		
		if (post('cond2b')!='')
		{
			if (post('cond2a')=='LIKE')
			{
			$cond2="fcreacion ".$_POST['cond2a']." '%".$_POST['cond2b']."%'";
			}
			else
			{
			$cond2="fcreacion".$_POST['cond2a']."'".$_POST['cond2b']."'";
			}
			$condiciones[]=$cond2;
		}
		
		if (post('cond3b')!='')
		{
			if (post('cond3a')=='LIKE')
			{
			$cond3="cp ".$_POST['cond3a']." '%".$_POST['cond3b']."%'";
			}
			else
			{
			$cond3="cp".$_POST['cond3a']."'".$_POST['cond3b']."'";
			}
			$condiciones[]=$cond3;
		}
		
		if (post('cond1b')=='' && post('cond2b')=='' && post('cond3b')=='')
		{	
		$nreg=NRegistros();
		$listado=verOfertas($posIni);	
		}
		else
		{
		$condicion = implode(" and ", $condiciones);
		$nreg=nRegistrosBuscar($condicion);
		$listado=verBusqueda($condicion,$posIni);	
		}

		//Llamada a la vista
		include_once(VIEW_PATH."list.php");

	}
