<?php
$doc = new DOMDocument;
$doc->preserveWhiteSpace = false;
$doc-> load("../XML_XSD/RetoFinal.xml");
$xpath = new DOMXPath($doc);
$query = ""
$pasajero = $xpath->query($query)
foreach( as ){
    echo  . "\n";
}
?>