<?php

require_once 'connexion.php';

$req = $pdo->prepare( 'SELECT * FROM tasks WHERE id = :id ' );
$req->bindValue( ':id', $_GET['id'], PDO::PARAM_INT );
$req->execute();
$check = $req->fetch();

$check['task'] = html_entity_decode( $check['task'] );
$check['process'] = html_entity_decode( $check['process'] );

echo json_encode( $check );
