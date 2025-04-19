<?php
$username="root";
$password="abcd*1234";
$database="AGENCIA_VIAJES";
$con=mysqli_connect("localhost",$username, $password, $database);
// Comprueba conexión
if (mysqli_connect_errno())
  {
  echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  }
?>