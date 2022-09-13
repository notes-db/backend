<?php

require_once 'credentials.php';

function connect(string $host, string $db, string $user, string $password)
{
	try {
		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
		return $conn;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

return connect($host, $db, $user, $password);