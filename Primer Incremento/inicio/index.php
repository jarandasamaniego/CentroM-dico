<!DOCTYPE html>
<html lang="en" ng-app="Medico">
<head>
	<meta charset="UTF-8">
	<title>Centro Médico | Especialidades</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/angular.min.js"></script>
</head>
<body>
	<?php require_once('include/header.php'); ?>
	<div class="container">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  	<!-- Indicators -->
		  	<ol class="carousel-indicators">
		    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="4"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="5"></li>
		  	</ol>
		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox" style="height: 420px !important">
			    <div class="item active">
			    	<img src="../img/1.png" style="height: 420px !important; width: 100%">
			    </div>
			    <div class="item">
			      	<img src="../img/2.png" style="height: 420px !important; width: 100%">
			    </div>
			    <div class="item">
			      	<img src="../img/3.png" style="height: 420px !important; width: 100%">
			    </div>
			    <div class="item">
			      	<img src="../img/4.png" style="height: 420px !important; width: 100%">
			    </div>
			    <div class="item">
			      	<img src="../img/5.png" style="height: 420px !important; width: 100%">
			    </div>
			</div>

		  	<!-- Controls -->
		  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">		    
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">		    
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>
		<h1 align="center">Especialidades</h1><hr>
		<div class="container">
			<div class="input-group col-xs-9">   
		        <input type="text" class="form-control" placeholder="Ingresa el Nombre de la Especialidad para Buscar" ng-model="Buscar.Nombre"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
		    </div><br>
		</div>		
		<div ng-controller="MisMedicos">
			<div class="col-xs-3" style="text-align: center; "ng-repeat="Medico in ListaMedicos | filter:Buscar | limitTo:10"  >
				<div class="panel panel-primary" >
					<div class="panel-heading">
						<h5>{{Medico.Nombre}}</h5>
					</div>
					<div class="panel-body">								
					 	<img src="../inicio/uploads/{{Medico.Imagen}}" class="img-rounded" width="200px" height="200px" /><hr>
						<p class="card-text">{{Medico.Descripcion}}</p>
					 	
					</div>
				</div>
			</div>
		</div>			
	</div>
	<script type="text/javascript">
		angular.module('Medico', []).controller('MisMedicos', function($scope, $http) {
			//URL QUE TIENE LOS DATOS EN FORMATO JSON
		    var url ="http://localhost:8080/CentroMedico/admin/API/especialidad/lista";
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


