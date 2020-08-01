<?php 
require_once("core.php");
class Validar{
	public function ValidarAdmin($usuarioAdmin,$passwordAdmin){
		$sql = "SELECT * FROM admin WHERE Username='$usuarioAdmin' and Password='$passwordAdmin'";
		$res = mysqli_query(conexion::obtenerInstancia(),$sql);
		if (mysqli_num_rows($res) == 0) {
			$error = "Sus datos son incorrectos";
			header("Location: ../redireccionar.php?Error=".$error);
		}else{
			if ($reg=mysqli_fetch_array($res)) {
				$_SESSION["login-admin"]=$reg["Id"];
				header("Location: ../especialidad.php");
			}
		}
	}
}

?>