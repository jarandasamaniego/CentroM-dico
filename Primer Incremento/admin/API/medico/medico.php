<?php
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	//EL ARCHIVO CONFIG.PHP TENEMOS NUESTRAS CONSTANTES
	require_once('../../../config.php');
	//EN EL ARCHIVO CORE.PHP ESTA GUARDADA LA CONEXION A LA BASE DE DATOS
	require_once('../core.php');

	//FUNCION PARA MOSTAR LAS FRUTAS DE LA BASE DE DATOS
	function MostrarMedico(){
		$SQL = "SELECT * FROM medico ORDER BY Id DESC";
		$RES = mysqli_query(conexion::obtenerInstancia(),$SQL);
		while ($FILA = mysqli_fetch_array($RES)) {
			$REGISTRO[] = $FILA;
		}
		return $REGISTRO;
	}
	function AddMedico(){
		if ($_POST['Nombre']!="" && $_POST["Apellido"]!="" && $_POST["Telefono"]!="" && $_POST["Especialidad"]!="" && $_POST["Precio"]!="" && $_POST["FechaAtencion"]) {
			$Nombre = $_POST['Nombre'];
			$Apellido = $_POST['Apellido'];
			$Telefono = $_POST['Telefono'];
			$Especialidad = $_POST['Especialidad'];
			$Precio = $_POST['Precio'];
			$FechaAtencion = $_POST['FechaAtencion'];
			$SQL = "INSERT INTO medico(Nombre, Apellido, Telefono, Especialidad, Precio, FechaAtencion) VALUES('$Nombre','$Apellido','$Telefono','$Especialidad','$Precio','$FechaAtencion')";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}else{
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}		
	}
	
	function UpdateMedico(){
		if ($_POST['Nombre']!="" && $_POST["Apellido"]!="" && $_POST["Telefono"]!="" && $_POST["Especialidad"]!="" && $_POST["Precio"]!="" && $_POST["FechaAtencion"]) {
			$Id= $_POST['Id'];
			$Nombre = $_POST['Nombre'];
			$Apellido = $_POST['Apellido'];
			$Telefono = $_POST['Telefono'];
			$Especialidad = $_POST['Especialidad'];
			$Precio = $_POST['Precio'];
			$FechaAtencion = $_POST['FechaAtencion'];
			$SQL = "UPDATE medico SET 
				Nombre = '$Nombre',
				Apellido = '$Apellido',
				Telefono = '$Telefono',
				Especialidad = '$Especialidad',
				Precio = '$Precio',
				FechaAtencion = '$FechaAtencion'
				WHERE Id = '$Id'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}else{
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}
	}

	function DeleteMedico(){
		if ($_POST['Id']!="") {
			$Id = $_POST['Id'];
			$SQL = "DELETE FROM medico WHERE Id='$Id'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}else{
			header("Location: ".URL."Admin/medicos.php");
			exit();
		}
	}
	//CUANDO EJECUTAR LA FUNCION PARA MOSTRAR LA LISTA DE MEDICO
	if($_GET['solicitud'] == 'lista') {
		$resultado = MostrarMedico();
	}else if ($_GET['solicitud']=='NuevaMedico') {
		AddMedico();
	}else if ($_GET['solicitud']=='actualizar') {
		UpdateMedico();
	}else if ($_GET['solicitud']=='eliminar') {
		DeleteMedico();
	}else{
		echo "sin datos";
	}
	echo json_encode($resultado);
?>