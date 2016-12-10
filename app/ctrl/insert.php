<?php
//Llamada al modelo
include(MODEL_PATH."model.php");

//Llamada a utilidades
include_once(HELPERS_PATH."helpers.php");

//Definimos la fehc actual
$hoy = date("d/m/Y");

//Creamos array de provincias y lo rellenamos.
$provincias=array();
$provincias=obtenerProvincias();

//Obtenego el id y guardo en el array datosoferta todos los datos de esa oferta con ese id.
$hayError=false;

if (! $_POST) //Si es la primera vez que entra.
		{
			//Llamada a la vista
			include_once(VIEW_PATH."insert.php");
		}
else //Si he realizado el envio.
	{
		$tlfn = "/[0-9]{9}/";
		$cp = "/[0-9]{5}/";
		
		// Descripción de la oferta vacia.
		if (!post('desc'))
			{ 
				$errores['desc']='Debes introducir una descripción de la oferta';
				$hayError=TRUE;
			}
		
		// Persona de contacto vacia.
		if (!post('per_cont'))
			{
				$errores['per_cont']='Debes introducir una persona de contacto';
				$hayError=TRUE;
			}
			
		// Telefono vacio o caracteres invalidos
		if (!post('tlf_cont'))
			{
				$errores['tlf_cont']='El telefono no debe estar vacio';
				$hayError=TRUE;
			}
			
		// Formato de teléfono erróno.
		if (! preg_match($tlfn,post('tlf_cont')))
			{
				$errores['tlf_cont']='Teléfono erróneo: El telefono tiene que tener 9 dígitos';
				$hayError=TRUE;
			}
			
			
		// Formato código postal inválido.
		if (post('cp') && !preg_match($cp,post('cp')))
			{
				$errores['cond3b']='Código postal erroneo: El CP tiene que tener cinco dígitos';
				$hayError=TRUE;
			}
			
		// Email de la persona de contacto vacio.
		if (!post('email_cont'))
			{
				$errores['email_cont']='Email vacio: Debes introducir un correo electronico';
				$hayError=TRUE;
			}
			
		// Formato del email incorrecto.
		if (! verificarEmail(post('email_cont')))
			{
				$errores['email_cont']='El formato del correo electronico es incorrecto';
				$hayError=TRUE;
			}
			
		// Formato de la fecha de comunicación incorrecta.
		if (post('fcom') && ! verificarFecha(post('fcom')))
			{
				$errores['fcom']='El formato de la fecha de comunicación es incorrecto';
				$hayError=TRUE;
			}
		
		// La fecha de comunicación tiene que ser anterior a la de hoy.		
		if (post('fcom') && verificarFecha(post('fcom')) && formatoFecha(post('fcom')) < formatoFecha($hoy))
			{
				$errores['fcom']='La fecha de comunicación tiene que ser anterior al día de hoy';
				$hayError=TRUE;
			}
			
		if ($hayError)
			{ 
			//Llamada a la vista
			include_once(VIEW_PATH."insert.php");
			}
			else
			{
				$oferta=array();
				$oferta=crearOferta($_POST['desc'], $_POST['per_cont'], $_POST['tlf_cont'],
						 $_POST['email_cont'], $_POST['dir'], $_POST['pb'],
						 $_POST['cp'],$_POST['provincia'],$_POST['estado'],formatoFecha($_POST['fcom']), $_POST['psico'], $_POST['cand'],$_POST['anotaciones']);
		
				insertaOferta($oferta);
				header('Location:?ctrl=list&insertado=si');
			}
	}
?>