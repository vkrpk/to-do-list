<?php

$content = file_get_contents( 'php://input' );
$datas = json_decode( $content, true );

require_once 'connexion.php';

$id = htmlentities( $datas['id'] );
$task = htmlentities( $datas['task'] );
$process = htmlentities( $datas['process'] );

$req = $pdo->prepare( 'UPDATE tasks SET task = :task, process = :process WHERE id = :id' );
$req->bindValue( ':task', $task );
$req->bindValue( ':process', $process );
$req->bindValue( ':id', $id, PDO::PARAM_INT );
$req->execute();

$req = $pdo->prepare( 'SELECT * FROM tasks WHERE id = :id' );
$req->bindValue( ':id', $id, PDO::PARAM_INT );
$req->execute();

echo json_encode( $req->fetch() );