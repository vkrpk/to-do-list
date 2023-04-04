<?php

/**
 * Insertion d'une nouvelle tâche en BDD
 * addTask.php
 */

// Récupère les données brutes...
$content = file_get_contents('php://input');

// ...et les convertir en tableau PHP associatif
$task = json_decode($content, true);

// Connexion à la BDD
require_once 'connexion.php';

// Nettoyage de données
$tache = htmlentities($task['task']);
$etiquette = htmlentities($task['process']);

// Insertion en BDD
// NOW() est une fonction SQL permettant d'insérer la date du jour
$query = $pdo->prepare('
	INSERT INTO tasks (task, process, created_at) 
	VALUES (:task, :process, NOW())
');

$query->bindValue(':task', $tache);
$query->bindValue(':process', $etiquette);
$check = $query->execute();

// Retourne une valeur au JS. Soit "true", soit "false".
echo json_encode($check);
