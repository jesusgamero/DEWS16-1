<div class="contenido">
	<div class="separacion">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
			
			<?php if ($hayError) :?>
			<div class="alert alert-danger"><center>
			<?php 
			foreach($errores as $textoError) 
			{
				echo $textoError;
			}
			?>
			</center></div>
			<?php endif;?>
			
            <form class="form-signin" method="post">
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
            </form>
        </div>
		</div>
</div>