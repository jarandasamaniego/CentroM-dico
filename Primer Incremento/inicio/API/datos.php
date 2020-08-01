<?php 
	$sql = "SELECT * FROM clientes WHERE Id='$IdUsuario'";
	$res = mysqli_query(conexion::obtenerInstancia(),$sql);
	if (mysqli_num_rows($res) == 0) {
		$error = "Sus datos son incorrectos";
	}else{
		if ($reg=mysqli_fetch_array($res)) {

			$_SESSION["nombre-cliente"]=$reg["Nombre"];
			$_SESSION['apellido-cliente']=$reg['Apellido'];
			$_SESSION["dni-cliente"]=$reg["DNI"];
			$_SESSION['telefono-cliente']=$reg['Telefono'];
		}
	}

	$NombreCliente = $_SESSION['nombre-cliente'];
	$ApellidoCliente = $_SESSION['apellido-cliente'];	
	$DNICliente = $_SESSION['dni-cliente'];
	$TelefonoCliente = $_SESSION['telefono-cliente'];
 ?>

