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
				<div id="gallery_01" class=" imagenesComplemento">
					<div class="foto">
						<a href="<?=base_url.$imagen?>" data-standard="<?=base_url?>assets/img/grande/teclado0.png">
							<img src="<?=base_url?>assets/img/grande/teclado0.png" />	
						</a>
					</div>
					<div class="foto">
						<a href="<?=base_url?>assets/img/images/prueba/teclado1.jpg" data-standard="<?=base_url?>assets/img/grande/teclado11.jpg">
							<img src="<?=base_url?>assets/img/grande/teclado11.jpg" />	
						</a>
					</div>
					<div class="foto">
						<a href="<?=base_url?>assets/img/images/prueba/teclado2.jpg" data-standard="<?=base_url?>assets/img/grande/teclado2.png">
							<img src="<?=base_url?>assets/img/grande/teclado2.png" />	
						</a>
					</div>
					<div class="foto">
						<a href="<?=base_url?>assets/img/images/prueba/teclado3.jpg" data-standard="<?=base_url?>assets/img/grande/teclado3.png">
							<img src="<?=base_url?>assets/img/grande/teclado3.png" />	
						</a>
					</div>
				</div>
				<div class="image">					
				<figure >   
					<img id="easyzoom" src="<?= base_url.$imagen?>" alt="telas de excelente calidad" data-zoom-image="<?=base_url?>assets/img/grande/teclado0.png">
				</figure>
						<!-- <img id="img_01" src="<?= base_url.$imagen?>" alt="" data-zoom-image="<?=base_url?>assets/img/grande/teclado0.png"/> -->					
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
							<input type="hidden" id="precioUnidad" value="<?=$product->precio ?>">
							<p id="dollarSign">$</p><p class="price" id="priceTotal"><?=$product->precio ?></p>
						</div>
						<div class="botonComprar">
							<a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="btn btn-success btn-lg btn-block">Agregar a carrito</a>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
				<h1>El producto no existe</h1>
				<?php endif; ?>
			</div>
			<div class="imgREcomendado">
				<h3>RELACIONADO</h3>
				<div id="recomendado" class="owl-carousel owl-theme">
					<?php while ($imagen = $prCat->fetch_object() ):  	?>
						<div class="item"><a href="<?=base_url?>producto/ver&id=<?=$imagen->id?>&cat=<?=$imagen->categoria_id?>"><img src="<?=base_url?>assets/img/images/<?=$imagen->imagen?>"/></a></div>
					<?php endwhile; ?>
				</div>
			</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
			stagePadding: 50,
			loop:true,
			margin:10,
			autoHeight:true,
			nav:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
            		nav:true
				},
				600:{
					items:3,
            		nav:false
				},
				1000:{
					items:5,
					nav:true,
					loop:true
				}
			}
		})
		/* $(".owl-carousel").owlCarousel(); */
});
	</script>