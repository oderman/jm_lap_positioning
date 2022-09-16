<?php
include("../conection.php");

$queryUser = $pdo->prepare("SELECT * FROM users WHERE uss_user='".$_POST["user"]."' AND uss_pasword=SHA1('".$_POST["pass"]."')");
$queryUser->execute();
$dataUser = $queryUser->fetch();
$numUser = $queryUser->rowCount();

if($numUser>0)
{
	//INICIO SESION
	session_start();
	$_SESSION["id"] = $dataUser[0];
	
	header("Location:admin/index.php");	
	exit();
}else
{
	header("Location:index.php?error=1");
	exit();
}
?>