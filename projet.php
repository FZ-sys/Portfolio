<?php
$langues_disponibles = ['fr', 'en', 'ar'];
$lang = 'fr';

if (isset($_GET['lang']) && in_array($_GET['lang'], $langues_disponibles)) {
    $lang = $_GET['lang'];
}

$xml = simplexml_load_file("langues/contenu.xml");
foreach ($xml->profil as $p) {
    if ((string)$p['lang'] === $lang) {
        $profil = $p;
        break;
    }
}

$titres_page = [
    "fr" => "Mes projets",
    "en" => "My Projects",
    "ar" => "مشاريعي"
];

$titre_page = $titres_page[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" vocab="https://schema.org/">
<head>
    <meta charset="UTF-8">
    <title><?= $titre_page ?> - <?= $profil->nom ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1 property="schema:headline"><?= $titre_page ?></h1>

    <div typeof="schema:Person">
        <?php foreach ($profil->projets->projet as $projet): ?>
            <div class="projet" typeof="schema:CreativeWork">
                <h2 property="schema:name"><?= $projet->titre ?></h2>
                
                <?php foreach ($projet->images->img as $img): ?>
                    <img src="<?= $img ?>" alt="<?= $projet->titre ?>" class="projet-img" property="schema:image">
                <?php endforeach; ?>

                <p property="schema:description"><?= $projet->description ?></p>

                <p>
                    <strong><?= ($lang == 'fr') ? 'Technos' : (($lang == 'en') ? 'Technologies' : 'التقنيات') ?>:</strong>
                    <span property="schema:about"><?= $projet->technos ?></span>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
