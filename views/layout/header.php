<!DOCTYPE HTML>
<html lang="es">
	<head>
		
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
		<meta name="viewport" content="width=device-width, user-scalable=no, shrink-to-fit=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="description" content="esta es una tiendaen linea "/>
		<meta name="author" content="miguel angel fernandez trujillo" />
		<title>Rio pisueña</title>
    <!-- css stylo base -->
    <link href="<?=base_url?>assets/css/styles.css" rel="stylesheet" />
    <!-- css boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- max css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- css datatable -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- css datepicker -->    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- easy zoom -->
	<!-- <link rel="stylesheet" href="<?=base_url?>assets/css/easyzoom.css"> -->
	<!-- owl Carrusel -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/owlcarrusel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/owlcarrusel/owl.theme.default.min.css">
    <!-- js boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- max js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- datepicker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript">   </script>    
  <!-- datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <!-- fontawensome -->
    <script src="https://kit.fontawesome.com/1849e1867b.js" crossorigin="anonymous"></script>
    <!-- swet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- elevatezoom -->
	<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
    <!-- owlCarrusel -->
	<script src="<?=base_url?>assets/js/owlcarrusel/owl.carousel.js"></script>

    <!-- <script src="<?=base_url?>assets/js/easyzoom.js"></script> -->
		
								 
		
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/riopisuena.png" alt="" />
					<a href="<?=base_url?>">
						Rio Pisueña
					
					</a>
				</div>
				<div id="comunicacion">
					<div id="informacionHeader">
						<div class="tel1">
							<i class="fas fa-phone-volume fa-2x"></i>
							<div class="telefonolocal">
								<h3> (55) 58-50-01-40</h3>
							</div>
						</div>
						<div class="tel1">
						<i class="fab fa-whatsapp fa-2x"></i>
							<div class="telefonolocal">
								<a href="https://wa.link/30zod7" class="text-white">55-91-99-62-45</a>
							</div>
						</div>
						
					</div>
				<!-- 	<div id="carritoHeader">
						<i class="fas fas fa-shopping-cart fa-2x"></i>
					</div> -->
				</div>
			</header>

			<!-- MENU -->
			<?php $categorias = Utils::showCategorias(); ?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">Inicio</a>
					</li>
					<?php while($cat = $categorias->fetch_object()):?>
						<li>
							<a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			</nav>

			<div id="content">