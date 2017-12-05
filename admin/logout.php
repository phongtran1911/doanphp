
<?php
if (!isset($_SESSION))
session_start();
unset($_SESSION["dadangnhap"]);
header("location:login.php");