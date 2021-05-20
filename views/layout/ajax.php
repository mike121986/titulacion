<?php 
session_start();
require_once "../../helpers/validacion.php";
require_once "../../helpers/crypt.php";
require_once "../../controllers/UsuarioController.php";
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

