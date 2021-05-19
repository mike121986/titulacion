<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST" novalidate class="container">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" class="form-control"  id="nombre" />
	
	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" class="form-control"  id="apellidos" />
	
	<label for="email">Email</label>
	<input type="text" name="email" class="form-control"  id="emailRegistro" />
	
	<label for="password">Contraseña</label>
	<div class="input-group input-group-sm ">
		<input type="password" name="password" class="form-control"  id="passwordRegistro" aria-label="Small" aria-describedby="inputGroup-sizing-sm"/>
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-eye eyeHiddeNo" aria-hidden="true"></i></span>
		</div>
	</div>
		<small class="text-danger">La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos.</small>
	
	
	
	
	
	<input type="submit" value="Registrarse" id="enviarRegistro" />

</form>