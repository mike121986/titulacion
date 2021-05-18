<!-- BARRA LATERAL -->
<aside id="lateral">

	<div id="carrito" class="block_aside">
		<h3>Mi carrito</h3>
		<ul>
			<li><a href="<?=base_url?>carrito/index">Productos (0)</a></li>
			<li><a href="<?=base_url?>carrito/index">Total: 0 $</a></li>
			<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
		</ul>
	</div>
	
	<div id="login" class="block_aside">
		
		<?php if(!isset($_SESSION['identity'])): ?>
			<h3>Entrar a la web</h3>
			<form action="<?=base_url?>usuario/login" method="post" id="frmInicoSession">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" autocomplete="off"/>
				<small id="errorEmail"></small>
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="Password" autocomplete="off"/>
				<small id="errorpsw"></small>
				<input type="submit" value="Enviar" id="startSession" />
			</form>
		<?php else: ?>
			<h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
		<?php endif; ?>

		<ul>
		<?php if(isset($_SESSION['error_login'])): ?>
				<?=$_SESSION['error_login']?>				
			<?php endif; ?>

			<?php if(isset($_SESSION['admin'])): ?>
				<li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identity'])): ?>
				<li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
			<?php else: ?> 
				<li style="position:relative;left:-25px;list-style:none;"><a class="btn btn-outline-danger btn-sm" href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
			<?php endif; ?> 

			
		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">