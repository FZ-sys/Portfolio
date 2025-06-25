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
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" vocab="https://schema.org/">
<head>
    <meta charset="UTF-8">
    <title><?= $profil->nom ?> - Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="alternate" hreflang="fr" href="?lang=fr" />
    <link rel="alternate" hreflang="en" href="?lang=en" />
    <link rel="alternate" hreflang="ar" href="?lang=ar" />
    <link rel="alternate" type="application/rdf+xml" href="langues/contenu.rdf" title="Données RDF de l’auteur" />
</head>
<body>

    <!-- Bloc RDFa invisible (meta info) -->
    <div typeof="Person" style="display: none;">
        <span property="name">Fatimazahra EL YOUNOUSSI</span>
        <span property="email">fz.elyounoussi@gmail.com</span>
        <span property="jobTitle">Développeuse Full Stack</span>
        <span property="affiliation">Dassault Systèmes</span>
    </div>

    <!-- Navigation -->
    <?php include 'nav.php'; ?>

    <!-- Informations personnelles avec RDFa -->
    <section typeof="Person">
        <h1 property="name"><?= $profil->nom ?></h1>
        <p><strong><?= ($lang === 'fr') ? 'Email' : (($lang === 'en') ? 'Email' : 'البريد الإلكتروني') ?> :</strong>
            <span property="email"><?= $profil->email ?></span></p>
        <p><strong><?= ($lang === 'fr') ? 'Ville' : (($lang === 'en') ? 'City' : 'المدينة') ?> :</strong>
            <span property="addressLocality"><?= $profil->ville ?></span></p>
    </section>

    <h2><?= ($lang == 'fr') ? 'Présentation' : (($lang == 'en') ? 'About me' : 'نبذة عني') ?></h2>
    <p property="description"><?= $profil->presentation ?></p>

    <h2><?= ($lang == 'fr') ? 'Compétences' : (($lang == 'en') ? 'Skills' : 'المهارات') ?></h2>
    <ul>
        <?php foreach ($profil->competences->competence as $comp) : ?>
            <li property="skills"><?= $comp ?></li>
        <?php endforeach; ?>
    </ul>

    <h2><?= ($lang == 'fr') ? 'Vidéo de présentation' : (($lang == 'en') ? 'Intro Video' : 'فيديو تعريفي') ?></h2>
    <div typeof="VideoObject">
        <meta property="name" content="Vidéo de présentation de Fatimazahra" />
        <video width="100%" controls property="contentUrl">
            <source src="video/video <?= $lang ?>.mp4" type="video/mp4">
            <?= ($lang == 'fr') ? 'Votre navigateur ne supporte pas la vidéo.' :
                (($lang == 'en') ? 'Your browser does not support the video tag.' :
                'متصفحك لا يدعم عرض الفيديو.') ?>
        </video>
    </div>

</body>
</html>
