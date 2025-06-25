<!-- Changement de langue -->
<div class="lang-switch">
    <a href="?lang=fr">Français</a>
    <a href="?lang=en">English</a>
    <a href="?lang=ar">العربية</a>
</div>

<!-- Navigation principale avec RDFa -->
<nav class="main-nav" typeof="schema:SiteNavigationElement">
    <a href="index.php?lang=<?= $lang ?>" property="schema:relatedLink">Accueil</a>
    <a href="passions.php?lang=<?= $lang ?>" property="schema:relatedLink">Passions</a>
    <a href="projet.php?lang=<?= $lang ?>" property="schema:relatedLink">Projets</a>
    <a href="contact.php?lang=<?= $lang ?>" property="schema:relatedLink">Contact</a>
    <a href="readme.php?lang=<?= $lang ?>" target="_blank" property="schema:relatedLink">README</a>
</nav>
