<?php
session_start();
 unset($_SESSION["login-tienda"]);
  session_destroy();
  //devuelvo al usuario al formulario
  header("Location: ../");
  /*
  echo "<script type='text/javascript'> window.location='index.php'; </script>'";
  */
?>