<?php 
require_once("../API/core.php");
	
	$NombreDoc = $_POST['nombreapellidodoc'];
	$EspecialidadDoc = $_POST['especialidad'];
	$TelefonoDoc = $_POST['telefonodoc'];
	$Precio = $_POST['precio'];
	$FechaCita = $_POST['fecha'];
	$Nombre = $_POST['nombre'];
	$Apellido = $_POST['apellido'];
	$DNI = $_POST['dni'];
	$Telefono = $_POST['telefono'];

	$SQL = "INSERT INTO cita(NombreApellidoDoc, EspecialidadDoc, TelefonoDoc, Precio, Nombre, Apellido, DNI, Telefono, AgregarCita, FechaCita, Estado)VALUES('$NombreDoc','$EspecialidadDoc','$TelefonoDoc','$Precio',$Nombre','$Apellido','$DNI','$Telefono',NOW(),'$FechaCita','Deuda')";
	mysqli_query(conexion::obtenerInstancia(),$SQL);
	header("refresh:1; cita_cliente.php");
	exit();	
?>