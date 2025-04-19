<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $nombre = htmlspecialchars($_POST["nombre"]);
    } else {
        echo "<script> alert('ERROR! Introduce un nombre'); </script>";
    }
    if (empty($_POST["apellidos"])) {
        $apellido = htmlspecialchars($_POST["apellidos"]);
    } else {
        echo "<script> alert('ERROR! Introduce un apellido'); </script>";
    }
    if (empty($_POST["sexo"])) {
        $sexo = htmlspecialchars($_POST["sexo"]);
    } else {
        echo "<script> alert('ERROR! Introduce un sexo'); </script>";
    }
    if (empty($_POST["email"])) {
       $email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
    } else {
        echo "<script> alert('ERROR! Introduce un email'); </script>";
    }
    if (empty($_POST["contraseña1"])) {
        $contraseña1 = htmlspecialchars($_POST["contraseña1"]);
    } else {
        echo "<script> alert('ERROR! Introduce una contraseña'); </script>";
    }
    if (empty($_POST["contraseña2"])) {
        $contraseñ2 = htmlspecialchars($_POST["contraseña2"]);
    } else {
        echo "<script> alert('ERROR! Introduce una contraseña de confirmación'); </script>";
    }
    if (empty($_POST["prefijo"])) {
        $prefijo = htmlspecialchars($_POST["prefijo"]);
    } else {
        echo "<script> alert('ERROR! Introduce un prefijo'); </script>";
    }
    if (empty($_POST["telefono"])) {
        $telefono = htmlspecialchars($_POST["telefono"]);
    } else {
        echo "<script> alert('ERROR! Introduce un teléfono'); </script>";
    }
}
