<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/titulo/models/producto.php';


class productoController{
	
	public function index(){
		$producto = new Producto();
		$productos = $producto->getRandom(12);
	
		// renderizar vista
		
		require_once 'views/producto/destacados.php';
	}
	
	public function ver(){
		
		if(isset($_GET['id'])){
			$id = Validacion::validarNumero($_GET['id']);
			$categoria = Validacion::validarNumero($_GET['cat']);
			
			if($id == -1 || $categoria == -1){
				$error = new errorController();
				$error->errorLink();
				exit();
			}else{
				$producto = new Producto();
				$producto->setId($id);
	
				$product = $producto->getOne();
				
				$parecido = new Producto();
				$parecido-> setCategoria_id($categoria);
				$parecido->setId($id);

				$prCat= $parecido->getProductoCat();	
						
			}
		}
		require_once 'views/producto/ver.php';
	}
	
	public function gestion(){
		Utils::isAdmin();
		
		$producto = new Producto();
		$productos = $producto->getAll();
		
		require_once 'views/producto/gestion.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $precio && $stock && $categoria){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
				
				// Guardar la imagenp
				if(isset($_FILES['imagen'])){
					function compressImage($source, $destination, $quality) { 
						// Obtenemos la información de la imagen
						$imgInfo = getimagesize($source); 
						$mime = $imgInfo['mime']; 
						 
						// Creamos una imagen
						switch($mime){ 
							case 'image/jpeg': 
								$image = imagecreatefromjpeg($source); 
								break; 
							case 'image/png': 
								$image = imagecreatefrompng($source); 
								break; 
							case 'image/gif': 
								$image = imagecreatefromgif($source); 
								break; 
							default: 
								$image = imagecreatefromjpeg($source); 
						} 
						 
						// Guardamos la imagen
						/* var_dump(base_url.$destination);
						die(); */
						imagejpeg($image, $destination, $quality); 
						 
						// Devolvemos la imagen comprimida
						return $destination; 
					}
					/* var_dump($_FILES);
					exit(); */
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						/* move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename); */
						$compressimage = compressImage($file['tmp_name'],'uploads/images/'.$filename,75);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		/* header('Location:'.base_url.'producto/gestion'); */
		echo '<script>window.location="'.base_url.'producto/gestion"</script>';
	}
	
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			/* header('Location:'.base_url.'producto/gestion'); */
			echo '<script>window.location="'.base_url.'producto/gestion"</script>';
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		/* header('Location:'.base_url.'producto/gestion'); */
		echo '<script>window.location="'.base_url.'producto/gestion"</script>';
	}
	
}