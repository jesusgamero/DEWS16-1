<?php include "../app/helpers/helpers.php"; ?>
<html>
<head>
        <title>Instalador JobYesterday</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../app/template/css/instalador.css">
		<link rel="shortcut icon" href="template/img/favicon.png" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body> 
<?php

if (!$_POST) {
	verFormulario($error = false);
}
else {
	$error = hayError();
	if ($error) verFormulario($error);
	else creaBD();
} 

?>
</body>
</html>

<?php
/**
 * Vista del formulario
 * @param boolean $error Indica si ha habido un error al enviar el formulario
 */
function verFormulario($error) { ?>	
	<div class="contenido">
	<div class="separacion">

        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="../app/template/img/bd.png" />
			<center><h3>Instalador de la base de datos</h3></center>
            <p id="profile-name" class="profile-name-card"></p>

			 <?php
				if ($error) { ?>
					<div class="row">
						<div class="alert alert-danger text-md-center">
							<ul><li>Los datos introducidos son incorrectos.</li></ul> 
						</div>
					</div> <?php
				} ?>
				
            <form class="form-signin" method="post">
              <div class="form-group row">
						<label for="servidor" class="col-form-label"><strong>Servidor donde se va a instalar:</strong></label>
							<input type="text" class="form-control" placeholder="Servidor donde quieres instalar la base de datos" name="servidor" value="<?=post("servidor")?>"></input>
					</div>
					<div class="form-group row">
						<label for="usuario" class="col-form-label"><strong>Usuario de acceso:</strong></label>
							<input class="form-control" type="text" name="usuario" placeholder="Nombre de usuario" value="<?=post("usuario")?>">
					</div>
					<div class="form-group row">
						<label for="password" class="col-form-label"><strong>Contraseña de acceso:</strong></label>
							<input class="form-control" type="password" name="password" placeholder="Clave de acceso">
					</div>
					<div class="form-group row">
						<label for="base_datos" class="col-form-label"><strong>Nombre que quieres para la base de datos:</strong></label>
							<input class="form-control" type="text" name="base_datos" value="<?=post("base_datos")?>" placeholder="Nombre de la base de datos">
					</div>
					<div><center>
						<input type="submit" value="Iniciar instalación" class="btn btn-primary">
					</div>
            </form>
        </div>
		</div>
</div>

<?php
}
/**
 * Función que nos indica si hay errores al mandar el formulario.
 * @return boolean
 */
function hayError()
{
	include "../app/config.php";

	if ($_POST["servidor"] != $db_conf["servidor"] || $_POST["usuario"] != $db_conf["usuario"] || $_POST["password"] != $db_conf["password"] || empty(trim($_POST["base_datos"]))) {
		return true;
	}
	else {
		return false;
	}
}
/**
 * Generamos la base de datos y modificamos el archivo config.php
 */
function creaBD() {
	$file = fopen("../app/config.php", "w+");
	fwrite($file, 
'<?php
$db_conf = array(
	"servidor" => "localhost",
	"usuario" => "root",
	"password" => "",
	"base_datos" => "' . $_POST["base_datos"] . '");');
	fclose($file);
	$creabd = "CREATE DATABASE IF NOT EXISTS `". $_POST["base_datos"] . "`;
	USE `". $_POST["base_datos"] . "`;";
	$sql = $creabd . file_get_contents("jobyesterday.sql");
 	$db = new mysqli($_POST["servidor"], $_POST["usuario"], $_POST["password"]);
 	$db->multi_query($sql); ?>
	
	<div class="contenido">
	<div class="separacion">

        <div class="card card-container">
		<img id="profile-img" class="profile-img-card" src="../app/template/img/exito.png" />
 		<center><h3>Base de datos creada correctamente</h3>
		<br>
 		<a href="../app" class="btn btn-primary">Abrir JobYesterday</a></center>
 	</div>
	</div>
	</div>
<?php } ?>