<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'services/sanitize.php';

    $pdo = require_once 'services/connect.php';
    $id = san($_REQUEST['id']);
    
    $sql = 'UPDATE notes SET views = views + 1 WHERE id=:id';
    $request = $pdo->prepare($sql);
    $request->bindValue(':id', $id);
    $request->execute();
    
    $sql = 'SELECT * FROM notes WHERE id=:id';
    $request = $pdo->prepare($sql);
    $request->bindValue(':id', $id);
    $request->execute();
    foreach ($request->fetchAll(PDO::FETCH_ASSOC)[0] as $key => $value) $notes[$key] = html_entity_decode($value);


    $sql = 'SELECT * FROM comments WHERE id=:id';
    $request = $pdo->prepare($sql);
    $request->bindValue(':id', $id);
    $request->execute();
    foreach($request->fetchAll(PDO::FETCH_ASSOC) as $index => $comment) foreach($comment as $key => $value) $comments[$index][$key] = html_entity_decode($value);
    
    if(isset($comments)) $notes['comments'] = $comments; else $notes['comments'] = [];

    echo(json_encode($notes));