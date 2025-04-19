<?php
// Recibir los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$gmail = $_POST['gmail'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';

// Construir el comando para ejecutar el XQuery en BaseX
$comando = sprintf(
    'basex -bnombre="%s" -bapellidos="%s" -bsexo="%s" -bgmail="%s" -btelefono="%s" -bpublicidad="%s" ../XQuery/XQueryAlta.xq',
    escapeshellarg($nombre),
    escapeshellarg($apellidos),
    escapeshellarg($sexo),
    escapeshellarg($gmail),
    escapeshellarg($telefono),
    escapeshellarg($publicidad)
);

// Depuración: Mostrar el comando que se va a ejecutar
echo "<pre>";
echo "Comando BaseX: $comando";
echo "</pre>";

// Ejecutar el comando de XQuery en BaseX
$output = shell_exec($comando);

// Verificar si el comando se ejecutó correctamente
if ($output === null) {
    echo "Error al ejecutar BaseX. Asegúrate de que BaseX está instalado correctamente y en el PATH.";
} else {
    echo "<pre>";
    echo "Salida de BaseX: " . htmlspecialchars($output); // Imprimir la salida de BaseX
    echo "</pre>";
}
// Cargar el XML generado por BaseX
$xml = new DOMDocument();
$xml->loadXML($output);  // $output es la salida de BaseX

// Verificar si el XML se cargó correctamente
if (!$xml) {
    echo "Error al cargar el XML.";
    exit;
}

// Cargar el archivo XSLT
$xsl = new DOMDocument();
$xsl->load('../XSLT/Usuarios.xsl');  // Cambia a la ruta correcta

// Verificar si el XSLT se cargó correctamente
if (!$xsl) {
    echo "Error al cargar el XSLT.";
    exit;
}

// Configurar el procesador XSLT
$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);  // Importar el XSLT

// Aplicar la transformación
$html = $xslt->transformToXML($xml);

// Verifica si la transformación fue exitosa
if (!$html) {
    echo "Error al aplicar la transformación XSLT.";
    exit;
}

// Mostrar el HTML resultante
echo $html;

?>
