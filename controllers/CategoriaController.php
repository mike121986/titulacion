<?php
require_once  $_SERVER['DOCUMENT_ROOT'].'/titulo/models/categoria.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/titulo/models/producto.php';
/* require_once 'models/categoria.php';
require_once 'models/producto.php'; */

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$idDato = Validacion::validarNumero($_GET['id']);
			if($idDato == '-1'){
				echo '<script>window.location="'.base_url.'Error/errorId"</script>';
			}else{
				$edita = new Categoria();
				$edita->setId($idDato);
				$editarProducto = $edita->getOne();
				//var_dump($editarProducto);
			}
			
		}
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();

			$_SESSION['success'] = '<div class="alert alert-success" role="alert">SE INSERTO CORRECTAMENTE</div>';
		}
		/* header("Location:".base_url."categoria/index"); */
		echo '<script>window.location="'.base_url.'categoria/index"</script>';
	}

	public function update(){
		$idCat = (Validacion::validarNumero($_POST["idCategoria"]) == -1) ?  false : $_POST["idCategoria"];
		$name = (Validacion::textoLargo($_POST["nombreCategoria"],50) == 900) ? false : $_POST["nombreCategoria"];
	
		if( $idCat == false || $name == false){
			echo '<script>window.location="'.base_url.'Error/errorId"</script>';
		}else{
			$editar = new Categoria();
			$editar->setId($idCat);
			$editar->setnombre($name);
			$cambio = $editar->editar();
			if($cambio){
				$_SESSION['success'] = '<div class="alert alert-success" role="alert">SE ACTUALIZO CORRECTAMENTE</div>';
				echo '<script>window.location="'.base_url.'Categoria/crear&id='.$idCat.'"</script>';
			}else{
				$_SESSION['err'] = '<div class="alert alert-danger" role="alert">ALGO SUCEDIO VERIFICA TUS DATOS</div>';
				echo '<script>window.location="'.base_url.'Categoria/crear&id='.$idCat.'"</script>';
			}

		}

	}

	public function showCategoria($catId){
		$id = (Validacion::validarNumero($catId) == -1) ? false : $catId;

		if($id == false){
			$_SESSION['err'] = '<div class="alert alert-danger" role="alert">ALGO SUCEDIO VERIFICA TUS DATOS</div>';
			echo '<script>window.location="'.base_url.'Categoria/crear&id='.$catId.'"</script>';
		}else{
			$deleteCat = new Categoria();
			$deleteCat->setId($id);
			$verificar = $deleteCat->deleteCategoria();
			$categoria = $verificar->fetch_row();

			if($categoria[0] == 1){
				echo 1;
			}elseif($categoria[0] == 0){
				echo 0;
			}
		}
	}
	
}