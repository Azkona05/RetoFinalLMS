declare variable $nombre external;
declare variable $apellidos external;
declare variable $sexo external;
declare variable $gmail external;
declare variable $telefono external;
declare variable $publicidad external;

let $nuevo :=
  <usuario>
    <nombre>{$nombre}</nombre>
    <apellidos>{$apellidos}</apellidos>
    <sexo>{$sexo}</sexo>
    <correo>{$gmail}</correo>
    <telefono>{$telefono}</telefono>
    <publicidad>{$publicidad}</publicidad>
  </usuario>

return (
  "<?xml version='1.0' encoding='UTF-8'?>",
  "<?xml-stylesheet type='text/xsl' href='../XSLT/Usuarios.xsl'?>",
  $nuevo
)
