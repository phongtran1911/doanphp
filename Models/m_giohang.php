<?php
require_once('database.php');
class M_giohang extends database{

	public function getchitietsp($id)
    {
    	$sql = "SELECT * FROM sanpham WHERE MaSanPham=$id";
    	$this->setquery($sql);
    	return $this->loadrow(array($id));
    }
    //thêm đơn hàng
    public function setDonhang($idDonhang,$idUser,$idSanpham,$ngaydat,$ngaygiao,$soluong,$thanhtien,$dathanhtoan,$tinhtrang)
    {
    	$sql = "INSERT INTO donhang (MaDonHang,MaKhachHang,MaSanPham,NgayDat,NgayGiao,Soluong,Thanhtien,DaThanhToan,TinhTrangGiaoHang) values(?,?,?,?,?,?,?,?,?)";
    	$this->setquery($sql);
    	$kq = $this->execute(array($idDonhang,$idUser,$idSanpham,$ngaydat,$ngaygiao,$soluong,$thanhtien,$dathanhtoan,$tinhtrang));
    	if($kq){
    		return $this->getLastId();
    	}
    	else
    	{
    		return false;
    	}
    }
    //them chitietdonhang
    public function addChitietDH($idDonhang,$idSanpham,$soluong,$dongia,$thanhtien)
    {
    	$sql = "INSERT INTO chitietdonhang (MaDonHang,MaSanPham,SoLuong,DonGia,Thanhtien) values(?,?,?,?,?)";
    	$this->setquery($sql);
    	$kq = $this->execute(array($idDonhang,$idSanpham,$soluong,$dongia,$thanhtien));
    	if($kq){
    		return $this->getLastId();
    	}
    	else
    	{
    		return false;
    	}
    }
    public function destroyDH($idDonhang,$idUser)
    {
    	$sql = "DELETE donhang, chitietdonhang FROM donhang INNER JOIN chitietdonhang ON donhang.MaDonHang = chitietdonhang.MaDonHang WHERE donhang.MaDonHang = $idDonhang AND donhang.MaKhachHang = chitietdonhang.MaKhachHang AND donhang.MaKhachHang = $idUser";
    	$this->setquery($sql);
    	return $this->execute(array($idDonhang,$idUser));
    }

}	
 ?>
