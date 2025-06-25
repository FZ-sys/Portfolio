<?php
$langues_disponibles = ['fr', 'en', 'ar'];
$lang = 'fr';
if (isset($_GET['lang']) && in_array($_GET['lang'], $langues_disponibles)) {
    $lang = $_GET['lang'];
}

$titre = [
    'fr' => '📚 Documentation complète du projet Portfolio - Fatimazahra',
    'en' => '📚 Full Project Documentation - Fatimazahra\'s Portfolio',
    'ar' => '📚 التوثيق الكامل لمشروع البورتفوليو - فاطمة الزهراء'
];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" vocab="https://schema.org/" typeof="TechArticle">
<head>
  <meta charset="UTF-8">
  <title property="headline"><?= $titre[$lang] ?></title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 950px;
      margin: auto;
      padding: 2rem;
      background: #fefefe;
      color: #333;
    }
    h1, h2 {
      color: #0057a0;
    }
    code {
      background: #eee;
      padding: 3px 6px;
      border-radius: 4px;
    }
    ul {
      margin-left: 1.5rem;
    }
    a {
      color: #0057a0;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .lang-switch {
      text-align: right;
      margin-bottom: 1rem;
    }
    .page-links li {
      margin-bottom: 5px;
    }
    .lang-switch {
    font-size: 0.65em;             
    padding: 2px 6px;           
    border-radius: 6px;
    background-color: #eee;
    display: inline-block;
    margin-bottom: 1rem;
  }

  .lang-switch a {
  margin: 0 4px;
  text-decoration: none;
  color: #333;
  }

  .lang-switch a:hover {
  text-decoration: underline;
  }

  </style>
</head>
<body typeof="WebPage">
  <div class="lang-switch">
    <a href="readme.php?lang=fr">Français</a> |
    <a href="readme.php?lang=en">English</a> |
    <a href="readme.php?lang=ar">العربية</a>
  </div>

  <h1 property="headline"><?= $titre[$lang] ?></h1>

  <h2>🎯 Objectif du projet</h2>
  <p property="description">
    Ce portfolio est un projet web sémantique complet. Il utilise XML, RDF, RDFa, XSD, XSLT et SPARQL pour présenter un profil multilingue (français, anglais, arabe). Le but est de structurer et présenter les données de manière standardisée.
  </p>

  <h2>📄 Accès direct aux pages du projet</h2>
  <ul class="page-links">
    <li>🏠 <a href="index.php?lang=<?= $lang ?>">Accueil dynamiques (PHP/XML)</a></li>
    <li>❤️ <a href="passions.php?lang=<?= $lang ?>">Passions dynamiques (PHP/XML)</a></li>
    <li>📁 <a href="projet.php?lang=<?= $lang ?>">Projets dynamiques (PHP/XML)</a></li>
    <li>🧹 <a href="contenu.php?lang=<?= $lang ?>">Projet statique (XSLT)</a></li>
    <li>📬 <a href="contact.php?lang=<?= $lang ?>">Contact (formulaire dynamique)</a></li>
    <li>🔎 <a href="sparql.php?lang=<?= $lang ?>">SPARQL simulé (lecture RDF)</a></li>
    <li>📄 <a href="readme.php?lang=<?= $lang ?>">README / Wiki (cette page)</a></li>
  </ul>

  <h2>🛠 Technologies utilisées</h2>
  <ul>
    <li>PHP / HTML5 / CSS3</li>
    <li>XML + XSD (validation) + XSLT (transformation)</li>
    <li>RDF / RDFa / SPARQL simulé (XPath + DOM)</li>
    <li>Système multilingue via XML + PHP + `?lang=`</li>
  </ul>

  <h2>📂 Structure des fichiers</h2>
  <ul>
    <li><code>langues/contenu.xml</code> : Contenu principal (profil, passions, projets)</li>
    <li><code>langues/contenu.xsd</code> : Schéma de validation XML</li>
    <li><code>langues/contenu.rdf</code> : Fichier RDF global</li>
    <li><code>langues/contenu.xslt</code> : XSLT pour affichage statique</li>
    <li><code>langues/passions.rdf</code> : RDF pour passions uniquement</li>
    <li><code>images/</code> : Illustrations (.jpg / .jpeg)</li>
    <li><code>video/</code> : Présentation multilingue en .mp4</li>
  </ul>

  <h2>🔗 Web Sémantique</h2>
  <ul>
    <li><strong>RDFa</strong> : intégré dans presque tout le projet (profil personnel)</li>
    <li><strong>RDF</strong> : <code>contenu.rdf</code> avec <code>foaf</code>, <code>schema.org</code></li>
    <li><strong>XSLT</strong> : affichage HTML depuis XML (avec paramètre langue)</li>
    <li><strong>XSD</strong> : validation des fichiers XML</li>
    <li><strong>SPARQL simulé</strong> : affichage RDF via XPath + DOMDocument</li>
  </ul>

  <h2>💡 Fonctionnalité multilingue</h2>
  <p>Chaque page adapte le contenu en fonction de l’URL (<code>?lang=fr</code>, <code>?lang=en</code>, <code>?lang=ar</code>). Les textes viennent du fichier <code>contenu.xml</code> selon la langue choisie.</p>

  <h2>🙋‍♀️ À propos</h2>
  <div typeof="Person">
    <p>Je suis <strong property="name">Fatimazahra EL YOUNOUSSI</strong>, étudiante à <span property="alumniOf">Sup Galilée</span> et développeuse <span property="jobTitle">Full Stack</span> chez <span property="affiliation">Dassault Systèmes</span>.</p>
    <p>Mail : <a href="mailto:fz.elyounoussi@gmail.com" property="email">fz.elyounoussi@gmail.com</a></p>
  </div>

</body>
</html>
