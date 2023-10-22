<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'services/sanitize.php';
    
    $pdo = require_once 'services/connect.php';
    
    $sql = 'SELECT id,author,content,date FROM reports';
    $request = $pdo->prepare($sql);

    $request->execute();
    
    echo(json_encode($request->fetchAll(PDO::FETCH_ASSOC)));