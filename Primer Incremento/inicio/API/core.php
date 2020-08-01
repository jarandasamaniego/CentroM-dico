<?php 
session_start();
require_once('../config.php');
class Conexion{
	private static $objCon = null;
	private static $instancia = null;
	public static function obtenerInstancia(){
		if (self::$objCon == null) {
			self::$instancia = new Conexion();
			self::$objCon = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
			or die("Error de conexion a la DB ".DB_NAME);
		}
		return self::$objCon;
	}
	function __destruct(){
		mysqli_close(conexion::obtenerInstancia());
	}
}
//print_r(Conexion::obtenerInstancia());
?>