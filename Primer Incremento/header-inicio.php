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
      <a class="navbar-brand" href="./"><img src="img/logo.png" width="150px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav"><br>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="medico.php">Medicos</a></li>
      </ul><br>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="modal" data-target="#Login"> 
            	<span class="glyphicon glyphicon-user"></span> Login
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
	        	<div class="alert alert-success">
					<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Iniciar Sesión</h4>
				</div>
	      	</div>
	      	<div class="modal-body">
	        <form method="POST" action="login/autenticar.php">  
                <div class="form-group">    
					<label>Usuario</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="usuario">  
				</div>
                <div class="form-group">    
					<label>Password</label>    
					<input type="password" class="form-control" placeholder="Ingrese" name="password">  
				</div> 

				<h4>¿No tienes una cuenta? Registrese<a href="#" data-toggle="modal" data-target="#Registrar"> Aquí </a> </h4>

				<button type="submit" class="btn btn-primary">Acceder</button>   
            </form>
	      	</div>
	      </div>
	    </div>
	</div>

	<!-- Modal Registro Usuario-->
	<div class="modal fade" id="Registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="alert alert-success">
					<h4 class="modal-title" id="myModalLabel">Registrar Cliente</h4>
				</div>
	      	</div>
	      	<div class="modal-body">
	        <form method="POST" action="login/registrar.php">  
                <div class="form-group">    
					<label>Nombre</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="nombre" required>  
				</div>
                <div class="form-group">    
					<label>Apellido</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="apellido" required>  
				</div> 
				<div class="form-group">    
					<label>DNI</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="dni">  
				</div>
                <div class="form-group">    
					<label>Teléfono</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="telefono">  
				</div>
				<div class="form-group">    
					<label>Usuario</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="usuario">  
				</div>
                <div class="form-group">    
					<label>Password</label>    
					<input type="text" class="form-control" placeholder="Ingrese" name="password">  
				</div>
				<button type="submit" class="btn btn-primary">Registrar</button>   
            </form>
	      	</div>
	      </div>
	    </div>
	</div>
	