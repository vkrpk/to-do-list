<?php

require_once 'connexion.php';
$order = '';
if ( $_GET['last'] === '1' ) {
    $order = 'ORDER BY id DESC LIMIT 1';
}

$req = $pdo->query( "SELECT * FROM tasks $order" );

$results = $req->fetchAll();
echo json_encode( $results );