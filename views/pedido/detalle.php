<div class="container">
	<div class="boton">
		<button class="btnRegresoPagianas">REGRESAR</button>
	</div>
	<h1>Detalle del pedido</h1>

	<?php if (isset($pedido)): ?>
		<div class="container">
			<div class="usuario pedidos">
				<div class="Title">
					<h3>Usuario </h3>
				</div>
				<div class="nombre" style="position:relative;left:2%; text-transform:uppercase;">
					<?=$pedido->nombreCliente?>
				</div>
			</div>
			<div class="direccion pedidos">
				<div class="Title">
					<h3>Dirección de envio</h3>
				</div>
				<div class="nombre">
						<ul>
							<li><p><strong>Estado:</strong><?=$pedido->NombrEstado ?></p></li>
							<li><p><strong>municipio:</strong><?= $pedido->municipio ?></p></li>
							<li><p><strong>cp:</strong><?= $pedido->cp ?></p></li>
							<li><p><strong>calle:</strong><?=$pedido->calle?></p></li>
							<li><p><strong>horario de atención:</strong><?=$pedido->atencion?></p></li>
						</ul>	
				</div>
			</div>
			<div class="pedidos">
				<div class="Title">
					<h3>Datos del pedido:</h3>
				</div>
				<div class="nombre">
					<ul>
						<li><p><strong>Estado:</strong> <?=Utils::showStatus($pedido->estado)?></p></li>
						<li><p><strong>Número de pedido:</strong> <?= $pedido->id ?></p></li>
						<li><p><strong>Total a pagar:</strong> $<?= $pedido->coste ?></p></li>
						<li><p><strong>Productos:</strong>	</li>
					</ul>			
				</div>
				<table class="table table-striped table-hover">
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Unidades</th>
					</tr>
					<?php while ($producto = $productos->fetch_object()): ?>
					<tr>
						<td>
							<?php if ($producto->imagen != null): ?>
								<img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
							<?php else: ?>
								<img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
							<?php endif; ?>
						</td>
						<td>
							<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
						</td>
						<td>
							<?= $producto->precio ?>
						</td>
						<td>
							<?= $producto->unidades ?>
						</td>
					</tr>
					<?php endwhile; ?>
				</table>

			</div>
			<?php if(isset($_SESSION['admin'])): ?>
				<h3>Cambiar estado del pedido</h3>
				<form action="<?=base_url?>pedido/estado" method="POST">
					<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
					<select name="estado">
						<option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
						<option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>En preparación</option>
						<option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Preparado para enviar</option>
						<option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
					</select>
					<input type="submit" value="Cambiar estado" />
				</form>
				<br/>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>