<?php
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'proyecto';	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	/*if (isset($_POST['loginAdmin'])){
	$username=$_POST['nombre'];
	$password=$_POST['password'];
	$fetch=$DB_con->prepare("select * from admin where Username='$username' and Password='$password'")or die(mysql_error());
	$fetch->execute(array($username,$password));
	$count=$fetch->rowcount();
	$row=$fetch->fetch();	
	if ($count > 0){
		session_start();
		
		$_SESSION['login-admin'] = $row['Id'];
		header('location:admin.php');
		session_write_close();
		}
		else{
			echo "<script>alert('El usuario o la contrasenia son invalidas.')</script>";
		}
	}*/
?>

