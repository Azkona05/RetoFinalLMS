<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>

  <xsl:template match="/">
    <html>
      <head>
        <title>Agencia de Viajes</title>
        <style>
          table { width: 100%; border-collapse: collapse; }
          th, td { border: 1px solid black; padding: 8px; text-align: left; }
          th { background-color: #f2f2f2; }
        </style>
      </head>
      <body>
        <h1>Lista de Usuarios</h1>
        <table>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Sexo</th>
            <th>Clave</th>
            <th>Numero Teléfono</th>
            <th>Contacto Extra</th>
          </tr>
          <xsl:for-each select="agenciaViajes/usuarios/usuario">
            <tr>
              <td><xsl:value-of select="nombre"/></td>
              <td><xsl:value-of select="apellido"/></td>
              <td><xsl:value-of select="@dni"/></td>
              <td><xsl:value-of select="@sexo"/></td>
              <td><xsl:value-of select="clave"/></td>
              <td><xsl:value-of select="numTel"/></td>
              <td>
                <xsl:choose>
                  <xsl:when test="contacto/correo">
                    <xsl:value-of select="contacto/correo"/>
                  </xsl:when>
                  <xsl:when test="contacto/numero2">
                    <xsl:value-of select="contacto/numero2"/>
                  </xsl:when>
                  <xsl:otherwise>Sin contacto extra</xsl:otherwise>
                </xsl:choose>
              </td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
