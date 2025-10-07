<?php
include 'connexion_bd.php';
include 'fonctions.php';

if (isset($_GET['slug']) && (isset($_GET['categorie']))) {
    $slug = $_GET['slug'];
    $categorie = $_GET['categorie'];
} else {
    die("Slug ou categorie pas dans l'url.");
}

$statement = $conn->prepare('SELECT * FROM lieux WHERE slug = ? AND nom_categorie = ?');
$statement->bind_param("ss", $slug, $categorie);
$statement->execute();
$result = $statement->get_result();
$lieu = $result->fetch_assoc(); 

if ($lieu) {
    echo "<h1>Catégorie : {$lieu["nom_categorie"]}</h1>";

    $annee = substr($lieu["date_explo"], 0, 4);
    $moisChiffre = substr($lieu["date_explo"], 5, 2);
    $moisLettre = getMoisFr($moisChiffre);

    echo "<h3>{$lieu["nom"]}  exploré en {$moisLettre} {$annee}</h3>";
} else {
    echo "<p>Lieu introuvable 😕</p>";
}
?>