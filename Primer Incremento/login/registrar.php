<?php 
require_once("../inicio/API/core.php");
	
	$Nombre = $_POST['nombre'];
	$Apellido = $_POST['apellido'];
	$DNI = $_POST['dni'];
	$Telefono = $_POST['telefono'];
	$Usuario = $_POST['usuario'];
	$Password = $_POST['password'];
	$SQL = "INSERT INTO clientes(Nombre,Apellido,DNI,Telefono,Usuario,Password) 
					VALUES('$Nombre','$Apellido','$DNI','$Telefono','$Usuario','$Password')";
	mysqli_query(conexion::obtenerInstancia(),$SQL);
	header("refresh:1; ../");
	exit();
	
?>