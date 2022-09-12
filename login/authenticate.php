	<?php
include("../conection.php");

$result_user = $pdo->prepare("SELECT * FROM users WHERE uss_user='".$_POST["user"]."' AND uss_pasword=SHA1('".$_POST["pass"]."')");
$result_user->execute();
$fila = $result_user->fetch();
$num = $result_user->rowCount();

if($num>0)
{
	//INICIO SESION
	session_start();
	$_SESSION["id"] = $fila[0];
	$url = 'admin/index.php';
	
	header("Location:".$url);	
	exit();
}else
{
	header("Location:index.php?error=1");
	exit();
}
?>