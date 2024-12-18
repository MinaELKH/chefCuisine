<?php
$host = "localhost";
$user = "root";
$pwd = "";
$db = "chefCuisine";

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $pwd, $db);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

echo "Connexion réussie";
?>
