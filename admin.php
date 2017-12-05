<?php
    $noidung = $c_admin->theloai();
   // var_dump($noidung);
    $TL = $noidung["TLoai"];
   // var_dump($TL);
?>



<?php
    $noidung = $c_admin->SanPham();
    $SP = $noidung["SPham"];
   // var_dump($SP);
?>
<?php
    if(isset($_POST["btnThem"])){
        $tenTL = $_POST["txtTL"];
        $tomtat = $_POST["tomtat"];
          $noidung = $c_admin->themTheLoai($tenTL,$tomtat);
        header("location:index.php?p=listTL");
        }   
?>

<?php
    if(isset($_GET["idDM"])){
        $idDM = $_GET["idDM"];
        settype($idDM,"int");
    }
    else{
        $idDM = "";
    }
    //var_dump($idTL);
    $noidung = $c_admin->DanhMuc_ID($idDM);
    $TL_ID = $noidung["danhmuc"];
    //var_dump($TL_ID);
    if(isset($_POST["btnSua"])){
        $tenDM = $_POST["txtDM"];   
        $tomtat = $_POST["tomtat"];
    
        $noidung = $c_admin->suaDM($idDM,$tenDM,$tomtat);
        header("location:index.php?p=listTL");
    }
    //var_dump($TL_ID);
?>

 
<?php ///////////////// SAN PHAM    ?>

<?php
    if(isset($_POST["btnThemSP"])){
        $tenSP = $_POST["sp"];
        $mota = $_POST["mota"];
        $hinh = $_POST["hinh"];
        $dongia = $_POST["gia"];
        $soluongton = $_POST["soluong"];
        $madanhmuc = $_POST["madanhmuc"];
        $manhacungcap = $_POST["MaNhaCungCap"];
        $tomtat = $_POST["tomtat"];
        var_dump($tenSP);
    $noidung = $c_admin->themSP($tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat);
     header("location:index.php?p=listSP");   
}

?>

<?php
     if(isset($_GET["idSP"])){
        $idSP = $_GET["idSP"];
        settype($idSP,"int");
    }else{
        $idSP ="";
    }
    $noidung = $c_admin->sp_ID($idSP);
    $sp = $noidung["sp"];
    if(isset($_POST["btnSuaSP"])){
        $tenSP = $_POST["sp"];
        $mota = $_POST["mota"];
        $hinh = $_POST["hinh"];
        $dongia = $_POST["gia"];
        $soluongton = $_POST["soluong"];
        $madanhmuc = $_POST["madanhmuc"];
        $manhacungcap = $_POST["MaNhaCungCap"];
        $tomtat = $_POST["tomtat"];
$noidung = $c_admin->suaSP_ID($idSP,$tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat);
    header("location:index.php?p=listSP");
}
?>