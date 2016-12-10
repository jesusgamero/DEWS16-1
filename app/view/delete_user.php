<br><div class="container-fluid">
<div class="panel panel-danger">
<div class="panel-heading"><b>Borrar Usuario</b></div>
<div class="panel-body">

<div class="form-group">
  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><b>Tipo: </b><?php echo tipoUsuario($datosusuario['tipo']); ?></div>
  <div class="col-md-3"><b>Nombre del usuario: </B><?php echo $datosusuario['nombre']; ?></div>  
  <div class="col-md-2"><b>Alias del usuario: </B><?php echo $datosusuario['user']; ?></div>  
</div>

</div>
</div>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Confirmación de borrado</h3>
  </div>
  <div class="panel-body center-block">
    <b>¿Estás seguro que quieres borrar este usuario? &nbsp;&nbsp;</b>
	<a href="?ctrl=delete_user&borrado=si&id=<?=$idusuario;?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Si</a>&nbsp;&nbsp;
	<a href="?ctrl=list_user" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;No</a>
  </div>
</div>
</div>