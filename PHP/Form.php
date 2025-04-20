<?php
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$gmail = $_POST['gmail'] ?? '';
$contraseña1 = $_POST['contraseña1'] ?? '';
$contraseña2 = $_POST['contraseña2'] ?? '';
$prefijo = $_POST['prefijo'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';

if ($contraseña1 !== $contraseña2) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// Inserción del nuevo usuario
$insertCommand = sprintf(
    'basex -bnombre=%s -bapellidos=%s -bsexo=%s -bgmail=%s -btelefono=%s -bpublicidad=%s ../XQUERY/InsertarUsuario.xq',
    escapeshellarg($nombre),
    escapeshellarg($apellidos),
    escapeshellarg($sexo),
    escapeshellarg($gmail),
    escapeshellarg($prefijo . $telefono),
    escapeshellarg($publicidad)
);
shell_exec($insertCommand);

// Mostrar todos los usuarios (tras la inserción)
$mostrarCommand = 'basex ../XQUERY/MostrarUsuarios.xq';
$output = shell_exec($mostrarCommand);

if (!$output) {
    echo "Error al obtener la lista de usuarios.";
    exit;
}

// Transformar XML con XSLT
$xml = new DOMDocument();
$xml->loadXML($output);

$xsl = new DOMDocument();
$xsl->load('../XSLT/Usuarios.xsl');

$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);

echo $xslt->transformToXML($xml);
?>
