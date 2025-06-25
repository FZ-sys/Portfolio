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

$contact = $profil->contact;
$titre_page = (string)$contact->titre;
$labels = $contact->labels;
$confirmation_template = (string)$contact->confirmation;

$envoye = false;
$nom_saisi = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $envoye = true;
    $nom_saisi = htmlspecialchars($_POST["nom"]);
    $message_final = str_replace("{nom}", $nom_saisi, $confirmation_template);
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $titre_page ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body typeof="schema:ContactPage">
    <div class="lang-switch">
        <a href="?lang=fr">🇫🇷</a>
        <a href="?lang=en">🇬🇧</a>
        <a href="?lang=ar">🇸🇦</a>
    </div>

    <nav>
        <a href="index.php?lang=<?= $lang ?>"><?= ($lang == 'fr') ? 'Accueil' : (($lang == 'en') ? 'Home' : 'الرئيسية') ?></a> |
        <a href="contact.php?lang=<?= $lang ?>"><?= $titre_page ?></a>
    </nav>

    <h1 property="schema:headline"><?= $titre_page ?></h1>

    <?php if ($envoye): ?>
        <p style="background-color:#dff0d8; padding:1rem; border:1px solid #b2d8b2; border-radius:10px;">
            <?= $message_final ?>
        </p>
    <?php else: ?>
        <form method="post" action="contact.php?lang=<?= $lang ?>" class="contact-form" typeof="schema:ContactPoint">
            <label><?= $labels->nom ?>:<br>
                <input type="text" name="nom" required property="schema:name">
            </label><br><br>

            <label><?= $labels->email ?>:<br>
                <input type="email" name="email" required property="schema:email">
            </label><br><br>

            <label><?= $labels->message ?>:<br>
                <textarea name="message" rows="5" required property="schema:description"></textarea>
            </label><br><br>

            <button type="submit" property="schema:contactOption"><?= $labels->envoyer ?></button>
        </form>
    <?php endif; ?>
</body>
</html>
