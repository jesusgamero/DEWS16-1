<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de Ofertas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body style="background-color:#FCFCFC;">
		<br>
		<!-- Borrado correcto-->
		<?php if (get('borrado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta borrada correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Modificado correcto-->
		<?php if (get('modificado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta modificada correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Insertado correcto-->
		<?php if (get('insertado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta insertada correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Errores en la búsqueda -->
		<?php if ($hayError) :?>
			<div class="alert alert-danger"><ul>
			<?php 
			echo "<b>Errores en el filtrado:</B>";
			foreach($errores as $textoError) 
			{
				echo "<li>".$textoError."</li>";
			}
			?>
			</ul></div>
		<?php endif;?>
		
	<div class="container-fluid">
	<form class="form-horizontal" method="POST">

	<div class="panel panel-default container-fluid">
	<div class="panel-body">
		<div class="row">
		
		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="estado">Descripción:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
			<select id="cond1a" name="cond1a" class="form-control">
			  <option value="=">Igual a</option>
			  <option value="LIKE">Contenga</option>
			  <option value=">">Mayor</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-3">
			<input id="cond1b" value="<?= post('cond1b') ?>" name="cond1b" class="form-control input-md" placeholder="Descripción de la oferta">
		</div>

		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="estado">Creación:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
			<select id="cond2a" name="cond2a" class="form-control">
			  <option value="=">Igual a</option>
			  <option value="LIKE">Contenga</option>
			  <option value=">">Mayor</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-1">
			<input id="cond2b" value="<?= post('cond2b') ?>"name="cond2b" class="form-control input-md" placeholder="Fecha">
		</div>

		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="estado">CP:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
			<select id="cond3a" name="cond3a" class="form-control">
			  <option value="=">Igual a</option>
			  <option value="LIKE">Contenga</option>
			  <option value=">">Mayor</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-1">
			<input id="cond3b" value="<?= post('cond3b') ?>" name="cond3b" class="form-control input-md" placeholder="C. Postal">
		</div>
		<div class="center-block">
		<button class="btn btn-primary btn-md col-xs-12 col-sm-12 col-md-1" name="bfiltrar" type="submit">
		<span class="glyphicon glyphicon-filter"></span>&nbsp;Filtrar ofertas</button>
		</div>
		</div>
	</div>
	</div>
	</form>
	<div class="panel panel-default container-fluid">
	<div class="panel-body">
	<h3>Estamos a <?= date("d/m/Y"); ?>:<?php echo " Hay ". $nreg." ofertas disponibles"; ?></h3>
	 
	 	<?php if ($listado==null)
		{
		?>
		<center><h3>Oops! No hay ninguna oferta disponible, inserte una nueva.</h3></center><br>
		<?php
		} 
		else 
		{ 
		foreach ($listado as $clave => $oferta) 
		{ ?>
					<div class="panel panel-default">
					<div class="panel-heading"><b>Oferta <?= $oferta['idoferta']; ?> </b></div>	
					<div class="panel-body">	 	
					<div class="form-horizontal">
						
						<div class="form-group">
						  <div class="col-md-10"><b>Descripción: </b><?= $oferta['descripcion']; ?></div>  
						</div>	
						
						<div class="form-group">
						  <div class="col-md-4"><b>Persona de contacto: </b><?= $oferta['persona_contacto']; ?></div>
						  <div class="col-md-2"><b>Teléfono contacto: </B><?= $oferta['tlf_contacto']; ?></div>  
						  <div class="col-md-4"><b>Email contacto: </B><?= $oferta['email_contacto']; ?></div>  
						</div>

						<div class="form-group">
						  <div class="col-md-4"><b>Provincia: </b><?= nombreProvincias($oferta['provincia']) ?></div>  
						  <div class="col-md-2"><b>Estado: </b><?= $oferta['estado']; ?></div>
						  <div class="col-md-4"><b>Psicologo encargado: </b><?= nombrePsicologo($oferta['psico_encar']) ?></div>  
						</div>

						<div class="form-group">
						  <div class="col-md-4"><b>Fecha creación: </b><?= formatoGregoriano($oferta['fcreacion']) ?></div> 
						  <div class="col-md-2"><b>Fecha comunicación: </b><?= formatoGregoriano($oferta['fcomunicacion']) ?></div>  
						  <div class="col-md-4"><b>Canditato seleccionado: </b><?= $oferta['candidato']; ?></div>  
						</div>
						
					</div>	
					</div>
					
					<div class="panel-footer">
					<a href="..\ctrl\info_ctl.php?id=<?= $oferta['idoferta']; ?>"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;<b>&nbsp;Ver</b></a>&nbsp;&nbsp;&nbsp;
					<a href="..\ctrl\update_ctl.php?id=<?= $oferta['idoferta']; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<b>&nbsp;Editar</b></a>&nbsp;&nbsp;&nbsp;
					<a href="..\ctrl\delete_ctl.php?id=<?= $oferta['idoferta']; ?>" style="color: #CB4335"><span style="color: #FFFFF" class="glyphicon glyphicon-remove"></span>&nbsp;<b>&nbsp;Borrar</b></a>
					</div>
					</div><br>
	
	<?php }}?>	
	</div>
	</div>
	</body>
</html>