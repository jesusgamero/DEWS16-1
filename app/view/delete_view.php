<br><div class="container-fluid">
<div class="panel panel-danger">
<div class="panel-heading"><b>Borrar Oferta</b></div>
<div class="panel-body">

<div class="form-horizontal">
<div class="form-group">
  <div class="col-md-10"><b>Descripción: </b><?php echo obtenerCampo('descripcion',$idoferta); ?></div>  
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-4"><b>Persona de contacto: </b><?php echo obtenerCampo('persona_contacto',$idoferta); ?></div>
  <div class="col-md-2"><b>Teléfono contacto: </B><?php echo obtenerCampo('tlf_contacto',$idoferta); ?></div>  
  <div class="col-md-4"><b>Email contacto: </B><?php echo obtenerCampo('email_contacto',$idoferta); ?></div>  
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-4"><b>Dirección: </b><?php echo obtenerCampo('dir_empresa',$idoferta); ?></div>  
  <div class="col-md-2"><b>Población: </b><?php echo obtenerCampo('poblacion',$idoferta); ?></div>  
  <div class="col-md-2"><b>Código postal: </b><?php echo obtenerCampo('cp',$idoferta); ?></div>  
</div>

<div class="form-group">
  <div class="col-md-4"><b>Provincia: </b><?php echo nombreProvincias(obtenerCampo('provincia',$idoferta)); ?></div>  
  <div class="col-md-2"><b>Estado: </b><?php echo obtenerCampo('estado',$idoferta); ?></div>
  <div class="col-md-2"><b>Fecha comunicación: </b><?php echo formatoGregoriano(obtenerCampo('fcomunicacion',$idoferta)); ?></div>  
</div>

<div class="form-group">
  <div class="col-md-4"><b>Psicologo encargado: </b><?php echo nombrePsicologo(obtenerCampo('psico_encar',$idoferta)); ?></div>  
  <div class="col-md-4"><b>Canditato seleccionado: </b><?php echo obtenerCampo('candidato',$idoferta); ?></div>  
</div>

<!-- Textarea -->
<div class="form-group">
  <div class="col-md-10"><b>Otros datos candidato: </b><?php echo obtenerCampo('des_candidato',$idoferta); ?></div>
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
	<a href="?ctrl=delete_ctl&borrado=si&id=<?=$idoferta;?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</a>&nbsp;&nbsp;
	<a href="?ctrl=list_ctl" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
  </div>
</div>
</div>