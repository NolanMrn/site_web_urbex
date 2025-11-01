<?php
$page_actuelle = basename($_SERVER['PHP_SELF']);
?>

<header>
    <img src="/site_web/img/accueil/photo_profil.png" alt="photo profil">
    <h1>Exploratio_nln</h1>
    <nav>
        <ul class="menu">
            <li><a href="/site_web/php/accueil.php" class="<?= $page_actuelle === 'accueil.php' ? 'active' : '' ?>">Accueil</a></li>
            <li><a href="/site_web/php/galerie.php" class="<?= $page_actuelle === 'galerie.php' ? 'active' : '' ?>">Galerie</a></li>
            <li><a href="" class="<?= $page_actuelle === 'contact.php' ? 'active' : '' ?>">Contact</a></li>
        </ul>
    </nav>
</header>