<?php
/* 
 * CONTROLADOR FRONTAL - Aproximación 1ª
 * 
 * Todas las peticiones pasaran por esta página
 * 
 * En este enfoque en el controlador frontal mezclamos vista y código
 * de control.
 * 
 * Además tenemos el problema de que se ha enviado código al cliente antes
 * de completar la acción, por lo que no podemos redirigir a otras páginas
 * enviando un encabezado.
 * 
 */

// definimos constantes que facilitan el trabajo
define('CTRL_PATH', __DIR__.'/ctrl/');
define('MODEL_PATH', __DIR__.'/model/');
define('VIEW_PATH', __DIR__.'/view/');
define('TEMPLATE_PATH', __DIR__.'/template/');
define('HELPERS_PATH', __DIR__.'/helpers/');

?>
<html>
    <head>
        <title>Jobs Yesterday</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="template/css/styles.css">
		<link rel="shortcut icon" href="template/img/favicon.png" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>    
<body>
<?php 
session_start();

if (isset($_SESSION["tipo"]) )
{
	if ($_SESSION['tipo']=='A' || $_SESSION['tipo']=='P')
	{
		include(TEMPLATE_PATH.'encabezado.php');
	}
}

// Cuerpo del controlador frontal
$ctrl=isset($_GET['ctrl']) ? $_GET['ctrl'] : 'login';

// Nombre del fichero a incluir
$file=CTRL_PATH.$ctrl.'.php';
if (file_exists($file))
{
    include($file);
}
else
{   // Error 404
    include(CTRL_PATH.'error404.php');
}

if (isset($_SESSION["tipo"]) )
{
	if ($_SESSION['tipo']=='A' || $_SESSION['tipo']=='P')
	{
		include(TEMPLATE_PATH.'pie.php');
	}
}
?>
</body>
</html>
