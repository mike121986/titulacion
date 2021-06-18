<?php

class Pedido{
	private $id;
	private $usuario_id;
	private $numero;
	private $municipio;
	private $calle;
	private $cp;
	private $atencion;
	private $referencia;
	private $coste;
	private $estado;
	private $fecha;
	private $hora;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getUsuario_id() {
		return $this->usuario_id;
	}

	function getNumero() {
		return $this->numero;
	}

	function getMunicipio() {
		return $this->municipio;
	}

	function getDireccion() {
		return $this->calle;
	}

	function getCp(){
		return $this->cp;
	}

	function getatencion(){
		return $this->atencion;
	}

	function getreferencia(){
		return $this->referencia;
	}

	function getCoste() {
		return $this->coste;
	}

	function getEstado() {
		return $this->estado;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setUsuario_id($usuario_id) {
		$this->usuario_id = $usuario_id;
	}

	function setNumero($numero) {
		$this->numero = $this->db->real_escape_string($numero);
	}

	function setMunicipio($municipio) {
		$this->municipio = $this->db->real_escape_string($municipio);
	}

	function setDireccion($calle) {
		$this->calle = $this->db->real_escape_string($calle);
	}

	function setCp($cp){
		$this->cp = $this->db->real_escape_string($cp);
	}

	function setAtencion($atencion){
		$this->atencion= $this->db->real_escape_string($atencion);;
	}

	function setreferencia($referencia){
		$this->referencia= $this->db->real_escape_string($referencia);;
	}

	function setCoste($coste) {
		$this->coste = $coste;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setHora($hora) {
		$this->hora = $hora;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function getOneByUser(){
		$sql = "SELECT p.id, p.coste FROM pedidos p "
				//. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
			
		$pedido = $this->db->query($sql);
			
		return $pedido->fetch_object();
	}
	
	public function getAllByUser(){
		$sql = "SELECT p.* FROM pedidos p "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
			
		$pedido = $this->db->query($sql);
			
		return $pedido;
	}
	
	
	public function getProductosByPedido($id){
//		$sql = "SELECT * FROM productos WHERE id IN "
//				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";
	
		$sql = "SELECT pr.*, lp.unidades FROM productos pr "
				. "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
				. "WHERE lp.pedido_id={$id}";
				
		$productos = $this->db->query($sql);
			
		return $productos;
	}
	
	public function save(){
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getNumero()}', '{$this->getMunicipio()}', '{$this->getDireccion()}', {$this->getCoste()},'{$this->getCp()}','{$this->getatencion()}','{$this->getreferencia()}' , 'confirm', CURDATE(), CURTIME());";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function save_linea(){
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;
		
		foreach($_SESSION['carrito'] as $elemento){
			$producto = $elemento['producto'];
			
			$insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
			$save = $this->db->query($insert);
			
//			var_dump($producto);
//			var_dump($insert);
//			echo $this->db->error;
//			die();
		}
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id={$this->getId()};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getEstados(){
		$sql = "SELECT * FROM estados";
		$edo = $this->db->query($sql);

		return $edo;
	}
}