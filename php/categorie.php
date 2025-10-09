<?php
include 'connexion_bd.php';
include 'fonctions.php';

if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
} else {
    die("categorie pas dans l'url.");
}

$statement = $conn->prepare('SELECT * FROM LIEUX WHERE nom_categorie = ?');
$statement->bind_param("s", $categorie);
$statement->execute();
$result = $statement->get_result();
$lieu = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/site_web/css/categorie/positionnement.css">
    <link rel="stylesheet" type="text/css" href="/site_web/css/categorie/styles.css">
    <title>Exploratio_nln</title>
    <link rel="icon" type="image/PNG" href="/site_web/img/accueil/photo_profil.png">
    <link href="https://fonts.googleapis.com/css2?family=Antonio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
        <div class="container">
            <section class="explos">
                <?php
                echo "<h1>Catégorie : {$categorie}</h1>";
                $description = getDescription($conn, $categorie);
                echo "<p>{$description}</p>"; 
                ?>
                <section class="explos_photos">
                    <?php
                    $result = getAllLieuxCategorie($conn, $categorie);
                    $nbLieux = $result->num_rows;
                    while ($lieu = $result->fetch_assoc()) {
                        $cheminImg = getImageBanniere($conn, $lieu["idL"], $categorie);
                        $pays = getPays($conn, $lieu["idL"], $categorie);
                        $nom = $lieu["nom"];
                        $annee = substr($lieu["date_explo"], 0, 4);
                        $moisChiffre = substr($lieu["date_explo"], 5, 2);
                        $lienUrl = "/site_web/php/lieu_indiv.php?slug={$lieu["slug"]}&categorie={$categorie}";
                        echo "<article>
                                <img src=\"{$cheminImg}\" alt=\"\">
                                <div class=\"content\">
                                    <article>
                                        <div>
                                            <hr class=\"trait-blanc\">
                                            <h2>{$nom}</h2>
                                            <hr class=\"trait-blanc\">
                                        </div>
                                        <div>
                                            <img src=\"/site_web/img/accueil/drapeau_{$pays}.png\" alt=\"\">
                                            <p>{$moisChiffre}/{$annee}</p>
                                        </div>
                                    </article>
                                    <a href=\"{$lienUrl}\">
                                        <div>
                                            <p>Découvrir</p>
                                        </div>
                                    </a>
                                </div>
                            </article>";
                    }
                    $reste = $nbLieux % 3;
                    if ($reste == 0) {
                        $nbAAjouter = 0;
                    } else {
                        $nbAAjouter = 3 - $reste;
                    }
                    for ($i = 0; $i < $nbAAjouter; $i++) {
                        echo "<article style=\"background-color: #222222;\"></article>";
                    }
                    ?>
                </section>
            </section>
        </div>
    </main>
</body>
