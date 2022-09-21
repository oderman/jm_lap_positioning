<?php
session_start();
if($_SESSION["id"]==""){
	header("Location:../index.php?error=2");
	exit();
}
?>