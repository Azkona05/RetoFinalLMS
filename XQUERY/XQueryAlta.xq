declare variable $nombre external;
declare variable $apellidos external;
declare variable $sexo external;
declare variable $gmail external;
declare variable $telefono external;
declare variable $publicidad external;

(: Cargar el documento :)
declare variable $doc := doc("C:/xampp/htdocs/RETO/XML/RetoFinal.xml");

(: Crear el nuevo usuario :)
let $nuevo :=
  <usuario sexo="{$sexo}">
    <nombre>{$nombre}</nombre>
    <apellido>{$apellidos}</apellido>
    <clave>clave123</clave>
    <numTel>{$telefono}</numTel>
    <contacto>
      <correo>{$gmail}</correo>
    </contacto>
    <publicidad>{$publicidad}</publicidad>
  </usuario>

(: Insertar el nodo y devolver el nuevo contenido :)
return (
  "<?xml version='1.0' encoding='UTF-8'?>",
  "<?xml-stylesheet type='text/xsl' href='../XSLT/Usuarios.xsl'?>",
  copy $c := $doc
  modify (
    insert node $nuevo into $c/agenciaViajes/usuarios
  )
  return $c/agenciaViajes/usuarios
)
