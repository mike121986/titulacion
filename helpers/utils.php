<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			echo '<script>window.location="'.base_url.'"</script>';
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			echo '<script>window.location="'.base_url.'"</script>';
		}else{
			return true;
		}
	}
	
		
	public static function statsCarrito(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$stats['count'] = count($_SESSION['carrito']);
			
			foreach($_SESSION['carrito'] as $producto){
				$stats['total'] += $producto['precio']*$producto['unidades'];
			}
		}
		
		return $stats;
	}
	
	public static function showStatus($status){
		$value = 'Pendiente';
		
		if($status == 'confirm'){
			$value = 'Pendiente';
		}elseif($status == 'preparation'){
			$value = 'En preparación';
		}elseif($status == 'ready'){
			$value = 'Preparado para enviar';
		}elseif($status = 'sended'){
			$value = 'Enviado';
		}
		
		return $value;
	}

	public static function recotarPuntos($texto,$lengthTexto,$maximosShow){
		$puntos = "...";
		$contar = strlen($texto);
		if($contar>$maximosShow){
			$textoCortado = substr($texto, 0,$lengthTexto).$puntos;
		}else{
			$textoCortado = $texto;
		}
		return $textoCortado;
	}

	public static function showCategorias(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		return $categorias;
	}

	public static function showEstados(){
		require_once 'models/pedido.php';
		$estados = new Pedido();
		$getAll = $estados->getEstados();
		return $getAll;
	}

 
	
}
