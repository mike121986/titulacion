<h1>Algunos de nuestros productos</h1>
<?php while($product = $productos->fetch_object()): ?>
	
	<div class="col-sm-12 col-md-2 col-md-2 col-xl-2 product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>&cat=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
			<h2><?=Utils::recotarPuntos($product->nombre,18,18)?></h2>
		</a>
		<p><?=$product->precio?></p>
		<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
	</div>
<?php endwhile; ?>
