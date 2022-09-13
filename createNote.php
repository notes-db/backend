<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    require_once 'services/sanitize.php';

    $pdo = require_once 'services/connect.php';
    
    $sql = 'INSERT INTO notes
            (title,language,tag,content,author,date,sources)
             VALUES
             (:title,:language,:tag,:content,:author,:date,:sources)
            ';
    
    $request = $pdo->prepare($sql);
    $request->bindValue(':title', san($_POST['title']));
    $request->bindValue(':language', san($_POST['language']));
    $request->bindValue(':tag', san($_POST['tag']));
    $request->bindValue(':content', san($_POST['content']));
    $request->bindValue(':author', san($_POST['author']));
    $request->bindValue(':date', date("Y-m-d H:i:s")); //utc
    $request->bindValue(':sources', san($_POST['sources'])); 

    echo(json_encode($request->execute()));