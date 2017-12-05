<?php
	session_start();
	$idSP = $_GET["idSP"];
	var_dump(($idSP));
	unset($_SESSION["cart"][$idSP]);
	header("location:giohang.php");
?>