<?php

include "conexion.php"
include "Formulario.php"

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$contraseña1 = $_POST['contraseña1'];
$contraseña2 = $_POST['contraseña2'];
$prefijo = $_POST['prefijo'];
$telefono = $_POST['telefono'];

$telefonoCompleto = concat("+" + $prefijo + " " + $telefono)

$select = SELECT pais FROM PREFIJOS WHERE prefijo = $prefijo;

$insert = "INSERT INTO PASAJERO 
			(nombre, apellido, sexo, email, contraseña1, contraseña2, prefijo, telefono) VALUES 
			($nombre, $apellidos, $sexo, $email, $contraseña1, $contraseña2, $select, $telefonoCompleto)"
?>