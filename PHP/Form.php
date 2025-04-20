<?php
// Recoger datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$gmail = $_POST['gmail'] ?? '';
$contraseña1 = $_POST['contraseña1'] ?? '';
$contraseña2 = $_POST['contraseña2'] ?? '';
$prefijo = $_POST['prefijo'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';

// Validar contraseñas
if ($contraseña1 !== $contraseña2) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// Ejecutar XQuery con BaseX
$comando = sprintf(
    'basex -bnombre=%s -bapellidos=%s -bsexo=%s -bgmail=%s -btelefono=%s -bpublicidad=%s ../XQUERY/XQueryAlta.xq',
    escapeshellarg($nombre),
    escapeshellarg($apellidos),
    escapeshellarg($sexo),
    escapeshellarg($gmail),
    escapeshellarg($prefijo . $telefono),
    escapeshellarg($publicidad)
);

$output = shell_exec($comando);

// Verifica si BaseX devolvió algo
if (!$output) {
    echo "<pre>Comando BaseX: $comando</pre>";

    echo "Error al ejecutar el comando BaseX.";
    exit;
}

// Cargar el XML desde el output
$xml = new DOMDocument();
$xml->loadXML($output);

// Cargar el archivo XSLT
$xsl = new DOMDocument();
$xsl->load('../XSLT/Usuarios.xsl');

// Procesar la transformación con XSLTProcessor
$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);

// Transformar y mostrar como HTML
echo $xslt->transformToXML($xml);
?>
