<!--Validación-->
<?php 
require_once("../config.php");
require_once("../admin/API/validacion.php");
    if (!isset($_SESSION["login-admin"])) {
        $error = "Usted No esta Logueado";
        header("Location: redireccionar.php?Error=".$error);
        exit;
    }
    $IdUsuario = $_SESSION["login-admin"];

?>
<!-- SideBar User info -->
<div class="full-box dashboard-sideBar-UserInfo">
	<figure class="full-box">
		<img src="assets/img/login.png" alt="UserIcon">
		<figcaption class="text-center text-titles">Nombre Usuario</figcaption>
	</figure>
	<ul class="full-box list-unstyled text-center">
		<li>
			<a href="#!">
				<i class="zmdi zmdi-settings"></i>
			</a>
		</li>
		<li>
			<a href="#" class="btn-exit-system">
				<i class="zmdi zmdi-power"></i>
			</a>
		</li>
	</ul>
</div>
<!-- SideBar Menu -->
<ul class="list-unstyled full-box dashboard-sideBar-Menu">
	<li>
		<a href="especialidad.php">
			<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
		</a>
	</li><!--
	<li>
		<a href="#!" class="btn-sideBar-SubMenu">
			<i class="zmdi zmdi-case zmdi-hc-fw"></i> Especialidades <i class="zmdi zmdi-caret-down pull-right"></i>
		</a>
		<ul class="list-unstyled full-box">
			<?php
				$stmt = $DB_con->prepare('SELECT Id, Nombre, Descripcion, Imagen FROM especialidades ORDER BY Id DESC');
				$stmt->execute();
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>	
					<li>
						<a href="period.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> <?php echo $Nombre;?></a>
					</li>					     
					<?php
				}
			}
			else
			{
				?>
				<div class="col-xs-12">
					<div class="alert alert-danger">
						<span class="glyphicon glyphicon-info-sign"></span>&nbsp; No hay registros encontrados.
					</div>
				</div>
				<?php
			}
			?>

		</ul>
	</li>-->
	<li>
		<a href="citas.php" class="btn-sideBar-SubMenu">
			<i class="zmdi zmdi-calendar zmdi-hc-fw"></i> Citas 
		</a>		
	</li>
	<!--<li>
		<a href="#!" class="btn-sideBar-SubMenu">
			<i class="zmdi zmdi-calendar zmdi-hc-fw"></i> Citas <i class="zmdi zmdi-caret-down pull-right"></i>
		</a>
		<ul class="list-unstyled full-box">
			<li>
				<a href="../" target="_blank"><i class="zmdi zmdi-eye zmdi-hc-fw"></i> Ver</a>
			</li>
			<li>
				<a href="add-citas.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Añadir</a>
			</li>
		</ul>
	</li>-->
	<li>
		<a href="medicos.php" class="btn-sideBar-SubMenu">
			<i class="zmdi zmdi-account-o zmdi-hc-fw"></i> Medicos 
		</a>		
	</li>		
</ul>