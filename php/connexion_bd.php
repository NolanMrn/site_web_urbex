<?php
$host = "localhost";
$user = "root";
$pass = "0102";
$db = "site_urbex";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

echo "Connexion réussie à la base de données !";
?>