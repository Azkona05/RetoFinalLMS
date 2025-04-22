(: declare variable $doc := doc("RetoFinal.xml"); 
delete node $doc/agenciaViajes/usuarios/usuario[@dni = "12345678A"] :) 
declare variable $doc := doc("RetoFinalXML.xml");
insert node 
<usuario sexo="F" dni="98765432C">
    <nombre>Laura</nombre>
    <apellido>Fernández</apellido>
    <clave>clave789</clave>
    <numTel>698745632</numTel>
    <contacto>
        <correo>laura@example.com</correo>
    </contacto>
</usuario>
into $doc/ agenciaViajes/usuarios 



(: declare variable $doc := doc("RetoFinal.xml"); 

replace value of node agenciaViajes/usuarios/usuario[@dni="98765432C"]/nombre 
with "peedro"

 replace value of node agenciaViajes/usuarios/usuario[@dni="98765432C"]/apellido 
with "López"

replace value of node agenciaViajes/usuarios/usuario[@dni="98765432C"]/clave 
with "nuevaClave456"

replace value of node agenciaViajes/usuarios/usuario[@dni="98765432C"]/numTel 
with "612345678"

replace value of node agenciaViajes/usuarios/usuario[@dni="98765432C"]/contacto/correo 
with "juancarlos@gmail.com" : :)
