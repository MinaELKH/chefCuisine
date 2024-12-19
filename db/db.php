<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$host = "localhost";
$user = "root";
$pwd = "";
$db = "chefCuisine1";

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $pwd, $db);
echo("Connexion reusi : " );

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
