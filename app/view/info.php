<br><div class="container-fluid">
<div class="panel panel-default">
<div class="panel-heading"><b>Información de la oferta Nº <?= $idoferta; ?></b></div>
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
  <div class="col-md-4"><b>Psicologo encargado: </b><?php echo nombrePsicologo($datosoferta['psico_encar']); ?></div>  
</div>

<div class="form-group">
  <div class="col-md-4"><b>Fecha creación: </b><?php echo formatoGregoriano($datosoferta['fcreacion']); ?></div>  
  <div class="col-md-2"><b>Fecha comunicación: </b><?php echo formatoGregoriano($datosoferta['fcomunicacion']); ?></div>  
  <div class="col-md-4"><b>Canditato seleccionado: </b><?php echo $datosoferta['candidato']; ?></div>  
</div>

<!-- Textarea -->
<div class="form-group">
  <div class="col-md-10"><b>Otros datos candidato: </b><?php echo $datosoferta['des_candidato']; ?></div>
</div>
</div>
</div>
<div class="panel-footer"><a href="?ctrl=list" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;<b>Lista</b></a></div>
</div>
</div>