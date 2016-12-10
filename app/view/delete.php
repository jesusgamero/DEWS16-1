<br><div class="container-fluid">
<div class="panel panel-danger">
<div class="panel-heading"><b>Borrar oferta Nº <?php echo $idoferta; ?></b></div>
<div class="panel-body">

<div class="form-horizontal">
<div class="form-group">
  <div class="col-md-10"><b>Descripción: </b><?php echo $datosoferta['descripcion']; ?></div>  
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-4"><b>Persona de contacto: </b><?php echo $datosoferta['persona_contacto']; ?></div>
  <div class="col-md-2"><b>Teléfono contacto: </B><?php echo $datosoferta['tlf_contacto']; ?></div>  
  <div class="col-md-4"><b>Email contacto: </B><?php echo $datosoferta['email_contacto']; ?></div>  
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-4"><b>Dirección: </b><?php echo $datosoferta['dir_empresa']; ?></div>  
  <div class="col-md-2"><b>Población: </b><?php echo $datosoferta['poblacion']; ?></div>  
  <div class="col-md-2"><b>Código postal: </b><?php echo $datosoferta['cp']; ?></div>  
</div>

<div class="form-group">
  <div class="col-md-4"><b>Provincia: </b><?php echo nombreProvincias($datosoferta['provincia']); ?></div>  
  <div class="col-md-2"><b>Estado: </b><?php echo verEstado($datosoferta['estado']); ?></div>
  <div class="col-md-2"><b>Fecha comunicación: </b><?php echo formatoGregoriano($datosoferta['fcomunicacion']); ?></div>  
</div>

<div class="form-group">
  <div class="col-md-4"><b>Psicologo encargado: </b><?php echo nombrePsicologo($datosoferta['psico_encar']); ?></div>  
  <div class="col-md-4"><b>Canditato seleccionado: </b><?php echo $datosoferta['candidato']; ?></div>  
</div>

<!-- Textarea -->
<div class="form-group">
  <div class="col-md-10"><b>Otros datos candidato: </b><?php echo $datosoferta['des_candidato']; ?></div>
</div>
</div>

</div>
</div>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Confirmación de borrado</h3>
  </div>
  <div class="panel-body center-block">
    <b>¿Estás seguro que quieres borrar este registro? &nbsp;&nbsp;</b>
	<a href="?ctrl=delete&borrado=si&id=<?=$idoferta;?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</a>&nbsp;&nbsp;
	<a href="?ctrl=list" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
  </div>
</div>
</div>