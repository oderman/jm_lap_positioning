<?php
$server = 'localhost';
$user = 'root'; //lappositioning
$pass = '1234'; //@b=6_Sypr!U)
$dbName = 'latinpositioning_website';


try{
	$pdo = new PDO('mysql:host='.$server.';dbname='.$dbName, $user, $pass);
	//$pdo->exec("SET CHARACTER SET utf-8");
}catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	die();
}