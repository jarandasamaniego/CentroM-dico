<?php
	require_once 'dbcon.php';
	if(isset($_GET['cita_id']) && !empty($_GET['cita_id']))
	{
		$id = $_GET['cita_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM medico WHERE Id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}

/*GENERADOR DE CODIGO DE ATENCION*/
	function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Agregar Cita</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	
	<link rel="icon" type="text/css" href="../img/1.png">
	
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/angular.min.js"></script>

    
</head>
<body>
	<?php include "include/header.php" ?>
	<div class="container"><hr>
		<div class="row">
			<div class="container">
				<div>
			    	<h1 class="h2">&nbsp; Agregar Cita 
			    		<span style="float: right; ">Código de Atención:
					 		<strong ><?php echo generarCodigo(6); ?></strong> 
					 	</span>	
			    	</h1><hr>

			    </div>
			    <?php
				if(isset($errMSG)){
					?>
			            <div class="alert alert-danger">
			            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
			            </div>
			        <?php
				}
				else if(isset($successMSG)){
					?>
			        <div class="alert alert-success">
			              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
			        </div>
			        <?php
				}
				?>
				<form method="POST" class="form-horizontal" action="add_citas.php">	
					<div class="col-xs-12" style=" text-align: center;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4><span style="float: left; margin-left: 200px">
										<strong>Datos del Médico </strong> 
									</span>|
									<span style="float: right; margin-right: 200px">
										<strong>Datos del Cliente</strong> 
									</span> 
								</h4>
							</div>
							<div class="panel-body">								
							 	<div class="col-md-6">
					      		<div class="datos-medico">			      			
							      	<tr>							    	
								    	<td><label>Nombre:</label></td>
								        <td><input readonly class="form-control" type="text" name="nombreapellidodoc" value="<?php echo ucfirst($Nombre)." ".ucfirst($Apellido); ?>"/></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">Especialidad:</label></td>
								        <td><input readonly class="form-control" type="text" name="especialidad" value="<?php echo $Especialidad; ?>" /></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">Teléfono:</label></td>
								        <td><input readonly class="form-control" type="text" name="telefonodoc" value="<?php echo $Telefono; ?>"/></td>
								    </tr><br>
								     <tr>
								    	<td><label class="control-label">Precio de la Consulta:</label></td>
								        <td><input readonly class="form-control" type="text" name="precio" value="<?php echo $Precio; ?>" /></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">Fecha Atención:</label></td>
								        <td><input readonly class="form-control" type="text" name="fecha" value="<?php echo $FechaAtencion; ?>"/>
								        </td>
								    </tr>
					      		</div>
					    	</div>
					    	<div class="col-md-6">
					      		<div class="card-body">
					        		
							       	<tr>
								    	<td><label class="control-label">Nombre:</label></td>
								        <td><input readonly class="form-control" type="text" name="nombre" value="<?php echo ucfirst($NombreCliente)?>"/></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">Apellido:</label></td>
								        <td><input readonly class="form-control" type="text" name="apellido" value="<?php echo ucfirst($ApellidoCliente)?>"></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">DNI:</label></td>
								        <td><input readonly class="form-control" type="text" name="dni" value="<?php echo $DNICliente?>" /></td>
								    </tr><br>
								    <tr>
								    	<td><label class="control-label">Teléfono:</label></td>
								        <td><input readonly class="form-control" type="text" name="telefono" value="<?php echo $TelefonoCliente?>" /></td>
								    </tr><br>						
							    
					      		</div>
					    	</div>	  				    		
							</div><hr>													
							<div class="agregar-cita">
				    			<td align="center">
									<button type="submit" name="btncita" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>Guardar</button>
						        	<a class="btn btn-danger" href="index.php"> <span class="glyphicon glyphicon-remove"></span>Cancelar</a>
						        </td>	
				    		</div><br>					
						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>

</body>
</html>

