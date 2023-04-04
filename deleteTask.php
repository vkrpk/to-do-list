<?php

require_once 'connexion.php';

$req = $pdo->prepare( 'DELETE FROM tasks WHERE id = :id' );
$req->bindValue( ':id', $_GET['id'], PDO::PARAM_INT );
$check = $req->execute();
echo json_encode( $check );
