<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'services/sanitize.php';
    
    $pdo = require_once 'services/connect.php';
    
    $sql = 'SELECT author, COUNT(*) as frequency
    FROM notes
    GROUP BY author
    ORDER BY COUNT(*) DESC;
    ';
    $request = $pdo->prepare($sql);
    $request->execute();

    foreach($request->fetchAll(PDO::FETCH_ASSOC) as $index => $author) foreach($author as $key => $value) $decoded[$index][$key] = html_entity_decode($value);
    echo(json_encode($decoded));