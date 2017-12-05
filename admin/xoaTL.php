
<?php
    //include_once("../controller/c_admin.php");
    //$c_admin = new c_Admin();
   
   // var_dump($idTL);
    //$xoaTL = $c_admin->xoaTheLoai($idTL);
   
?>

<?php

require_once "../Models/m_admin.php";
      if(isset($_GET["idTL"])){
        $idTL = $_GET["idTL"];
        settype($idTL,"int");
    }
    else{
        $idTL = "";
    }
    $m_Admin = new m_Admin();
    //var_dump($idTL);
    //$xoaTL = $c_admin->xoaTheLoai($idTL);
    $xoa = $m_Admin->xoaTL($idTL);
      
    header("location:index.php?p=listTL");

    
    ?>


    
