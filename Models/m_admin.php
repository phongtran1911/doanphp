<?php
require "database.php";
class m_Admin extends database{
        function getTL(){
            $sql = "SELECT  * from danhmuc
            ";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        // function getloaiSP(){
        //     $sql = "SELECT  loaiSP.*,tenTL from loaiSP,theloai
        //             where loaiSP.idTL = theloai.idTL
        //             ORDER BY idloaiSP DESC
        //      ";
        //     $this->setQuery($sql);
        //     return $this->loadAllRows();
        // }
        function getSP(){
            $sql = "SELECT  sanpham.*,TenDanhMuc,TenNhaCungCap
                    FROM sanpham,danhmuc,nhacungcap 
                    WHERE sanpham.MaDanhMuc = danhmuc.MaDanhMuc and sanpham.MaNhaCungCap=nhacungcap.MaNhaCungCap
                    ORDER BY MaSanPham DESC";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
            /////////// THE LOAI
        function themTL($tenTL,$tomtat){
            $sql = "INSERT INTO danhmuc(TenDanhMuc,TomTat) values(?,?)";
            $this->setQuery($sql);
            $result = $this->execute(array($tenTL,$tomtat));
            if($result){
                return $this->getLastId();
            }
            else{
                return false;
            }
        }
        function xoaTL($idTL){
            if($this->tinhsosp($idTL)<=0)
            {
              $sql = "DELETE FROM danhmuc
                    WHERE MaDanhMuc = '$idTL'
                ";
             $this->setQuery($sql);
             return $this->execute(array($idTL));
            } 
            return false;
        }
        function tinhsosp($idTL)
        {
          $sql = "SELECT * FROM sanpham WHERE MaDanhMuc ='$idTL' ";
          $this->setQuery($sql);
          $soluong = count($this->loadAllRows(array($idTL)));
          return $soluong;
        }
        // lay the loai theo ID 
        function DanhMuc_ID($idDM){
            $sql="SELECT * FROM danhmuc
                  WHERE MaDanhMuc = $idDM  
            ";
            $this->setQuery($sql);
            return $this->loadRow(array($idDM));
        }
        function suaDM1($idDM,$tenDM,$tomtat){
            $sql="UPDATE danhmuc set 
                    TenDanhMuc ='$tenDM',
                    TomTat ='$tomtat'
                    where MaDanhMuc = $idDM               
            ";
            $this->setQuery($sql);
            return $this->execute(array($idDM,$tenDM,$tomtat));
        }  


        /// SAN PHAM
        function themSP($tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat){
            $sql=" INSERT INTO
                sanpham(TenSanPham,MoTaSanPham,HinhAnhSanPham,DonGia,SoluongTon,MaDanhMuc,MaNhaCungCap,TomTat)
                 values(?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute(array($tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat));
         }

         function xoaSP($idSP){
             $sql="DELETE FROM sanpham
                   where MaSanPham = $idSP
             ";
             $this->setQuery($sql);
             return $this->execute(array($idSP));
         }
         function sp_ID($idSP){
             $sql = "SELECT * FROM sanpham
                    WHERE MaSanPham = $idSP 
            ";
            $this->setQuery($sql);
            return $this->loadRow(array($idSP));
         }

         function suaSP_ID($idSP,$tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat){
             $sql = "UPDATE sanpham set
                    TenSanPham = '$tenSP',
                    MoTaSanPham='$mota',
                    HinhAnhSanPham='$hinh',
                    DonGia='$dongia',
                    SoluongTon='$soluongton',
                    MaDanhMuc='$madanhmuc',
                    MaNhaCungCap='$manhacungcap',
                    TomTat ='$tomtat'
                    where MaSanPham = '$idSP'
             ";
             $this->setQuery($sql);
             return $this->execute(array($idSP,$tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat));    
                  }
    function dangnhapadmin($username,$md5_password)
    {
        $sql = "SELECT * FROM admin WHERE Username = '$username' and Password = '$md5_password'";
        $this->setQuery($sql);
        return $this->loadRow(array($username,$md5_password));
    }
}
?>