<?php
function getMoisFr($numero) {
    $mois = [
        1 => 'janvier', 2 => 'février', 3 => 'mars',
        4 => 'avril', 5 => 'mai', 6 => 'juin',
        7 => 'juillet', 8 => 'août', 9 => 'septembre',
        10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
    ];
    return $mois[$numero] ?? '';
}

function getHistoireLieux($conn, $idL, $categorie) {
    $statement = $conn->prepare(
        'SELECT histoire_lieux FROM DESCRIPTIFLIEUX WHERE idL = ? AND nom_categorie = ?');
    $statement->bind_param("ss", $idL, $categorie);
    $statement->execute();
    $result = $statement->get_result();
    $histoireLieux = $result->fetch_assoc(); 
    return $histoireLieux['histoire_lieux'] ?? '';
}

function getParagraphe($conn, $idL, $categorie, $numParagraphe) {
    $statement = $conn->prepare(
        'SELECT paragraphe1, paragraphe2, paragraphe3, paragraphe4, paragraphe5 
        FROM DESCRIPTIFLIEUX WHERE idL = ? AND nom_categorie = ?');
    $statement->bind_param("ss", $idL, $categorie);
    $statement->execute();
    $result = $statement->get_result();
    $paragraphes = $result->fetch_assoc(); 
    return $paragraphes['paragraphe' . $numParagraphe] ?? '';
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
?>