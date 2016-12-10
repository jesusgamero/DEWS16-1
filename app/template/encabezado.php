<ul id="menu-bar">
 <li><a href="?ctrl=list"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;JobYesterday</a></li>
 
 <li><a style="width: 190px" href="?ctrl=list"><span style="color:#BDC3C7" class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Lista de Ofertas</a>
  <ul>
   <li>
   	 <?php if ($_SESSION['tipo']=='A'): ?>
	  	<a style="width: 190px" href="?ctrl=insert"><span style="color:#BDC3C7" class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Añadir una oferta</a>
	 <?php endif; ?>
   </li>
  </ul>
 </li>
 
 <li>
 <?php if ($_SESSION['tipo']=='A'): ?>
	  	<a style="width: 220px" href="?ctrl=list_user"><span class="glyphicon glyphicon-user" style="color:#BDC3C7"></span>&nbsp;&nbsp;Gestión de usuarios</a>
	 <?php endif; ?>
  <ul>
   <li>
    <?php if ($_SESSION['tipo']=='A'): ?>
	  	<a style="width: 220px" href="?ctrl=insert_user"><span style="color:#BDC3C7" class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Añadir un usuario</a>
	 <?php endif; ?>
   </li>
  </ul>
 </li>
 <li style="position:absolute; right:170px"><a style="color:#FFFFFF"><span style="color:#5499C7" class="glyphicon glyphicon-log-in"></span><b>&nbsp;&nbsp;Conectado: <?= $_SESSION['nombre']?> (<?= $_SESSION['usuario']?>)</b></a></li>
 <li style="position:absolute; right:0px"><a href="?ctrl=logout" style="color:#FFFFFF"><span class="glyphicon glyphicon-off" style="color:#E74C3C"></span><B>&nbsp;&nbsp;Cerrar Sesión</B></a></li>
</ul>
<br>