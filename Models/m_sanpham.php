<?php
include('database.php');
/**
 * summary
 */
class M_sanpham extends database
{
    /**
     * summary
     */
    public function getSanpham()
    {
       $sql = 'SELECT * FROM sanpham';
       $this->setQuery($sql);
		return $this->loadAllRows();
    }
    public function getTintuc()
    {
    	$sql = 'SELECT * FROM tintuc';
    	$this->setQuery($sql);
    	return $this->loadAllRows();
    }
    public function getSanphambyID($MaDanhMuc)
    {
    	$sql = "SELECT * FROM sanpham join danhmuc on sanpham.MaDanhMuc=danhmuc.MaDanhMuc WHERE danhmuc.MaDanhMuc = $MaDanhMuc";
    	$this->setQuery($sql);
    	return $this->loadAllRows(array($MaDanhMuc));
    }
    public function getDanhMuc()
    {
    	$sql = 'SELECT * FROM danhmuc';
    	$this->setQuery($sql);
    	return $this->loadAllRows();
    }
    public function getChitietSp($id)
    {
    	$sql = "SELECT * FROM sanpham  where MaSanPham=$id";
    	$this->setQuery($sql);
    	return $this->loadRow(array($id));
    }
    public function getspbyID($id)
    {
        $sql = "SELECT * FROM sanpham where MaSanPham=$id";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    public function getChitietTin($id_tin)
    {
        $sql = "SELECT * FROM tintuc where MaTinTuc=$id_tin";
        $this->setQuery($sql);
        return $this->loadRow(array($id_tin));
    }
    public function search($key)
    {
        $sql = "SELECT sanpham.*, danhmuc.TenDanhMuc FROM sanpham INNER JOIN danhmuc ON sanpham.MaDanhMuc = danhmuc.MaDanhMuc where sanpham.TenSanPham like '%$key%' or sanpham.TomTat like '%$key%'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($key));
    }
    public function getHinh($MaSanPham)
    {
        $sql= "SELECT * FROM sanpham INNER JOIN hinh on sanpham.MaSanPham=hinh.MaSanPham WHERE hinh.MaSanPham=$MaSanPham";
        $this->setQuery($sql);
        return $this->loadAllRows(array($MaSanPham));
    }
    public function getChitietSpCungLoai($id,$idloai)
    {
        $sql = "SELECT * FROM sanpham WHERE MaSanPham <> $id AND MaDanhMuc = $idloai ORDER BY MaSanPham DESC LIMIT 0,6";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id,$idloai));
    }
    public function get1sp()
    {
        $sql = 'SELECT * FROM sanpham';
        $this->setQuery($sql);
        return $this->loadRow();
    }
}
?>