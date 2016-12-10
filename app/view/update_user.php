<br>
		<!-- Muestra los errores -->
		<?php if ($hayError) :?>
			<div class="alert alert-danger"><ul>
			<?php 
			echo "<b>Error en el campo:</B>";
			foreach($errores as $textoError) 
			{
				echo "<li>".$textoError."</li>";
			}
			?>
			</ul></div>
		<?php endif;?>
		
<div class="container-fluid">
<form class="form-horizontal" method="POST">
<div class="panel panel-default">
  <div class="panel-heading"><b>Modificar usuario: </b><?php echo $datosusuario['nombre']."<b> (".$datosusuario['user'].")</b>"; ?></div>
	<div class="panel-body">

	<div class="form-group">

	  <label class="col-md-2 control-label" for="tipo">Tipo:</label>	

	<div class="col-md-2">
		<?= creaSelect('tipo',$tipo,$datosusuario['tipo'])?>
	</div>
	  
	  <label class="col-md-2 control-label" for="nombre">Nombre:</label>  
	  <div class="col-md-2">
	  <input id="nombre" name="nombre" maxlength="35" value="<?php echo $datosusuario['nombre']; ?>" type="text" placeholder="Nombre del usuario" class="form-control input-md">
	  </div>

	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="user">Usuario:</label>  
	  <div class="col-md-2">
	  <input id="user" name="user" maxlength="10" value="<?php echo $datosusuario['user']; ?>" type="text" placeholder="Alias del usuario" class="form-control input-md">
	  </div>
	  <label class="col-md-2 control-label" for="pass">Clave:</label>  
	  <div class="col-md-2">
	  <input id="pass" name="pass" maxlength="10" value="<?php echo $datosusuario['pass']; ?>" type="password" placeholder="Contraseña de acceso" class="form-control input-md">
	  </div>
	</div>
	
	</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Confirmación de modificación:</h3>
  </div>
  <div class="panel-body">
    <b>¿Estás seguro que modificar esta oferta? &nbsp;&nbsp;</b>
	<button class="btn btn-success btn-md" name="bactualizar" type="submit"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</button>&nbsp;&nbsp;
	<a href="?ctrl=list_user" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
	</form>
  </div>
</div>
</div>
</div>