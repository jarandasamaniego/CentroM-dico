<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Redireccionar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .fondo{
      	background:rgb(140, 221, 250);
      }
    	.container1{
    		width: 30%;
    		margin:200px auto;
    	}
    </style>
  </head>
  <body class="fondo">
    <div class="container1">
  		<div class="alert alert-danger" role="alert">
      <?php 
        if (isset($_GET['Error'])) {
      ?>
        <center>
         <h4><b><?php echo $_GET['Error']; ?></b></h4>
        </center>
        <center>
         <a class="btn btn-success " href="./">Iniciar Sesión</a> || 
         <a class="btn btn-info " href="../">Ir A La Página Principal</a>
        </center>
      <?php   
        } else {
      ?>
        <script type='text/javascript'> 
          window.location='index.php'; 
        </script>
      <?php 
        }
      ?>
  		</div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
