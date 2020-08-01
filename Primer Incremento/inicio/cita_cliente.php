<?php 
	require_once("../config.php");
	require_once("API/validacion.php");
	    if (!isset($_SESSION["login-tienda"])) {
	        $error = "Usted No esta Logueado";
	        header("Location: ../redireccionar.php?Error=".$error);
	        exit;
	    }
?>
<!DOCTYPE html>
<html lang="en" ng-app="Medico">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sus Citas</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="icon" type="text/css" href="img/1.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/angular.min.js"></script>
</head>
<body>
	<?php include "include/header.php" ?>
	<div class="container">
		<h1 align="center"> Citas </h1>
		<div class="page-header">
	    	<h1 class="h2">&nbsp; <strong> Cliente: </strong> <?php echo ucfirst($NombreCliente)." ".ucfirst($ApellidoCliente)?> </h1>
	    </div>
	    <div class="container">
			<div class="input-group col-xs-9">   
		        <input type="text" class="form-control" placeholder="Ingresa la Especialidad para Buscar" ng-model="Buscar.EspecialidadDoc"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
		    </div><br>
		</div>
		<div class="row"  ng-controller="MisMedicos">

			<div class="col-xs-3"ng-repeat="Medico in ListaMedicos | filter:Buscar | limitTo:10"  >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><strong>Datos del Doctor</strong></h4>						 
						$Estado = "{{Medico.Estado}}";					 
						<?php 
						
						if ($Estado=='Pagado') {	
								?>
								<!-- Contenedor Boton Abrir Formulario -->
								<div class="contenedor-btn">
									<a href="#">
										<button class="btn-pagado">
										<span class="glyphicon glyphicon-check"></span>
									</button></a>
								</div>

							<?php 
							}else{
								?>					
								<!-- Contenedor Boton Abrir Formulario -->
								<div class="contenedor-btn">
									<a href="tarjeta/index.php?pago_id={{Medico.Id}}">
										<button class="btn-abrir-formulario" id="btn-abrir-formulario">
										<span class="glyphicon glyphicon-usd"></span>
									</button></a>
								</div>	
								<?php 
							}						
						?>
						  
					</div>
					<div class="panel-body">							
					 	<p class="card-text"><strong>Nombre: </strong>
				  			{{Medico.NombreApellidoDoc}}</p>
				  		<p class="card-text"><strong>Especialidad: </strong>
				  			{{Medico.EspecialidadDoc}}</p>
				  		<p class="card-text"><strong>Teléfono: </strong>
				  			{{Medico.TelefonoDoc}}</p>	
				  		<p class="card-text"><strong>Costo de la Cita: </strong>
				  			{{Medico.Precio  | currency:'s/. '}} </p>
				  		<hr>										
				    	<h3 class="card-title" style="text-align: center;">
				    		<strong>{{Medico.FechaCita}}</strong>
				    	</h3>
				  	</div>
				</div>
			</div>									     
	
			
		</div>
	</div>
	<script type="text/javascript">
		angular.module('Medico', []).controller('MisMedicos', function($scope, $http) {
			//URL QUE TIENE LOS DATOS EN FORMATO JSON
		    var url = "http://localhost:8080/CentroMedico/admin/API/citas/lista";
		    $http.get(url).then(function(res) {
		        $scope.ListaMedicos = res.data;
		        console.log(res.data);
		    });
		})
	</script>

	<?php 
		require_once 'include/footer.php';
	?>
</body>
</html>