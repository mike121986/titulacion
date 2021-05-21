<?php if (isset($product)):
	$imagen = "";
	if($product->imagen != null && file_exists("assets/img/images/".$product->imagen)){
		$imagen = "assets/img/images/".$product->imagen;
	}else{
		$imagen = "assets/img/no-image.png";
	}
?>	
<div class="col-xl-12 col-md-12 col-sm-12 contenedor" >
	<div class="row">
		<div class="productoSolo">
			<h2><?= $product->nombre ?></h2>
			<div id="detail-product">
				<div class="imagenesComplemento">
					<div class="foto"><img src="<?=base_url.$imagen?>" />	</div>
					<div class="foto"></div>
					<div class="foto"></div>
					<div class="foto"></div>
					<div class="foto"></div>
				</div>
				<div class="image">						
					<img src="<?= base_url.$imagen?>"/>							
				</div>
				<div class="descripcion">
					<h5>DESCRIPCIÓN</h5>
					<p><?= $product->descripcion ?>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem ullam neque accusamus consequatur nisi nostrum, sint quod eveniet alias tempore eaque, quaerat minus eligendi blanditiis enim voluptate harum quisquam voluptatum!</p>
				</div>
				<div class="tarjetas">
					<img src="<?=base_url?>assets/img/pagoseguro-stripe.png" alt="" srcset="">
				</div>
				<div class="data">
					<div class="cantidadPrecio">
						<div class="cantidad">
							<p class="description">Cantidad</p>
							<input type="text" name="cantidadPieza" id="cantidadPieza" value="1">
						</div>
						<div class="precioTotal">
							<p class="price"><?= $product->precio ?>$</p>
							<a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="button">Agregar a carrito</a>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
			<h1>El producto no existe</h1>
			<?php endif; ?>
		</div>
	</div>
</div>
