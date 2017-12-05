
<?php
require_once "../Models/m_admin.php";
if(isset($_GET["idSP"])){
        $idSP = $_GET["idSP"];
        settype($idSP,"int");
    }else{
        $idSP = "";
    }
    $m_admin = new m_Admin();
    $xoa = $m_admin->xoaSP($idSP);
    header("location:index.php?p=listSP");
?>