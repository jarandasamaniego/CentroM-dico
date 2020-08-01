<?php
	require_once 'dbcon.php';
	require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en" ng-app="Medico">
<head>
	<meta charset="UTF-8">
	<title>Admin | Medicos</title>
    <script type="text/javascript" src="../js/angular.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Centro Médico <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>			
			<?php require_once 'siderbar.php'; ?>
		</div>
	</section>
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<?php require_once'navbar.php' ?>
		<!-- Content page IMPORTANTE-->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">Sistema <small>Médico</small></h1>			  
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Lista de Médicos</a></li>
					  	<li><a href="#list" data-toggle="tab">Agregar</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container">
								<div class="input-group col-xs-8">   
						            <input type="text" class="form-control" placeholder="Ingresa el Nombre para Buscar" ng-model="Buscar.Nombre"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
						        </div>
							</div>
							<div class="table-responsive" ng-controller="MisMedicos">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Apellido</th>
											<th class="text-center">Telefono</th>
											<th class="text-center">Especialidad</th>
											<th class="text-center">Precio</th>
											<th class="text-center">Fecha de Atención</th>
											<th class="text-center" colspan="2">Acción</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="Medico in ListaMedicos | filter:Buscar | limitTo:5" class=" text-center">
											<td>{{Medico.Nombre}}</td>
											<td>{{Medico.Apellido}}</td>	
											<td>{{Medico.Telefono}}</td>
											<td>{{Medico.Especialidad}}</td>
											<td>{{Medico.Precio | currency:'s/. '}}</td>
											<td>{{Medico.FechaAtencion}}</td>
											<td>
												<a href="#" class="btn btn-success btn-raised btn-xs" data-toggle="modal" data-target="#myModal{{Medico.Id}}"><i class="zmdi zmdi-refresh"></i></a>
												<!-- Modal -->
												<div class="modal fade" id="myModal{{Medico.Id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Editando</h4>
												      </div>
												      <div class="modal-body">
												      	<form method="POST" action="http://localhost:8080/CentroMedico/admin/API/medico/actualizar">  
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Nombre del Médico:*</label>
										                        <input type="text" class="form-control" name="Nombre" value="{{Medico.Nombre}}">
										                        <input type="hidden" name="Id" value="{{Medico.Id}}">
										                    </div>
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Apellido del Médico:*</label>
										                        <input type="text" class="form-control" name="Apellido" value="{{Medico.Apellido}}">
										                        <input type="hidden" name="Id" value="{{Medico.Id}}">
										                    </div>
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Telefono del Médico:*</label>
										                        <input type="text" class="form-control" name="Telefono" value="{{Medico.Telefono}}" required>
										                        <input type="hidden" name="Id" value="{{Medico.Id}}" >
										                    </div>
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Especialidad del Médico:*</label>
										                        <input type="text" class="form-control" name="Especialidad" value="{{Medico.Especialidad}}">
										                        <input type="hidden" name="Id" value="{{Medico.Id}}">
										                    </div>
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Precio:*</label>
										                        <input type="text" class="form-control" name="Precio" value="{{Medico.Precio}}">
										                        <input type="hidden" name="Id" value="{{Medico.Id}}">
										                    </div>
										                    <div class="form-group">    
										                        <label for="exampleInputEmail1"  style="float: left;">Fecha de Ateción:*</label>
										                        <input type="date" class="form-control" name="FechaAtencion" value="{{Medico.FechaAtencion}}">
										                        <input type="hidden" name="Id" value="{{Medico.Id}}">
										                    </div>
										                    <button type="submit"class="btn btn-success">Guardar</button>
										        			<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
										                </form>
												      </div>
												    </div>
												  </div>
												</div>
												<!--FIN MODAL-->
											</td>
											<td>
												<!--INICIO MODAL-->
												<a href="#" class="btn btn-danger btn-raised btn-xs" data-toggle="modal" data-target="#myModal{{Medico.Id+1}}"><i class="zmdi zmdi-delete"></i></a>
												<!-- Modal-->
												<div class="modal fade" id="myModal{{Medico.Id+1}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
												      </div>
												      <div class="modal-body">
												        ¿Desea eliminar al Medico, <b>{{Medico.Nombre}}</b>?
												      </div>
												      <div class="modal-footer">
												        <div class="text-center">
												        	<form method="POST" action="http://localhost:8080/CentroMedico/admin/API/medico/eliminar">
												        		<input type="hidden" value="{{Medico.Id}}" name="Id">
												        		<button type="submit" class="btn btn-danger">SI</button>
												        		<button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
												        	</form>	        	
												        </div>
												      </div>
												    </div>
												  </div>
												</div>
												<!--FIN MODAL-->
											</td>
										</tr>										
									</tbody>
								</table>
							</div>
						</div>
					  	<div class="tab-pane fade" id="list">
					  		<div class="container-fluid">
								<div class="row">
									<div  class="col-xs-12 col-md-10 col-md-offset-1">
									    <form method="POST" action="http://localhost:8080/CentroMedico/admin/API/medico/NuevaMedico">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text" name="Nombre" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Apellido</label>
											  <input class="form-control" type="text" name="Apellido">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Telefono</label>
											  <input class="form-control" type="text" name="Telefono">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Especialidad</label>
											  <input class="form-control" type="text" name="Especialidad">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Precio</label>
											  <input class="form-control" type="text" name="Precio">
											</div>
											<div class="form-group">
											  <label class="control-label">Fecha de Atecion</label>
											  <input class="form-control" type="date" name="FechaAtencion" required>
											</div>									
										    <p class="text-center">
										    	<button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	<!--====== Scripts -->
	<?php require_once 'scripts.php' ?>
</body>
</html>