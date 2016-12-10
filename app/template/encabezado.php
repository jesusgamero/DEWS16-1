<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">JobYesterday</a>
	  <a href="?ctrl=list">&nbsp;<b>&nbsp;Lista Ofertas</b></a>&nbsp;&nbsp;&nbsp;
	 <?php if ($_SESSION['tipo']=='A'): ?>
	  	<a href="?ctrl=insert"><span class="glyphicon glyphicon-plus"></span>&nbsp;<b>&nbsp;Añadir Oferta</b></a>&nbsp;&nbsp;&nbsp;
	 <?php endif; ?>
	 
	 <?php if ($_SESSION['tipo']=='A'): ?>
	  	<a href="?ctrl=list_user"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>&nbsp;Gestión de Usuarios</b></a>&nbsp;&nbsp;&nbsp;
	 <?php endif; ?>
	 
		<label style="color:#FFFFFF"> Conectado: <?= $_SESSION['nombre']?> (<?= $_SESSION['usuario']?>)</label>
		<a href="?ctrl=logout" style="float:right; color:#FFFFFF"><span class="glyphicon glyphicon-off"></span>&nbsp;<b>&nbsp;Salir</b></a>&nbsp;&nbsp;&nbsp;
    </div>
</nav>