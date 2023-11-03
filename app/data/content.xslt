<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="text" />

    <!-- Raíz del árbol XML -->
    <xsl:template match="/contents">
        <!-- Iterar a través de cada elemento "content" -->
        <xsl:for-each select="content">
            <!-- Generar la consulta SQL para la tabla "content" -->
            <xsl:text>INSERT INTO content (contentTitle, contentText) VALUES ('</xsl:text>
            <xsl:value-of select="title" />
            <xsl:text>', '</xsl:text>
            <xsl:value-of select="text" />
            <xsl:text>');</xsl:text>
            <xsl:text>&#10;</xsl:text> <!-- Agregar salto de línea -->
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>
