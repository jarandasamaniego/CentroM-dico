<?php
	error_reporting( ~E_NOTICE );
	require_once 'dbcon.php';

	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];
		$description = $_POST['description'];
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if(empty($username)){
			$errMSG = "Por favor, introduzca el nombre de especialidad.";
		}
		else if(empty($description)){
			$errMSG = "Por favor, introduzca la descripción de especialidad.";
		}
		else if(empty($imgFile)){
			$errMSG = "Por favor, introduzca una imagen de la especialidad.";
		}
		else
		{
			$upload_dir = '../inicio/uploads/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions)){
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
				}
				else{
					$errMSG = "Lo sentimos, su archivo es demasiado grande para cargar. Debería ser menor que 5MB.";
				}
			}
			else{
				$errMSG = "Lo Sentimos, solo se permiten archivos de extensión. JPG, JPEG, PNG & GIF.";		
			}
		}
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO servicios(Nombre,Descripcion,Imagen) VALUES(:uname, :udes, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':udes',$description);
			$stmt->bindParam(':upic',$userprofile);	
			if($stmt->execute())
			{
				$successMSG = "Se agrego correctamente.";
				header("refresh:2; especialidad.php");
			}
			else
			{
				$errMSG = "Error While Creating.";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar Especialidad</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.3-jquery.min.js"></script>
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
		<div class="container-fluid">
			<div class="page-header"><hr>				
			  	<h1 class="text-titles">Sistema <small>Agregar</small></h1>
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
			<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin: 0 300px 0 300px;border: solid 1px;border-radius:10px">
				<table class="table table-responsive">
			    <tr>
			    	<td><label class="control-label">Especialidad: </label></td>
			        <td><input class="form-control" type="text" name="user_name" placeholder="Ingrese Especialidad"/></td>
			    </tr>
			    <tr>
			    	<td><label class="control-label">Descripción</label></td>
			        <td><input class="form-control" type="text" name="description" placeholder="Su Descripción"/></td>
			    </tr>
			    <tr>
			    	<td><label class="control-label">Imagen</label></td>
			        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
			    </tr>
			    <tr>
			        <td colspan="2" align="center"><button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Guardar</button>
			        </td>
			    </tr>
			    </table>
			</form>
		</div>
	</section>

</body>
</html>