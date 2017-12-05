<?php
    if(isset($_GET["idloaiSP"])){
        $idloaiSP = $_GET["idloaiSP"];
        settype($idloaiSP,"int");
    }else{
        $idloaiSP = "";
    }
    require "../Models/m_admin.php";
    $m_admin = new m_Admin();
    $xoaloaiSP = $m_admin->xoaloaiSP($idloaiSP);
    header("location:index.php?p=listloaiSP");

?>
