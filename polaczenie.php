<?php

require_once 'baza_parametry.php';
$pdo = null;
try {
	$polaczenie = "pgsql:host=$host;port=5432;dbname=$nazwa_bazy;";
	// make a database connection
	$pdo = new PDO($polaczenie, $uzytkownik, $haslo, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if ($pdo) {
		//echo "Udane połączenie z $nazwa_bazy !";
	}
} catch (PDOException $e) {
	die($e->getMessage());
} 
?>