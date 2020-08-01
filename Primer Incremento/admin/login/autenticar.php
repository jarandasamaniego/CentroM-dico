<?php 
	$usuarioAdmin = $_POST['usuarioAdmin'];
	$passwordAdmin =  $_POST['passwordAdmin'];
	require_once("../../config.php");
	require_once("../API/validacion.php");
	$obj = new Validar();
	$validar = $obj->ValidarAdmin($usuarioAdmin,$passwordAdmin);
?>