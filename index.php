<?php
// Load the XML document
$xmlDoc = new DOMDocument();
$xmlDoc->load('xml/articles.xml'); // Make sure this path is correct

// Load the XSL document
$xslDoc = new DOMDocument();
$xslDoc->load('xml/xslt/transform.xsl'); // Ensure the path is valid and accessible

// Check if the XSLTProcessor class exists
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xslDoc); // Attach the XSL rules

    echo $proc->transformToXML($xmlDoc); // Transform and output the XML content