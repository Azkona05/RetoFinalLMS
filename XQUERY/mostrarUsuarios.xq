declare variable $doc := doc("RetoFinalXML.xml");

(: Seleccionar todos los usuarios :)
let $usuarios := $doc/agenciaViajes/usuarios/usuario

return (
  "<?xml version='1.0' encoding='UTF-8'?>",
  "<?xml-stylesheet type='text/xsl' href='../XSLT/Usuarios.xsl'?>",
  <usuarios>{$usuarios}</usuarios>
)
