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
$titre = [
    "fr" => "Mes passions",
    "en" => "My passions",
    "ar" => "اهتماماتي"
];

$images = [
    "insta" => "images/insta.jpg",
    "matcha" => "images/matcha.jpg",
    "books" => "images/books.jpg",
    "travel" => "images/travel.jpg",
    "yoga" => "images/yoga.jpeg"
];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" vocab="https://schema.org/">
<head>
    <meta charset="UTF-8">
    <title><?= $titre[$lang] ?> - <?= $profil->nom ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1 property="schema:headline"><?= $titre[$lang] ?></h1>

    <!-- Bloc passions avec annotation Person -->
    <div typeof="schema:Person">
        <?php foreach ($profil->passions->passion as $p) :
            $id = (string)$p['id'];
            $img = isset($images[$id]) ? $images[$id] : null;
        ?>
            <div class="passion-block" property="schema:knowsAbout">
                <?php if ($img): ?>
                    <img src="<?= $img ?>" alt="<?= $id ?>" class="passion-img" property="schema:image">
                <?php endif; ?>
                <p><?= $p ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
