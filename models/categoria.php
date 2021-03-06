<?php

class Categoria{
	private $id;
	private $nombre;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll(){
		$categorias = $this->db->query("SELECT * FROM categorias WHERE categorias.statusCategoria <> 0  ORDER BY id desc");
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$sql = "call altaCategoria('{$this->getNombre()}')";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function editar(){
		$edit = "UPDATE categorias SET nombre='{$this->getNombre()}' WHERE  id={$this->getId()}";
		
		$query = $this->db->query($edit);

		$result = false;
		if($query){
			$result = true;
		}

		return $result;
	}

	public function deleteCategoria(){
		$delete = "SELECT verifDelete({$this->getId()})";
		$query = $this->db->query($delete);

		return $query;


	}
	
	
}