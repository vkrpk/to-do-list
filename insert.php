<?php
$content = file_get_contents( 'php://input' );
$datas = json_decode( $content, true );
require_once 'connexion.php';

$task = htmlentities( $datas['task'] );
$process = htmlentities( $datas['process'] );

$req = $pdo->prepare( 'INSERT INTO tasks(task, process, created_at) VALUES(:task, :process, NOW())' );

$req->bindValue( ':task', $task );
$req->bindValue( ':process', $process );
$check = $req->execute();

echo json_encode( $check ); // Renvoi true || false