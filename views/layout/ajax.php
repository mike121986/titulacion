<?php 
session_start();
require_once "../../helpers/validacion.php";
require_once "../../helpers/crypt.php";
require_once "../../controllers/UsuarioController.php";
require_once "../../controllers/CategoriaController.php";
require_once "../../config/db.php";



class Ajax{
	private $dato;

	public function getDato()
	{
    return $this->dato;
	}

	public function setDato($archivo)
	{
    $this->dato = $archivo;
    return $this;
	}


	// verificamos si el correo existe
	public function verifCorreo(){
		$datos = $this->getDato();
		$consultar = new usuarioController();
		$consultar->verifEmail($datos);
	}

	public function categoria(){
		$id = $this->getDato();
		$consulta = new categoriaController($id);
		$consulta-> showCategoria($id);
	}

	public function colocarMunicipio(){
		$colmun = $this -> getDato();
		$mandarId = new usuarioController();
		$mandarId->municipio($colmun);
		
	}
}
/* 	echo "<pre>";
  	var_dump($_POST);
 	echo "</pre>";
  	exit(); */

if(isset($_POST['email'])){
	$estado = new Ajax();
	$estado -> setDato($_POST['email']);
	$estado -> verifCorreo();

}

if(isset($_POST['cat_id'])){
	$estado = new Ajax();
	$estado -> setDato($_POST['cat_id']);
	$estado -> categoria();
}

if(isset($_POST['idEstado'])){
	$estado = new Ajax();
	$estado -> setDato($_POST['idEstado']);
	$estado -> colocarMunicipio();

}

