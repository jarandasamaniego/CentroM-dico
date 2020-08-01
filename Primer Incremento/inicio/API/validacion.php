<?php 
require_once("core.php");
class Validar{
	public function ValidarLogin($usuario,$password){
		$sql = "SELECT * FROM clientes WHERE Usuario='$usuario' and Password='$password'";
		$res = mysqli_query(conexion::obtenerInstancia(),$sql);
		if (mysqli_num_rows($res) == 0) {
			$error = "Sus datos son incorrectos";
			header("Location: ../redireccionar.php?Error=".$error);
		}else{
			if ($reg=mysqli_fetch_array($res)) {
				$_SESSION["login-tienda"]=$reg["Id"];
				header("Location: ../inicio/");
			}
		}
	}
}

?>