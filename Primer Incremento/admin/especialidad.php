<?php
	require_once 'dbcon.php';
	require_once '../config.php';
    $url = "http://localhost:8080/CentroMedico/admin/API/especialidad/lista";
	$procesar = file_get_contents($url);
	$json = json_decode($procesar);	
?>
<!DOCTYPE html>
<html lang="en" ng-app="Medico">
<head>
	<title>Especialidad</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="../js/angular.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			  	<h1 class="text-titles">Sistema <small>Especialidades</small>
			  	<a href="add-especialidad.php" class="btn btn-primary" style="margin-left: 60%"  ><span class="glyphicon glyphicon-pencil"></span>&nbsp; Agregar</a>
				<!-- Modal 
				<div class="modal fade" id="myModal{{Medico.Id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    data-toggle="modal" data-target="#myModal"
				  	<div class="modal-dialog" role="document">
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        	<h4 class="modal-title text-center" id="myModalLabel">Agregar Especialdiad</h4>
					      	</div>
					      	<div class="modal-body">
					      		<div class="container-fluid">
									<div class="row">
										<div  class="col-xs-12 col-md-10 col-md-offset-1">
										    <form method="POST" enctype="multipart/form-data">
										    	<div class="form-group label-floating">
												  <label class="control-label">Nombre</label>
												  <input class="form-control" type="text" name="user_name">
												</div>
												<div class="form-group label-floating">
												  <label class="control-label">Descripción</label>
												  <input class="form-control" type="text" name="description">
												</div>
												<div class="form-group">
											      <label class="control-label">Imagen</label>
											      <div>
											        <input type="text" readonly="" class="form-control" placeholder="Buscar...">
											        <input type="file" name="user_image">
											      </div>
											    </div>								
											    <p class="text-center">
											    	<button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy" name="btnsave"></i> Guardar</button>
											    </p>
										    </form>
										</div>
									</div>
								</div>
					      	</div>
					    </div>
				  	</div>
				</div>-->
			  	</h1>			  
			</div>
			<div class="container">
				<div class="input-group col-xs-9">   
			        <input type="text" class="form-control" placeholder="Ingresa el Nombre de la Especialidad para Buscar" ng-model="Buscar.Nombre"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			    </div>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;" ng-controller="MisMedicos">
			<div class="col-xs-4" ng-repeat="Medico in ListaMedicos | filter:Buscar | limitTo:10">	
				<article class="full-box tile">
					<div class="full-box tile-title text-center text-titles text-uppercase">
						{{Medico.Nombre}}
					</div>
					<div class="full-box tile-number text-titles">
						<br><br>
						<small>{{Medico.Descripcion}}</small>
					</div>
					<div class="full-box tile-icon text-center"><br>
						<img src="../inicio/uploads/{{Medico.Imagen}}" width="200px" height="110px" /><hr>
					</div>					
					<div>
						<p class="page-header" align="center">
							<span>							
							<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{Medico.Id}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>							
							<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{Medico.Id+1}}"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
							<!-- Modals-->
							<!--INICIO MODAL-->
							<!-- Modal -->
							<div class="modal fade" id="myModal{{Medico.Id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Editando</h4>
							      </div>
							      <div class="modal-body">
							      	<form method="POST" action="http://localhost:8080/CentroMedico/admin/API/especialidad/actualizar" enctype="multipart/form-data">
					                    <div class="form-group">    
					                        <label for="exampleInputEmail1"  style="float: left;">Nombre:*</label>
					                        <input type="text" class="form-control" name="user_name" value="{{Medico.Nombre}}" required>
					                        <input type="hidden" name="Id" value="{{Medico.Id}}">
					                    </div>
					                    <div class="form-group">    
					                        <label for="exampleInputEmail1"  style="float: left;">Descripción:*</label>
					                        <input type="text" class="form-control" name="description" value="{{Medico.Descripcion}}">
					                        <input type="hidden" name="Id" value="{{Medico.Id}}">
					                    </div>
					                    <div>    
					                        <label for="exampleInputEmail1"  style="float: left;">Imagen:*</label>		 
					          				<img src="../inicio/uploads/{{Medico.Imagen}}" height="100" width="150" style="border: solid 1px; border-radius:10px"/>
										    <input class="" type="file" name="user_image" accept="image/*"/>
					                    </div>
					                    <button type="submit"class="btn btn-success" name="btn_save_updates">Guardar</button>
					        			<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					                </form>
							      </div>
							    </div>
							  </div>
							</div>
							<!--FIN MODAL-->

							<!--INICIO MODAL-->
							<div class="modal fade" id="myModal{{Medico.Id+1}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
							      </div>
							      <div class="modal-body">
							        ¿Desea eliminar la especialidad, <b>{{Medico.Nombre}}</b>?
							      </div>
							      <div class="modal-footer">
							        <div class="text-center">
							        	<form method="POST" action="http://localhost:8080/CentroMedico/admin/API/especialidad/eliminar">
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
							</span>
						</p>
					</div>								
				</article>       
			</div>		
		</div>		
	</section>
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
	<!--====== Scripts -->
	<?php require_once 'scripts.php' ?>
</body>
</html>