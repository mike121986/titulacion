<?php
require_once 'models/pedido.php';

class pedidoController{
	
	public function hacer(){
		$edo = Utils::showEstados();
		require_once 'views/pedido/hacer.php';
	}
	
	public function add(){
		if(isset($_SESSION['identity'])){
			/* echo '<pre>';
			var_dump($_POST);
			echo '</pre>';
			die(); */
			$usuario_id = $_SESSION['identity']->id;
			$calle = (Validacion::textoLargo($_POST['calle'],80) == '900')?false:$_POST['calle'];
			$numero = (Validacion::validarNumero($_POST['numero']) == '-1')?false:$_POST['numero'];
			$municipio = (Validacion::validarNumero($_POST['selectMunicipio'],'-1') == '900')?false:$_POST['selectMunicipio'];
			$cp = (Validacion::validarNumero($_POST['cp'],'-1') == '800')?false:$_POST['cp'];
			$atencion = (Validacion::textoLargo($_POST['atencion'],80) == '900')?false:$_POST['atencion'];
			$referencia = (Validacion::textoLargo($_POST['calle'],80) == '900')?false:$_POST['calle'];
			
			$dato = array('calle'=>$calle,'numero'=>$numero,'municipio'=>$municipio,'cp'=>$cp,'atencion'=>$atencion,'ref'=>$referencia);

			foreach($dato as $datos => $valor ){
				if($valor == false){
					$_SESSION['formulario'] = array(
                        "error"=> 'El campo '.$dato." es Incorrecto, Llena los campos faltantes",
                        "datos"=>$datos
                    );
                break;	
				}
			}

			if(!isset($_SESSION['formulario'])){
				
			$stats = Utils::statsCarrito();
			$coste = $stats['total'];				
			
				// Guardar datos en bd
				$pedido = new Pedido();
				$pedido->setUsuario_id($usuario_id);
				$pedido->setDireccion($calle);
				$pedido->setNumero($numero);
				$pedido->setMunicipio($municipio);
				$pedido->setCp($cp);
				$pedido->setAtencion($atencion);
				$pedido->setreferencia($referencia);
				$pedido->setCoste($coste);
				
				$save = $pedido->save();
				
				// Guardar linea pedido
				$save_linea = $pedido->save_linea();
				
				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";
				}else{
					$_SESSION['pedido'] = "failed";
				}
				
			}else{
				$_SESSION['pedido'] = "failed";
			}	
			echo '<script>window.location="'.base_url.'pedido/confirmado"</script>';		
		}else{
			// Redigir al index
			echo '<script>window.location="'.base_url.'"</script>';		
		}
		
			
			
	}
	
	public function confirmado(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Pedido();
			$pedido->setUsuario_id($identity->id);
			
			$pedido = $pedido->getOneByUser();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($pedido->id);
		}
		require_once 'views/pedido/confirmado.php';
	}
	
	public function mis_pedidos(){
		Utils::isIdentity();
		$usuario_id = $_SESSION['identity']->id;
		$pedido = new Pedido();
		
		// Sacar los pedidos del usuario
		$pedido->setUsuario_id($usuario_id);
		$pedidos = $pedido->getAllByUser();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function detalle(){
		Utils::isIdentity();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Sacar el pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			/* $pedido = $pedido->getOne(); */
			$pedido = $pedido->detalleVenta();
			// Sacar los poductos
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($id);
			
			require_once 'views/pedido/detalle.php';
		}else{
			echo '<script>window.location="'.base_url.'pedido/mis_pedidos"</script>';		
		}
	}
	
	public function gestion(){
		Utils::isAdmin();
		$gestion = true;
		
		$pedido = new Pedido();
		$pedidos = $pedido->getAll();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function estado(){
		Utils::isAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();
			
			echo '<script>window.location="'.base_url.'pedido/detalle&id='.$id.'"</script>';		
		}else{
			
			echo '<script>window.location="'.base_url.'"</script>';		
		}
	}
	
	
}