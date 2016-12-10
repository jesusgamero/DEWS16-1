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
	<div class="panel panel-default">
	<div class="panel-body">
	<br>
<form class="form-horizontal" method="POST">
<div class="panel panel-default">
	<div class="panel-heading"><b>Modificar oferta Nº <?php echo $idoferta; ?></b></div>
	<div class="panel-body">

	<div class="form-horizontal">
		<div class="form-group">
		  <div class="col-md-10"><b>Descripción: </b><?php echo $datosoferta['descripcion']; ?></div>  
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <div class="col-md-4"><b>Persona de contacto: </b><?php echo $datosoferta['persona_contacto']; ?></div>
		  <div class="col-md-3"><b>Teléfono contacto: </B><?php echo $datosoferta['tlf_contacto']; ?></div>  
		  <div class="col-md-4"><b>Email contacto: </B><?php echo $datosoferta['email_contacto']; ?></div>  
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <div class="col-md-4"><b>Dirección: </b><?php echo $datosoferta['dir_empresa']; ?></div>  
		  <div class="col-md-3"><b>Población: </b><?php echo $datosoferta['poblacion']; ?></div>  
		  <div class="col-md-2"><b>Código postal: </b><?php echo $datosoferta['cp']; ?></div>  
		</div>

		<div class="form-group">
		  <div class="col-md-4"><b>Provincia: </b><?php echo nombreProvincias($datosoferta['provincia']); ?></div>  
		  <div class="col-md-4"><b>Psicologo encargado: </b><?php echo nombrePsicologo($datosoferta['psico_encar']); ?></div>  
		</div>

		<div class="form-group">
		  <div class="col-md-4"><b>Fecha creación: </b><?php echo formatoGregoriano($datosoferta['fcreacion']); ?></div>  
		  <div class="col-md-3"><b>Fecha comunicación: </b><?php echo formatoGregoriano($datosoferta['fcomunicacion']); ?></div>   
		</div>
		</div>
		</div>
		</div>
		
		<div class="panel panel-default">
		<div class="panel-heading"><b>Opciones que puede modificar el psicólogo</b></div>
		<div class="panel-body">
		<label class="col-md-1" for="estado">Estado:</label>
		<div class="col-md-2">
			<?= creaRadio('estado',$estado,$datosoferta['estado'])?>
		</div>
		<div class="col-md-3"><b>Candidato seleccionado: </b>
			<input id="cand" name="cand" type="text" placeholder="Nombre del candidato seleccionado" class="form-control input-md" value="<?php echo $datosoferta['candidato']; ?>">
		</div>
		<br>
		<div class="col-md-12"><br><b>Otros datos candidato: </b>
		  <textarea class="form-control" id="anotaciones" maxlength="230" name="anotaciones" placeholder="Anotaciones realizadas sobre el candidato seleccionado."><?php echo $datosoferta['des_candidato']; ?></textarea>
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
	<a href="?ctrl=list" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
	</form>
  </div>
</div>
</div>
</div>
</div>
</div>