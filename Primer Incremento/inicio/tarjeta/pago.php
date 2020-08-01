<?php 
	require_once("../dbcon.php");	

	$Monto = $_POST['monto'];
	$Precio = $_POST['precio'];
	if ($Monto==$Precio) {
		$PrecioFinal=0;
	}else{
		$PrecioFinal=$Monto-$Precio;
	}
	$SQL = "INSERT INTO cita SET(Precio = '$PrecioFinal' , Estado = 'Pagado')";
	mysqli_query(conexion::obtenerInstancia(),$SQL);
	header("refresh:1; ../cita_cliente.php");
	exit();
		
?>