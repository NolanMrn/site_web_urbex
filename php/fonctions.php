<?php
function getMoisFr($numero) {
    $mois = [
        1 => 'janvier', 2 => 'février', 3 => 'mars',
        4 => 'avril', 5 => 'mai', 6 => 'juin',
        7 => 'juillet', 8 => 'août', 9 => 'septembre',
        10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
    ];
    $numero = (int)$numero;
    return $mois[$numero] ?? '';
}

function getHistoireLieux($conn, $idL, $categorie) {
    $statement = $conn->prepare(
        'SELECT histoire_lieux FROM DESCRIPTIFLIEUX WHERE idL = ? AND nom_categorie = ?'
    );
    $statement->bind_param("ss", $idL, $categorie);
    $statement->execute();
    $result = $statement->get_result();
    $histoireLieux = $result->fetch_assoc(); 
    return $histoireLieux['histoire_lieux'] ?? '';
}

function getPays($conn, $idL, $categorie) {
    $statement = $conn->prepare(
        'SELECT pays FROM DESCRIPTIFLIEUX WHERE idL = ? AND nom_categorie = ?'
    );
    $statement->bind_param("ss", $idL, $categorie);
    $statement->execute();
    $result = $statement->get_result();
    $pays = $result->fetch_assoc(); 
    return $pays['pays'] ?? '';
}

function getStrucure($conn, $idL, $categorie){
    $statement = $conn->prepare(
        'SELECT * FROM STRUCTURE WHERE idL = ? AND nom_categorie = ? ORDER BY ordre_structure'
    );
    $statement->bind_param("is", $idL, $categorie);
    $statement->execute();
    $structure = $statement->get_result();
    return $structure;
}

function getImageGalerie($conn, $refGallerie){
    $statement = $conn->prepare(
        'SELECT * FROM IMAGEGALLERIE where idG = ?'
    );
    $statement->bind_param("i", $refGallerie);
    $statement->execute();
    $images = $statement->get_result();
    return $images;
}

function getParagraphe($conn, $refGallerie){
    $statement = $conn->prepare(
        'SELECT * FROM PARAGRAPHE where idG = ?'
    );
    $statement->bind_param("i", $refGallerie);
    $statement->execute();
    $paragraphe = $statement->get_result();
    return $paragraphe;
}

function getDescription($conn, $categorie){
    $statement = $conn->prepare(
        'SELECT * FROM CATEGORIE where nom_categorie = ?'
    );
    $statement->bind_param("s", $categorie);
    $statement->execute();
    $descrition = $statement->get_result();
    return $descrition;
}

function getAllLieuxCategorie($conn, $categorie){
    $statement = $conn->prepare(
        'SELECT * FROM LIEUX NATURAL JOIN CATEGORIE WHERE nom_categorie = ? ORDER BY date_explo DESC;'
    );
    $statement->bind_param("s", $categorie);
    $statement->execute();
    $lieux = $statement->get_result();
    return $lieux;
}

function getImageBanniere($conn, $idL, $categorie){
    $statement = $conn->prepare(
        'SELECT chemin_img_banniere FROM DESCRIPTIFLIEUX WHERE idL = ? AND nom_categorie = ?'
    );
    $statement->bind_param("is", $idL, $categorie);
    $statement->execute();
    $chemin = $statement->get_result();
    return $chemin;
}
?>