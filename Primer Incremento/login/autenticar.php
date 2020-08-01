<?php 
	$usuario = $_POST['usuario'];
	$password =  $_POST['password'];
	require_once("../config.php");
	require_once("../inicio/API/validacion.php");
	$obj = new Validar();
	$validar = $obj->ValidarLogin($usuario,$password);
?>