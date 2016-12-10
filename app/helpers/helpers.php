<?php
/**Verifica un email.
* @param unknown $email Email a verificar.
* @return boolean Devuelve verdadero o falso.
*/

function verificarEmail($email)
{
	$Sintaxis = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	if (preg_match($Sintaxis, $email)) return true;
	else return false;
}

/**Recibe una letra del estado y devuelve una cadena.
* @param unknown $estado Inicial del estado.
* @return string Cadena del estado.
*/

function verEstado($estado)
{
	if ($estado == 'P') {
		return 'Pendiente';
	}
	else
	if ($estado == 'R') {
		return 'Realizando';
	}
	else
	if ($estado == 'S') {
		return 'Seleccionando';
	}
	else
	if ($estado == 'C') {
		return 'Cancelada';
	}
}

/**Recibe una inicial del tipo de usuario y devuelve una cadena.
* @param unknown $tipo Inicial del tipo de usuario.
* @return string Cadena del tipo de usuario.
*/

function tipoUsuario($tipo)
{
	if ($tipo == 'A') {
		return 'Administrador';
	}
	else {
		return 'PsicÃ³logo';
	}
}

/**Convierte una cadena a formato yyyy-mm-dd
* @param unknown $fecha_old Fecha a convertir
* @return string $fecha_new Fecha convertida
*/

function formatoFecha($fecha_old)
{
	$a = explode('/', $fecha_old);
	$fecha_new = $a[2] . '-' . $a[1] . '-' . $a[0];
	return $fecha_new;
}

/**Convierte una cadena a formato dd/mm/yyyy
* @param unknown $fecha_old Fecha a convertir
* @return string $fecha_new Fecha convertida
*/

function formatoGregoriano($fecha_old)
{
	$a = explode('-', $fecha_old);
	$fecha_new = $a[2] . '/' . $a[1] . '/' . $a[0];
	return $fecha_new;
}

/**Recibe los campos de una oferta y crea un array con ellos.
* @param unknown $desc Descripción
* @param unknown $per_cont Persona de contacto.
* @param unknown $tlf_cont Teléfono.
* @param unknown $email_cont Email.
* @param unknown $dir Dirección.
* @param unknown $pb Población.
* @param unknown $cp CP
* @param unknown $provincia Provincias.
* @param unknown $estado Estado.
* @param unknown $fcom Fecha de comunicación.
* @param unknown $psico Psicólogo encargado.
* @param unknown $cand Candidato selecionado.
* @param unknown $anotaciones Anotaciones del candidato.
* @return unknown[] Devuelve el array.
*/

function crearOferta($desc, $per_cont, $tlf_cont, $email_cont, $dir, $pb, $cp, $provincia, $estado, $fcom, $psico, $cand, $anotaciones)
{
	$array = array(
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
		'des_candidato' => $anotaciones
	);
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

function post($nombreCampo, $valorPorDefecto = '')
{
	if (isset($_POST[$nombreCampo])) return $_POST[$nombreCampo];
	else return $valorPorDefecto;
}

/**
 * Recibe el nombre de un campo en un get, si ese get tiene algun dato lo devuelve ,
 * si no, devuelve el valor por defecto establecido
 *
 * @param unknown $nombreCampo
 * @param string $valorPorDefecto
 * @return unknown|string
 */

function get($nombreCampo, $valorPorDefecto = '')
{
	if (isset($_GET[$nombreCampo])) return $_GET[$nombreCampo];
	else return $valorPorDefecto;
}

/**
 * Recibe el nombre de un campo de una sesion, si esa sesión tiene algun dato lo devuelve ,
 * si no, devuelve el valor por defecto establecido
 *
 * @param unknown $nombreCampo
 * @param string $valorPorDefecto
 * @return unknown|string
 */

function sesion($nombreCampo, $valorPorDefecto = '')
{
	if (isset($_SESSION[$nombreCampo])) return $_SESSION[$nombreCampo];
	else return $valorPorDefecto;
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

function creaSelect($name, $opciones, $valorDefecto = '')
{
	$html = "\n" . '<select class="form-control" name="' . $name . '">';
	foreach($opciones as $value => $text) {
		if ($value == $valorDefecto) $select = 'selected="selected"';
		else $select = "";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}

	$html.= "\n</select>";
	return $html;
}

/**
 * Crea un grupo de radiobutton
 * @param string $name Name del radiobutton
 * @param array $opciones Opciones del radiobutton
 * @param string $valorDefecto Valor por defecto del radiobutton
 * @return string
 */

function creaRadio($name, $opciones, $valorDefecto = '')
{
	foreach($opciones as $value => $text) {
		$html = "";
		foreach($opciones as $value => $text) {
			if ($value == $valorDefecto) $checked = 'checked="checked"';
			else $checked = "";
			$html.= "\n<input type=\"radio\" name=\"$name\" value=\"$value\" $checked> $text<br />";
		}
	}

	return $html;
}

/**
 * Muestra el error del campo.
 * @param string $campo Nombre campo
 */

function VerError($campo)
{
	global $errores;
	if (isset($errores[$campo])) {
		echo '<span style="color:red">' . $errores[$campo] . '</span>';
	}
}

/**Comprueba que el campo requerido no esté vacio.
* @param unknown $nombreCampo Nombre del campo.
* @param unknown $errores Errores encontrados.
*/

function campoRequerido($nombreCampo, $errores)
{
	if ($nombreCampo === '') {
		$errores[$nombreCampo] = "El campo $nombreCampo esta vacio o no es correcto.";
	}
}

//

/**Valida fecha con los siguientes formatos d/m/yyyy, dd/mm/yyyy, d/mm/yyyy, dd/m/yyyy
* @param unknown $fecha Fecha introducida.
* @return boolean
*/

function verificarFecha($fecha)
{
	$patron = '/^(([1-9]{1})|([0]{1}[1-9]{1})|([1-3]{1}[0-1]{1})|([1-2]{1}[0-9]{1}))([-]|[\/])(([1-9]{1})|([0-0]{1}[1-9]{1})|([1-1]{1}[0-2]{1}))([-]|[\/])([0-9]{4})$/';
	if (preg_match($patron, $fecha) === 1):
		return TRUE;
	else:
		return FALSE;
	endif;
}

/**Calcula los días transcurridos entre dos fechas.
* @param unknown $fecha_i Fecha inicial.
* @param unknown $fecha_f Fecha final.
* @return unknown Días transcurridos.
*/

function diasTranscurridos($fecha_i, $fecha_f)
{
	$dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
	$dias = abs($dias);
	$dias = floor($dias);
	return $dias;
}
