<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>

  <xsl:template match="/">
    <html>
      <head>
        <title>Cuentas</title>
        <style>
          body { font-family: Arial; padding: 20px; }
          h1 { color: #2c3e50; }
          p { margin: 5px 0; }
        </style>
      </head>
      <body>
        <h1>Cuentas</h1>
        <xsl:apply-templates select="usuario"/>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="usuario">
    <p><strong>Nombre:</strong> <xsl:value-of select="nombre"/></p>
    <p><strong>Apellidos:</strong> <xsl:value-of select="apellidos"/></p>
    <p><strong>Sexo:</strong> <xsl:value-of select="sexo"/></p>
    <p><strong>Correo:</strong> <xsl:value-of select="correo"/></p>
    <p><strong>Teléfono:</strong> <xsl:value-of select="telefono"/></p>
    <p><strong>Publicidad:</strong> <xsl:value-of select="publicidad"/></p>
  </xsl:template>

</xsl:stylesheet>
