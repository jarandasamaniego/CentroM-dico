<?php 
require_once("../config.php");
require_once("API/validacion.php");
    if (!isset($_SESSION["login-tienda"])) {
        $error = "Usted No esta Logueado";
        header("Location: ../redireccionar.php?Error=".$error);
        exit;
    }
    $IdUsuario = $_SESSION["login-tienda"];
    require_once("API/datos.php");
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="../img/logo.png" width="150px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav"><br>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="medico.php">Medico</a></li>
        <li><a href="cita_cliente.php">Citas</a></li>
      </ul><br>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="modal" data-target="#Login"> 
            	<span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($NombreCliente)." ".ucfirst($ApellidoCliente)?>
            </a>                  
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal Login Usuario-->
	<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div style="text-align: center;">
              <span class="glyphicon glyphicon-off" style="font-size: 80px; padding: 30px 0px 30px;"></span>
              <h4>¿Estas seguro de <strong>Cerrar Sesión</strong>?</h4><hr>

              <a href="../login/salir.php"><button type="submit" class="btn btn-success"  style="width: 100px; height: 40px">Salir</button></a> 
            </div>
	      	</div>
	      </div>
	    </div>
	</div>