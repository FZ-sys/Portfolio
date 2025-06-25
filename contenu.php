<?php
$xml = new DOMDocument;
$xml->load('langues/contenu.xml');

$xsl = new DOMDocument;
$xsl->load('langues/contenu.xslt');


$proc = new XSLTProcessor;
$proc->importStylesheet($xsl);

// Définir la langue (depuis URL ou session par exemple)
$langue = $_GET['lang'] ?? 'fr';
$proc->setParameter('', 'lang', $langue);

echo $proc->transformToXML($xml);
?>