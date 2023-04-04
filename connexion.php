<?php
/**
 * Connexion à la BDD
 */
$dbconfig = parse_ini_file(".env");
// Localisation de la BDD

// Nom de la base de donnée

try {
    $pdo = new PDO("mysql:host=" . $dbconfig["HOST"] . ";dbname=" . $dbconfig["DBNAME"], $dbconfig["USER"], $dbconfig["PASSWD"], [
        // Gestion des erreurs PHP/SQL
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_WARNING,
        // Gestion du jeu de caractères
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // Choix du retours des résultats
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // echo 'Base de données connectée';
} catch (Exception $error) {
    // Attrape une exception
    echo 'Erreur lors de la connexion à la base de données : ' . $error->getMessage();
}
