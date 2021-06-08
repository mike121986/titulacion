<?php if(isset($_GET['id'])):
	if(isset($_SESSION['success'])){echo $_SESSION['success'];Utils::deleteSession('success');}
	if(isset($_SESSION['err'])){echo $_SESSION['err'];Utils::deleteSession('err');}
	
	?>
	
	<h2 >Editar Categoria <?=$editarProducto->nombre?></h2>
	<div class="container">
		<form action="<?=base_url?>Categoria/update" method="POST">
			<div class="form-group">
				<label for="editarCategoriaId">Categoria</label>
				<input type="hidden" name="idCategoria" value="<?=$editarProducto->id?>">
				<input type="text" name="nombreCategoria" class="form-control" id="editarCategoriaId" placeholder="Editar Categoria" value="<?=$editarProducto->nombre;?>">
				<small id="emailHelp" class="form-text text-muted">cambia el nombre de la categoria</small>
			</div>
					
			

			<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
				<div class="btn-group mr-2" role="group" aria-label="First group">
					<input type="submit" class="btn btn-success" value="ENVIAR">	
				</div>
				<div class="btn-group mr-2" role="group" aria-label="Second group">
					<button class="btn btn-danger">ELIMINAR</button>
				</div>
				<div class="btn-group mr-2" role="group" aria-label="Second group">
					<a href="<?=base_url?>Categoria/index" class="btn btn-primary">REGRESAR</a>
				</div>
			</div>
		</form>
	</div>
<?php else:?>
<h2>Crear nueva categoria</h2>
	<div class="container">
		<form action="<?=base_url?>categoria/save" method="POST">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required/>
			
			<input type="submit" class="btn btn-success" value="Guardar">
		</form>
  	</div>
<?php endif?>