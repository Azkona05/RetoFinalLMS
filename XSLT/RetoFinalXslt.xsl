<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>Agencia de Viajes</title>
                <style>
                    table { width: 100%%; border-collapse: collapse; }
                    th, td { border: 1px solid black; padding: 8px; text-align: left; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h1>Lista de Aerolíneas y Destinos</h1>
                <table>
                    <tr>
                        <th>Aerolínea</th>
                        <th>Destino</th>
                        <th>Descripción</th>
                        <th>Enlace</th>
                    </tr>
                    <xsl:for-each select="agenciaViajes/aerolineas/aerolinea">
                        <xsl:for-each select="destinos/destino">
                            <tr>
                                <td><xsl:value-of select="../../nombre"/></td>
                                <td><xsl:value-of select="nombre"/></td>
                                <td><xsl:value-of select="descripcion"/></td>
                                <td><a href="{../../url}">Visitar</a></td>
                            </tr>
                        </xsl:for-each>
                    </xsl:for-each>
                </table>
                
                <h2>Vuelos Programados</h2>
                <table>
                    <tr>
                        <th>ID Vuelo</th>
                        <th>Destino ID</th>
                        <th>Fecha</th>
                        <th>Pasajeros</th>
                    </tr>
                    <xsl:for-each select="agenciaViajes/vuelos/vuelo">
                        <tr>
                            <td><xsl:value-of select="@id"/></td>
                            <td><xsl:value-of select="destinoId"/></td>
                            <td><xsl:value-of select="fecha"/></td>
                            <td>
                                <xsl:for-each select="pasajeros/pasajero">
                                    <xsl:value-of select="@dni"/><br/>
                                </xsl:for-each>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

