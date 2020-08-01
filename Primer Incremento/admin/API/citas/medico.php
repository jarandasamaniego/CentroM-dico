<?php
	header('Content-Type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	//EL ARCHIVO CONFIG.PHP TENEMOS NUESTRAS CONSTANTES
	require_once('../../../config.php');
	//EN EL ARCHIVO CORE.PHP ESTA GUARDADA LA CONEXION A LA BASE DE DATOS
	require_once('../core.php');

	//FUNCION PARA MOSTAR LAS FRUTAS DE LA BASE DE DATOS
	function MostrarFrutas(){
		$SQL = "SELECT * FROM cita ORDER BY Id DESC";
		$RES = mysqli_query(conexion::obtenerInstancia(),$SQL);
		while ($FILA = mysqli_fetch_array($RES)) {
			$REGISTRO[] = $FILA;
		}
		return $REGISTRO;
	}
	function AddFruta(){
		if ($_POST['NombreFruta']!="" && $_POST["PrecioFruta"]!="" && $_POST["CantidadFruta"]) {
			$Nombre = $_POST['NombreFruta'];
			$Precio = $_POST['PrecioFruta'];
			$Stock = $_POST['CantidadFruta'];
			$SQL = "INSERT INTO frutas(IdFruta,NombreFruta,PrecioFruta,StockFruta,FechaRegFruta) 
					VALUES(NULL,'$Nombre','$Precio','$Stock',NOW())";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}else{
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}
		
	}
	function Update(){
		if ($_POST['IdFruta']!="" && $_POST['NombreFruta']!="" && $_POST["PrecioFruta"]!="" && $_POST["CantidadFruta"]) {
			$IdFruta = $_POST['IdFruta'];
			$Nombre = $_POST['NombreFruta'];
			$Precio = $_POST['PrecioFruta'];
			$Stock = $_POST['CantidadFruta'];
			$SQL = "UPDATE frutas SET 
				NombreFruta = '$Nombre',
				PrecioFruta = '$Precio',
				StockFruta = '$Stock'
				WHERE idfruta = '$IdFruta'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}else{
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}
	}

	function Delete(){
		if ($_POST['IdFruta']!="") {
			$IdFruta = $_POST['IdFruta'];
			$SQL = "DELETE FROM frutas WHERE IdFruta='$IdFruta'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}else{
			header("Location: ".URL."Admin/lista-fruta.php");
			exit();
		}
	}
	//CUANDO EJECUTAR LA FUNCION PARA MOSTRAR LA LISTA DE FRUTAS
	if($_GET['solicitud'] == 'lista') {
		$resultado = MostrarFrutas();
	}else if ($_GET['solicitud']=='NuevaCita') {
		AddFruta();
	}else if ($_GET['solicitud']=='actualizar') {
		Update();
	}else if ($_GET['solicitud']=='eliminar') {
		Delete();
	}else{
		echo "sin datos";
	}
	echo json_encode($resultado);
?>