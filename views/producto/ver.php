<?php if (isset($product)): ?>
	<div class="col-xl-12 col-md-12 col-sm-12 contenedor" >
		<div class="row">
			<div class="productoSolo">
				<h2><?= $product->nombre ?></h2>
				<div id="detail-product">
					<div class="image">
						<?php if ($product->imagen != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/camiseta.png" />
						<?php endif; ?>
					</div>
					<div class="data">
						<p class="description"><?= $product->descripcion ?></p>
						<p class="price"><?= $product->precio ?>$</p>
						<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
					</div>
				</div>
				<?php else: ?>
				<h1>El producto no existe</h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
