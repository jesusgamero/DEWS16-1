		<br>
		<!-- Borrado correcto-->
		<?php if (get('borrado')) :?>
			<div class="alert alert-success"><ul>
			<li>Usuario borrado correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Modificado correcto-->
		<?php if (get('modificado')) :?>
			<div class="alert alert-success"><ul>
			<li>Usuario modificado correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Insertado correcto-->
		<?php if (get('insertado')) :?>
			<div class="alert alert-success"><ul>
			<li>Usuario insertado correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Errores en la búsqueda -->
		<?php if ($hayError) :?>
			<div class="alert alert-danger"><ul>
			<?php 
			echo "<b>Errores en el filtrado:</B>";
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
	<h5>Alta nuevo usuario:&nbsp;&nbsp;<a href="?ctrl=insert_user" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span>&nbsp;<span class="glyphicon glyphicon-user"></span><b>&nbsp;&nbsp;Nuevo Usuario</b></a></h5>
	<h3>Gestión de usuarios</h3>

					<div class="panel panel-default">
					<div class="panel-heading"><b>Listado de Usuarios: </b><?php echo "Hay ". $nreg." usuarios registrados.";?></div>	
					<div class="panel-body">	 	
					<div class="form-horizontal">
					<center>
						<div class="table-responsive">
						  <table class="table">
							 <tr>
							<th>Nombre</th>
							<th>Tipo</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Editar</th>
							<th>Borrar</th>
							 </tr>
								<?php
								foreach ($listado as $clave => $usuario) 
								{ ?>
								<tr>
									<td><?= $usuario['nombre']; ?></td>
									<td><?= tipoUsuario($usuario['tipo']); ?></td>
									<td><?= $usuario['user']; ?></td>
									<td><?= str_repeat("*",strlen($usuario['pass'])); ?></td>
									<?php if ($_SESSION['usuario']!= $usuario['user']){ ?>
									<td><a href="?ctrl=update_user&id=<?= $usuario['cod']; ?>"><span class="glyphicon glyphicon-pencil"></span></b></a></td>
									<td><a href="?ctrl=delete_user&id=<?= $usuario['cod']; ?>" style="color: #CB4335"><span style="color: #FFFFF" class="glyphicon glyphicon-remove"></span></a></td>
									<?php }else{ ?>
									<td><span style="color: #CB4335" class="glyphicon glyphicon-minus-sign"></span></td>
									<td><span style="color: #CB4335" class="glyphicon glyphicon-minus-sign"></span></td>
									<?php }?>
								</tr>
								<?php }?>
						  </table>
						</div>
					</div>	
					</div>
					</div>
	
			<center><b>
			<ul class="pagination">
			<li><a href="?ctrl=list_user&pag=1" >&laquo;</a></li>
			<li><a href="?ctrl=list_user&pag=<?php echo ($pag-1);?>"><</a></li>
			<?php for ($i = 1; $i < $maxPag; $i++) {
				if($i==$pag){
				echo "<li class='active'><a href='?ctrl=list_user&pag=".$i."'>".$i."</a></li>";	
				}
				else{
				echo "<li><a href='?ctrl=list_user&pag=".$i."'>".$i."</a></li>"; 
				}
			}
			?>
			<li><a href="?ctrl=list_user&pag=<?php if ($pag < ceil($maxPag-1)){echo ($pag+1);} else {echo (ceil($maxPag-1));} ?>">></a></li>
			<li><a href="?ctrl=list_user&pag=<?php echo (ceil($maxPag-1));?>">&raquo;</a></li>
			</ul>
		</b></center>
	</div>
	</div>
	</div>