<!DOCTYPE html>
<html lang="en" ng-app="Medico">
<head>
	<meta charset="UTF-8">
	<title>Centro Médico | Medicos</title>
	<link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body>
	<?php require_once('header-inicio.php'); ?>
	<div class="container">
		<h1 align="center">Horarios Médicos</h1><hr>
		<div class="container">
			<div class="input-group col-xs-9">   
		        <input type="text" class="form-control" placeholder="Ingresa el Nombre para Buscar" ng-model="Buscar.Nombre"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
		    </div><br>
		</div>		
		<div ng-controller="MisMedicos">
			<div class="col-xs-3" style="text-align: center; "ng-repeat="Medico in ListaMedicos | filter:Buscar | limitTo:10"  >
				<div class="panel panel-success" >
					<div class="panel-heading">
						<h4><strong>{{Medico.Nombre}}</strong></h4>
					</div>
					<div class="panel-body">								
					 	<p class="card-text"><strong>Especialidad: </strong>{{Medico.Especialidad}}</p>
					 	<p class="card-text"><strong>Teléfono: </strong>{{Medico.Telefono}}</p>
					 	<p class="card-text"><strong>Precio: </strong>
					 	{{Medico.Precio | currency:'s/. '}}</p>
					 	<p class="card-text"><strong>Horario: </strong>{{Medico.FechaAtencion}}</p>
					</div><hr>													
					<a class="btn btn-success" href="separar_cita.php?cita_id=<?php echo $info->Id; ?>"><span class="glyphicon glyphicon-plus-sign"></span> Separar Cita</a><br><br>
				</div>
			</div>
		</div>			
	</div>
	<script type="text/javascript">
		angular.module('Medico', []).controller('MisMedicos', function($scope, $http) {
			//URL QUE TIENE LOS DATOS EN FORMATO JSON
		    var url ="http://localhost:8080/CentroMedico/admin/API/medico/lista";
		    $http.get(url).then(function(res) {
		        $scope.ListaMedicos = res.data;
		        console.log(res.data);
		    });
		})
	</script>
	<?php 
		require_once 'footer.php';
	?>
</body>
</html>

	

