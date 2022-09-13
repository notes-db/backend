<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'services/sanitize.php';

    $pdo = require_once 'services/connect.php';
    
    $sql = 'UPDATE notes SET likes = likes + 1 WHERE id=:id';
    $request = $pdo->prepare($sql);
    $request->bindValue(':id', san($_REQUEST['id']));
    echo(json_encode($request->execute()));