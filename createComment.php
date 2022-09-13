<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once 'services/sanitize.php';

    $pdo = require_once 'services/connect.php';
    
    $sql = 'INSERT INTO comments
            (id,author,content,date)
             VALUES
             (:id,:author,:content,:date)
            ';
    
    $request = $pdo->prepare($sql);
    $request->bindValue(':id', san($_POST['id']));
    $request->bindValue(':content', san($_POST['content']));
    $request->bindValue(':author', san($_POST['author']));
    $request->bindValue(':date', date("Y-m-d H:i:s")); //utc

    echo(json_encode($request->execute()));