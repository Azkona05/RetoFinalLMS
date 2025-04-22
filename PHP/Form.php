<?php
$dni = $_POST['dni'] ?? '';
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

// Validar formato del DNI
if (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
    echo "El DNI no tiene un formato válido (8 números y 1 letra).";
    exit;
}

// Validar que la letra del DNI sea correcta
function letraDNI($dni) {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $numero = substr($dni, 0, 8);
    $letra = strtoupper(substr($dni, -1));
    $letraCorrecta = $letras[$numero % 23];
    return $letra === $letraCorrecta;
}

if (!letraDNI($dni)) {
    echo "La letra del DNI no es válida.";
    exit;
}

// Cargar el XML y el XSLT
$xmlFile = '../XML/RetoFinalXML.xml'; // Ajusta la ruta a tu carpeta XML
$xslFile = '../XSLT/usuarios.xsl';

//Cargar el XSL y el XML
$xsl = new DOMDocument();
$xsl->load($xslFile);
$xml = new DOMDocument();
$xml->load($xmlFile);

$xpath = new DOMXPath($xml);
$usuariosExistentes = $xpath->query("//usuario[@dni='$dni']");

if ($usuariosExistentes->length > 0) {
    echo "El DNI ya está registrado. Por favor, utiliza otro.";
    exit;
}
// Buscar el nodo <usuarios>
$usuarios = $xml->getElementsByTagName('usuarios')->item(0);

// Crear nuevo nodo <usuario>
$usuario = $xml->createElement('usuario');
$usuario->setAttribute('sexo', $sexo);
$usuario->setAttribute('dni', $dni);

// Subnodos
$usuario->appendChild($xml->createElement('nombre', $nombre));
$usuario->appendChild($xml->createElement('apellido', $apellidos));
$usuario->appendChild($xml->createElement('clave', $contraseña1));
$usuario->appendChild($xml->createElement('numTel', $prefijo . $telefono));

$contacto = $xml->createElement('contacto');
$contacto->appendChild($xml->createElement('correo', $gmail));
$usuario->appendChild($contacto);

$usuario->appendChild($xml->createElement('publicidad', $publicidad));

// Añadir a <usuarios>
$usuarios->appendChild($usuario);

// Guardar
$xml->formatOutput = true;
$xml->save($xmlFile);

$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);

echo $proc->transformToXML($xml);
?>
