<h1>Gestionar categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<table id="" class=" table table-striped table-bordered TableGenerica" style="width:100%">
<thead>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>ACCIÓN</th>
	</tr>
</thead>
<tbody>
	<?php 
	$contador = 1;
	 while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td><?=$contador?></td>
			<td><?=$cat->nombre;?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">
					<a href="<?=base_url?>/Categoria/crear&id=<?=$cat->id?>" class="btn btn-primary" role="button">EDITAR</a>
				</div>
			</td>
		</tr>
	<?php 
	$contador++;
		endwhile; ?>
</tbody>
</table>
