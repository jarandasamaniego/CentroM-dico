<?php
	require_once '../../dbcon.php';	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT Nombre, Descripcion, Imagen FROM especialidades WHERE Id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];
		$description = $_POST['description'];		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if($imgFile)
		{
			$upload_dir = '../../uploads/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['Imagen']);
					move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
				}
				else
				{
					$errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
			}	
		}
		else
		{
			$userprofile = $edit_row['Imagen'];
		}
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE especialidades SET Nombre=:uname, Descripcion=:udes, Imagen=:upic WHERE Id=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':udes',$description);
			$stmt->bindParam(':upic',$userprofile);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated...');
				window.location.href='../';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry User Could Not Be Updated!";
			}
		}			
	}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editar Especialidad</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../complemento/css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="../../jquery-1.11.3-jquery.min.js"></script>
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
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<div class="container-fluid">
			<div class="page-header"><hr>				
			  	<h1 class="text-titles">Sistema <small>Editar</small></h1>
			</div>
			<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin: 0 300px 0 300px;border: solid 1px;border-radius:10px">
			    <?php
				if(isset($errMSG)){
					?>
			        <div class="alert alert-danger">
			          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
			        </div>
			        <?php
				}
				?>
				<table class="table table-responsive">
			    <tr>
			    	<td><label class="control-label">Nombre:</label></td>
			        <td><input class="form-control" type="text" name="user_name" value="<?php echo $Nombre; ?>" required /></td>
			    </tr>
			    <tr>
			    	<td><label class="control-label">Descripción:</label></td>
			        <td><input class="form-control" type="text" name="description" value="<?php echo $Descripcion; ?>" required /></td>
			    </tr>
			    <tr>
			    	<td><label class="control-label">Imagen:</label></td>
			        <td>
			        	<p><img src="../../uploads/<?php echo $Imagen; ?>" height="150" width="150" style="border: solid 1px;border-radius:10px"/></p>
			        	<input class="" type="file" name="user_image" accept="image/*"/>
			        </td>
			    </tr>
			    <tr>
			        <td colspan="2" align="center">
					<button type="submit" name="btn_save_updates" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>Guardar</button>
			        <a class="btn btn-warning" href="../"> <span class="glyphicon glyphicon-remove"></span>Cancelar</a>
			        </td>
			    </tr>
			    </table>
			</form>
		</div>
	</section>
</body>
</html>