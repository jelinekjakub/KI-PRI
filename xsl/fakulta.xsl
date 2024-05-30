<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <!-- Definice šablon pro transformaci XML dokumentu -->

    <!-- Hlavní šablona, která zpracuje celý dokument -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Fakulta</title>
                <style>
                    table { border-collapse: collapse; width: 100%; }
                    th, td { border: 1px solid black; padding: 8px; text-align: left; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h1>Fakulta</h1>
                <h2>Děkan: <xsl:value-of select="fakulta/@děkan"/></h2>
                <xsl:apply-templates select="fakulta/katedra"/>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="katedra">
        <h3>Katedra <xsl:value-of select="@zkratka_katedry"/></h3>
        <p>Webové stránky: <a href="{@webové_stránky}"><xsl:value-of select="@webové_stránky"/></a></p>
        <h4>Vedoucí:</h4>
        <p>Jméno: <xsl:value-of select="vedoucí/jméno"/></p>
        <p>Telefon: <xsl:value-of select="vedoucí/telefon"/></p>
        <p>Email: <xsl:value-of select="vedoucí/email"/></p>

        <h4>Zaměstnanci:</h4>
        <table>
            <tr>
                <th>Jméno</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Pozice</th>
            </tr>
            <xsl:apply-templates select="zaměstnanci/zaměstnanec"/>
        </table>

        <h4>Předměty:</h4>
        <table>
            <tr>
                <th>Zkratka</th>
                <th>Typ</th>
                <th>Název</th>
                <th>Popis</th>
            </tr>
            <xsl:apply-templates select="předměty/předmět"/>
        </table>
    </xsl:template>
    <xsl:template match="zaměstnanec">
        <tr>
            <td><xsl:value-of select="jméno"/></td>
            <td><xsl:value-of select="telefon"/></td>
            <td><xsl:value-of select="email"/></td>
            <td><xsl:value-of select="pozice"/></td>
        </tr>
    </xsl:template>
    <xsl:template match="předmět">
        <tr>
            <td><xsl:value-of select="@zkratka"/></td>
            <td><xsl:value-of select="@typ"/></td>
            <td><xsl:value-of select="název"/></td>
            <td><xsl:value-of select="popis"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
