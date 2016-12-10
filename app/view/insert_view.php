<br>
		<!-- Muestra los errores -->
		<?php if ($hayError) :?>
			<div class="alert alert-danger"><ul>
			<?php 
			echo "<b>Errores en los campos:</B>";
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
  <div class="panel-heading"><b>Insertar Oferta</b></div>
  <div class="panel-body">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="desc">Descripción: *</label>  
    <div class="col-md-10">                     
    <textarea class="form-control" id="desc" name="desc" placeholder="Texto descriptivo identificativo de la oferta."><?php if (isset($_POST["desc"])){echo $_POST["desc"];}?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="per_cont">Persona de contacto: *</label>  
  <div class="col-md-2">
  <input id="per_cont" name="per_cont" value="<?= post('per_cont') ?>" type="text" placeholder="Persona de la empresa" class="form-control input-md">
  </div>
  <label class="col-md-2 control-label" for="tlf_cont">Teléfono contacto: *</label>  
  <div class="col-md-2">
  <input id="tlf_cont" name="tlf_cont" value="<?=  post('tlf_cont') ?>" type="text" placeholder="Nº de teléfono de la empresa" class="form-control input-md" value="">  
  </div>
  <label class="col-md-2 control-label" for="email_cont">Email contacto: *</label>  
  <div class="col-md-2">
  <input id="email_cont" name="email_cont" value="<?=  post('email_cont') ?>" type="text" placeholder="Correo electrónico de la empresa" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="dir">Dirección:</label>  
  <div class="col-md-2">
  <input id="dir" name="dir" value="<?=  post('dir') ?>" type="text" placeholder="Dirección de la empresa" class="form-control input-md">
  </div>
  <label class="col-md-2 control-label" for="pb">Población</label>  
  <div class="col-md-2">
  <input id="pb" name="pb" value="<?=  post('pb') ?>" type="text" placeholder="Población" class="form-control input-md">
  </div>
  <label class="col-md-2 control-label" for="cp">Código postal:</label>  
  <div class="col-md-1">
  <input id="cp" name="cp" value="<?=  post('cp') ?>" type="text" placeholder="C.Postal" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="cp">Provincia:</label>  
  <div class="col-md-2">
  <?= creaSelect('provincia',obtenerProvincias())?>
  </div>
  <label class="col-md-2 control-label" for="estado">Estado:</label>
  <div class="col-md-2">
    <select id="estado" name="estado" class="form-control">
      <option value="P">Pendiente de inciar selección</option>
      <option value="R">Realizando selección</option>
      <option value="S">Seleccionado candidato</option>
      <option value="C">Cancelada</option>
    </select>
  </div>
  <label class="col-md-2 control-label" for="fcom">Fecha comunicación: </label>  
  <div class="col-md-1">
  <input id="fcom" name="fcom" value="<?=  post('fcom') ?>" type="text" placeholder="dd/mm/yyyy" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="psico">Psicologo encargado: </label>  
  <div class="col-md-2">
	<?= creaSelect('psico',obtenerPsicologos())?>
  </div>
  <label class="col-md-2 control-label" for="cand">Canditato seleccionado: </label>  
  <div class="col-md-2">
  <input id="cand" name="cand" value="<?=  post('cand') ?>" type="text" placeholder="Nombre del candidato" class="form-control input-md">  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="anotaciones">Otros datos candidato:</label>
  <div class="col-md-10">                     
    <textarea class="form-control" id="anotaciones" name="anotaciones" placeholder="Anotaciones realizadas sobre el candidato seleccionado."><?php if (isset($_POST["anotaciones"])){echo $_POST["anotaciones"];}?></textarea>
  </div>
</div>
</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Confirmación de insercción:</h3>
  </div>
  <div class="panel-body">
    <b>¿Estás seguro que insertar esta oferta? &nbsp;&nbsp;</b>
	<button class="btn btn-success btn-md" name="binsertar" type="submit"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</button>&nbsp;&nbsp;
	<a href="?ctrl=list_ctl" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
	</form>
  </div>
</div>
</div>
</div>