<?php

class errorController{
	
	public function index(){
		echo "<h1>La página que buscas no existe</h1>";
	}

	public function errorLink(){

		echo "<h1>HAY UN ERROR CON EL LINK QUE SE INGRESO, INTENTALO DE NUEVO";
		echo "<a href='".base_url."'>REGRESO</a>";
	}
	
}