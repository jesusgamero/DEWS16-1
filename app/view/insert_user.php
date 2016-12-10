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
	<div class="panel panel-default">
	<div class="panel-body">
	<br>
<form class="form-horizontal" method="POST">
<div class="panel panel-default">
  <div class="panel-heading"><b>Insertar Usuario</b></div>
  <div class="panel-body">


<div class="form-group">

  <label class="col-md-2 control-label" for="tipo">Tipo:</label>
  <div class="col-md-2">
    <?= creaSelect('tipo',$tipo)?>
  </div>
  
  <label class="col-md-2 control-label" for="nombre">Nombre:</label>  
  <div class="col-md-2">
  <input id="nombre" name="nombre" value="<?=  post('nombre') ?>" maxlength="35" type="text" placeholder="Nombre del usuario" class="form-control input-md">
  </div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="user">Usuario:</label>  
  <div class="col-md-2">
  <input id="user" name="user" value="<?=  post('user') ?>" type="text" maxlength="10" placeholder="Alias del usuario" class="form-control input-md">
  </div>
  <label class="col-md-2 control-label" for="pass">Clave:</label>  
  <div class="col-md-2">
  <input id="pass" name="pass" value="<?=  post('pass') ?>" type="password" maxlength="10" placeholder="Contraseña de acceso" class="form-control input-md">
  </div>
</div>

</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Confirmación de insercción:</h3>
  </div>
  <div class="panel-body">
    <b>¿Estás seguro que insertar esta usuario? &nbsp;&nbsp;</b>
	<button class="btn btn-success btn-md" name="binsertar" type="submit"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</button>&nbsp;&nbsp;
	<a href="?ctrl=list_user" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
	</form>
  </div>
</div>
</div>
</div>
</div>
</div>