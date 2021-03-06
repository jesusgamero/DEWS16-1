		<br>
		<!-- Borrado correcto-->
		<?php if (get('borrado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta borrada correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Modificado correcto-->
		<?php if (get('modificado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta modificada correctamente.</li>
			</ul></div>
		<?php endif;?>
		
		<!-- Insertado correcto-->
		<?php if (get('insertado')) :?>
			<div class="alert alert-success"><ul>
			<li>Oferta insertada correctamente.</li>
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
	<form class="form-horizontal" method="POST">
	<div class="panel panel-default">
	 <div class="panel-heading"><h3 class="panel-title">Filtrado de ofertas</h3></div>
	<div class="panel-body">
		<div class="row">
		
		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="descripcion">Descripción:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
		<?= creaSelect('cond1a',$criterio,sesion('cond1a'))?>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-3">
			<input id="cond1b" value="<?= sesion('cond1b') ?>" name="cond1b" class="form-control input-md" placeholder="Descripción de la oferta">
		</div>

		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="creacion">Creación:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
		<?= creaSelect('cond2a',$criterio,sesion('cond2a'))?>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-1">
			<input id="cond2b" value="<?= sesion('cond2b') ?>"name="cond2b" class="form-control input-md" placeholder="dd/mm/yyyy">
		</div>

		<label class="col-xs-12 col-sm-2 col-md-1 control-label" for="cp">CP:</label>
		<div class="col-xs-12 col-sm-4 col-md-1">
		<?= creaSelect('cond3a',$criterio,sesion('cond3a'))?>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-1">
			<input id="cond3b" value="<?= sesion('cond3b') ?>" name="cond3b" class="form-control input-md" placeholder="C. Postal">
		</div>
		</div>
	</div>
	 <div class="panel-footer">
	 <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-filter"></span>&nbsp;<b>Filtrar Ofertas</b></button></div>
	</div>
	</form>
	</div>
		
	<div class="container-fluid">
	
	<div class="panel panel-default">
	<div class="panel-body">
	<h3>Estamos a <?= date("d/m/Y"); ?>:<?php echo " Hay ". $nreg." ofertas disponibles"; ?></h3>
	 
	 	<?php if ($listado==null)
		{
		?>
		<center><h3>Oops! No hay ninguna oferta disponible, inserte una nueva.</h3></center><br><br>
		<?php
		} 
		else 
		{ 
		foreach ($listado as $clave => $oferta) 
		{ ?>
					<div class="panel panel-default">
					<div class="panel-heading"><b>Oferta Nº <?= $oferta['idoferta']; ?> </b> 
					
					<?php if ($_SESSION['tipo']=='A'): ?>
					<a href="?ctrl=delete&id=<?= $oferta['idoferta']; ?>" class="close">&times;</a>
					<?php endif; ?>
					
					</div>	
					<div class="panel-body">	 	
					<div class="form-horizontal">
						
						<div class="form-group">
						  <div class="col-md-10"><b>Descripción: </b><?= $oferta['descripcion']; ?></div>  
						</div>	
						
						<div class="form-group">
						  <div class="col-md-4"><b>Persona de contacto: </b><?= $oferta['persona_contacto']; ?></div>
						  <div class="col-md-2"><b>Teléfono contacto: </B><?= $oferta['tlf_contacto']; ?></div>  
						  <div class="col-md-4"><b>Email contacto: </B><?= $oferta['email_contacto']; ?></div>  
						</div>

						<div class="form-group">
						  <div class="col-md-4"><b>Provincia: </b><?= nombreProvincias($oferta['provincia']) ?></div>  
						  <div class="col-md-2"><b>Estado: </b><?= verEstado($oferta['estado']); ?></div>
						  <div class="col-md-4"><b>Psicologo encargado: </b><?= nombrePsicologo($oferta['psico_encar']) ?></div>  
						</div>

						<div class="form-group">
						  <div class="col-md-4"><b>Fecha creación: </b><?= formatoGregoriano($oferta['fcreacion']) ?></div> 
						  <div class="col-md-2"><b>Fecha comunicación: </b><?= formatoGregoriano($oferta['fcomunicacion']) ?></div>  
						  <div class="col-md-4"><b>Canditato seleccionado: </b><?= $oferta['candidato']; ?></div>  
						</div>
						
					</div>	
					</div>
					
					<div class="panel-footer">
					<a href="?ctrl=info&id=<?= $oferta['idoferta']; ?>"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;<b>&nbsp;Ver</b></a>&nbsp;&nbsp;&nbsp;
					<a href="?ctrl=update&id=<?= $oferta['idoferta']; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<b>&nbsp;Editar</b></a>&nbsp;&nbsp;&nbsp;
					
					<?php if ($_SESSION['tipo']=='A'): ?>
					<a href="?ctrl=delete&id=<?= $oferta['idoferta']; ?>" style="color: #CB4335"><span style="color: #FFFFF" class="glyphicon glyphicon-remove"></span>&nbsp;<b>&nbsp;Borrar</b></a>
					<?php endif; ?>
						 
					<label style="float:right; color:#585858"><?= formatoGregoriano($oferta['fcreacion']) ?> (Hace <?= diasTranscurridos($oferta['fcreacion'],date("Y-m-d")); ?> días)</label>
					</div>
					</div>
	
		<?php }}?>
		<center><b>
			<ul class="pagination">
			<li><a href="?ctrl=list&pag=1" >&laquo;</a></li>
			<li><a href="?ctrl=list&pag=<?php echo ($pag-1);?>"><</a></li>
			<?php for ($i = 1; $i < $maxPag; $i++) {
				if($i==$pag){
				echo "<li class='active'><a href='?ctrl=list&pag=".$i."'>".$i."</a></li>";	
				}
				else{
				echo "<li><a href='?ctrl=list&pag=".$i."'>".$i."</a></li>"; 
				}
			}
			?>
			<li><a href="?ctrl=list&pag=<?php if ($pag < ceil($maxPag-1)){echo ($pag+1);} else {echo (ceil($maxPag-1));} ?>">></a></li>
			<li><a href="?ctrl=list&pag=<?php echo (ceil($maxPag-1));?>">&raquo;</a></li>
			</ul>
		</b></center>
	</div>
	</div>
	</div>