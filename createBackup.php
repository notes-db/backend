<?php
    $pdo = require_once 'services/connect.php';
    require_once 'services/credentials.php';
    
    $sql = 'SELECT * FROM notes';
    $request = $pdo->prepare($sql);
    $request->execute();
    $notes = json_encode($request->fetchAll(PDO::FETCH_ASSOC));
    
    $sql = 'SELECT * FROM comments';
    $request = $pdo->prepare($sql);
    $request->execute();
    $comments = json_encode($request->fetchAll(PDO::FETCH_ASSOC));

    ///TODO mods
    $final = array("notes" => $notes, "comments" => $comments);
    mail($email, 'Notes-lib backup' . date("Y-m-d H:i:s"), json_encode($final));