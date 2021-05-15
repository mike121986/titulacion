<?php

class Database{
	public static function connect(){
		/* $db = new PDO("mysql:host=localhost;dbname=tienda_master","root","MIKEtrujillo1986"); */
		$db = new mysqli('107.180.51.82', 'UserTdwem', 'EDNYmike2021', 'ticdewem',3306);
		if ($db->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		}
		$db->query("SET NAMES 'utf8'");
		return $db;
		/* echo $db->host_info . "\n";
		
		 */
	}
	
}

