<?php

function verificarEmail($email)
{
   $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   if(preg_match($Sintaxis,$email))
      return true;
   else
     return false;
}

function formatoFecha($fecha_old){
	$a = explode('/',$fecha_old);
	$fecha_new = $a[2].'-'.$a[1].'-'.$a[0];
	return $fecha_new;
}

function formatoGregoriano($fecha_old){
	$a = explode('-',$fecha_old);
	$fecha_new = $a[2].'/'.$a[1].'/'.$a[0];
	return $fecha_new;
}

function crearOferta($desc,$per_cont,$tlf_cont,$email_cont,$dir,$pb,$cp,$provincia,$estado,$fcom,$psico,$cand,$anotaciones)
{
	$array =array(
			'descripcion' => $desc,
			'persona_contacto' => $per_cont,
			'tlf_contacto' => $tlf_cont,
			'email_contacto' => $email_cont,
			'dir_empresa' => $dir,
			'poblacion' => $pb,
			'cp' => $cp,
			'provincia' => $provincia,
			'estado' => $estado,
			'fcomunicacion' => $fcom,
			'psico_encar' => $psico,
			'candidato' => $cand,
			'des_candidato' => $anotaciones);	
	
	return $array;
}

/**
 * Recibe el nombre de un campo en un post, si ese post tiene algun dato lo devuelve ,
 * si no, devuelve el valor por defecto establecido
 * 
 * @param unknown $nombreCampo
 * @param string $valorPorDefecto
 * @return unknown|string
 */
function post($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
	else
		return $valorPorDefecto;
}

/**
 * Recibe el nombre de un campo en un get, si ese get tiene algun dato lo devuelve ,
 * si no, devuelve el valor por defecto establecido
 * 
 * @param unknown $nombreCampo
 * @param string $valorPorDefecto
 * @return unknown|string
 */
function get($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_GET [$nombreCampo] ))
		return $_GET [$nombreCampo];
	else
		return $valorPorDefecto;
}

/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function creaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select class="form-control" name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}

/**
 * Muestra el error del campo.
 * @param string $campo Nombre campo
 */
function VerError($campo)
{
	global $errores;
	if (isset($errores[$campo]))
	{
		echo '<span style="color:red">'.$errores[$campo].'</span>';
	}
}

function campoRequerido($nombreCampo, $errores)
{
	if ($nombreCampo==='')
	{
		$errores[$nombreCampo]="El campo $nombreCampo esta vacio o no es correcto.";
	}
}

//Valida fecha con los siguientes formatos d/m/yyyy, dd/mm/yyyy, d/mm/yyyy, dd/m/yyyy
function verificarFecha($fecha){
	$patron = '/^(([1-9]{1})|([0]{1}[1-9]{1})|([1-3]{1}[0-1]{1})|([1-2]{1}[0-9]{1}))([-]|[\/])(([1-9]{1})|([0-0]{1}[1-9]{1})|([1-1]{1}[0-2]{1}))([-]|[\/])([0-9]{4})$/';

	if(preg_match($patron, $fecha) === 1):
		return TRUE;
	else:
		return FALSE;
	endif;
}
