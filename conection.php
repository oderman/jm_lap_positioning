<?php
$server = 'localhost';
$user = 'root';
$pass = 'zefe07EL';
$dbName = 'latinpositioning_website';


try{
	$pdo = new PDO('mysql:host='.$server.';dbname='.$dbName, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$pdo->exec("SET CHARACTER SET utf-8");
}catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	die();
}