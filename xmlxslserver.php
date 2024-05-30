<!DOCTYPE html>
<html>

<body>
    <?php
    // XML
    $xml = new DOMDocument;
    $xml->load('xml/prf2.xml');
    // XSL
    $xsl = new DOMDocument;
    $xsl->load('xsl/fakulta.xsl');
    // transformer
    $xslt = new XSLTProcessor();
    $xslt->importStylesheet($xsl);
    $transformovany_xml = $xslt->transformToXml($xml);
    // output
    echo $transformovany_xml;
    ?>
</body>

</html>