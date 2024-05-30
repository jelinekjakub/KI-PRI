<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                xsi:noNamespaceSchemaLocation="studium.xsd"
                version="1.0">
  
  <!-- Definice výstupního HTML -->
  <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD HTML 5.0//EN" doctype-system="http://www.w3.org/TR/html5/"/>

  <!-- Šablona pro kořenový element studium -->
  <xsl:template match="/studium">
    <html lang="cs">
      <head>
        <meta charset="UTF-8"/>
        <title>Studium</title>
      </head>
      <body>
        <header>
          <h1>Studium</h1>
        </header>
        <!-- Volání dalších šablon pro zpracování jednotlivých ročníků -->
        <xsl:apply-templates select="rocnik"/>
      </body>
    </html>
  </xsl:template>

  <!-- Šablona pro zpracování ročníku -->
  <xsl:template match="rocnik">
    <section class="rocnik">
      <h2>Rocnik <xsl:value-of select="@cislo"/></h2>
      <!-- Volání dalších šablon pro zpracování jednotlivých semestrů -->
      <xsl:apply-templates select="semestr"/>
    </section>
  </xsl:template>

  <!-- Šablona pro zpracování semestru -->
  <xsl:template match="semestr">
    <section class="semestr">
      <h3>Semestr <xsl:value-of select="@nazev"/></h3>
      <table>
        <thead>
          <tr>
            <th>Katedra</th>
            <th>Kód</th>
            <th>Název předmětu</th>
            <th>Vyučující</th>
            <th>Kredity</th>
            <th>Stav</th>
            <th>Zakončení</th>
          </tr>
        </thead>
        <tbody>
          <!-- Volání dalších šablon pro zpracování jednotlivých předmětů -->
          <xsl:apply-templates select="predmet"/>
        </tbody>
      </table>
    </section>
  </xsl:template>

  <!-- Šablona pro zpracování předmětu -->
  <xsl:template match="predmet">
    <tr>
      <td><xsl:value-of select="@katedra"/></td>
      <td><xsl:value-of select="@kod"/></td>
      <td><xsl:value-of select="nazev"/></td>
      <td>
        <xsl:value-of select="vyucujici/jmeno"/><br/>
        Tel: <xsl:value-of select="vyucujici/telefon"/><br/>
        Email: <xsl:value-of select="vyucujici/email"/>
      </td>
      <td><xsl:value-of select="kredity"/></td>
      <td><xsl:value-of select="status"/></td>
      <td><xsl:value-of select="zakonceni"/></td>
    </tr>
  </xsl:template>

</xsl:stylesheet>
