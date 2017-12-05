<?php
	include_once('Controllers/c_giohang.php');
	$c_sanpham = new C_giohang();
	$noidung = $c_sanpham->giohang();
	header("location:index.php")
?>