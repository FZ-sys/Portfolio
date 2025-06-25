<?php
$langues_disponibles = ['fr', 'en', 'ar'];
$lang = 'fr';
if (isset($_GET['lang']) && in_array($_GET['lang'], $langues_disponibles)) {
    $lang = $_GET['lang'];
}

$titre_page = [
    'fr' => 'Lecture RDF (global) avec SPARQL simulé',
    'en' => 'RDF Reading (global) with Simulated SPARQL',
    'ar' => 'قراءة RDF (الاهتمامات) باستخدام SPARQL المُحاكاة'
];

$doc = new DOMDocument();
$doc->load('langues/contenu.rdf');
$xpath = new DOMXPath($doc);

$xpath->registerNamespace("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
$xpath->registerNamespace("schema", "http://schema.org/");

// Langue XPath (ex: 'fr')
$xp_lang = "@xml:lang='$lang'";
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $titre_page[$lang] ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        .card { border:1px solid #ccc; padding:1rem; margin-bottom:1rem; border-radius:8px; background:#f8f8f8; }
        body { font-family:sans-serif; margin:2rem; }
        h1 { color:#333; }
    </style>
</head>
<body>
    <div class="lang-switch">
        <a href="?lang=fr">🇫🇷</a>
        <a href="?lang=en">🇬🇧</a>
        <a href="?lang=ar">🇸🇦</a>
    </div>

    <h1><?= $titre_page[$lang] ?></h1>

    <?php
    // Tous les RDF passion avec name + description traduits
    $passions = $xpath->query("//rdf:Description[schema:name and schema:description]");

    foreach ($passions as $p) {
        // Récupère name et description selon la langue
        $name = $xpath->evaluate("string(schema:name[$xp_lang])", $p);
        $desc = $xpath->evaluate("string(schema:description[$xp_lang])", $p);

        // Si pas dispo dans la langue, fallback sur 'fr'
        if (!$name) $name = $xpath->evaluate("string(schema:name[@xml:lang='fr'])", $p);
        if (!$desc) $desc = $xpath->evaluate("string(schema:description[@xml:lang='fr'])", $p);

        // Affichage
        if ($name && $desc) {
            echo "<div class='card'><strong>$name</strong><br><p>$desc</p></div>";
        }
    }
    ?>
</body>
</html>
