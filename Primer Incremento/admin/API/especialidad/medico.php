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
		$SQL = "SELECT * FROM especialidades ORDER BY Id DESC";
		$RES = mysqli_query(conexion::obtenerInstancia(),$SQL);
		while ($FILA = mysqli_fetch_array($RES)) {
			$REGISTRO[] = $FILA;
		}
		return $REGISTRO;
	}
	function AddFruta(){
		if ($_POST['Nombre']!="" && $_POST["Descripcion"]!="" && $_POST["Imagen"]) {
			$Nombre = $_POST['Nombre'];
			$Descripcion = $_POST['Descripcion'];			
			$imgFile = $_FILES['Imagen']['name'];
			$tmp_dir = $_FILES['Imagen']['tmp_name'];
			$imgSize = $_FILES['Imagen']['size'];
			$upload_dir = '../../../inicio/uploads/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png');
			$Imagen = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions)){
				if($imgSize < 5000000){
					move_uploaded_file($tmp_dir,$upload_dir.$Imagen);
				}
				else{
					$errMSG = "Lo sentimos, su archivo es demasiado grande para cargar. Debería ser menor que 5MB.";
				}
			}
			else{
				$errMSG = "Lo Sentimos, solo se permiten archivos de extensión. JPG, JPEG, PNG.";		
			}
			$SQL = "INSERT INTO especialidades(Nombre,Descripcion,Imagen)VALUES('$Nombre','$Descripcion','$Imagen')";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}else{
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}
		
	}
	function Update(){
		if ($_POST['Id']!="" && $_POST['Nombre']!="" && $_POST["Descripcion"]!="" && $_POST["Imagen"]) {
			$Id = $_POST['Id'];
			$Nombre = $_POST['Nombre'];
			$Descripcion = $_POST['Descripcion'];
			$Imagen = $_POST['Imagen'];
			$SQL = "UPDATE especialidades SET 
				Nombre = '$Nombre',
				Descripcion = '$Descripcion',
				Imagen = '$Imagen'
				WHERE Id = '$Id'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}else{
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}
	}

	function Delete(){
		if ($_POST['Id']!="") {
			$Id = $_POST['Id'];
			$SQL = "DELETE FROM especialidades WHERE Id='$Id'";
			mysqli_query(conexion::obtenerInstancia(),$SQL);
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}else{
			header("Location: ".URL."Admin/especialidad.php");
			exit();
		}
	}
	//CUANDO EJECUTAR LA FUNCION PARA MOSTRAR LA LISTA DE FRUTAS
	if($_GET['solicitud'] == 'lista') {
		$resultado = MostrarFrutas();
	}else if ($_GET['solicitud']=='NuevaEspecialidad') {
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