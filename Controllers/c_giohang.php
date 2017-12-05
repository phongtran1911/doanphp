<?php
if (!isset($_SESSION))
session_start();
require ('Models/m_giohang.php');
class C_giohang{
	public function giohang()
	{			
		$m_giohang = new M_giohang();
		if(isset($_GET['id_sp'])){
			$id = $_GET['id_sp'];
		}else{
			$id = "";
		}
		$sanpham = $m_giohang->getChitietSp($id);	
		$giohang = array();
		if(!isset($_SESSION["cart"])){
			//unset($_SESSION["cart"]);
			$giohang['idSP'] = $sanpham->MaSanPham;
			$giohang['hinh'] = $sanpham->HinhAnhSanPham;
			$giohang['ten']= $sanpham->TenSanPham;
			$giohang['mota'] = $sanpham->TomTat;
			$giohang['motachitiet'] = $sanpham->MoTa;
			$giohang['gia'] =$sanpham->DonGia;
			$giohang['soluong'] = 1 ;
			$giohang['tongtien'] = $giohang['soluong'] * $giohang['gia'];
			$_SESSION['cart'][$id] = $giohang;
		}elseif(array_key_exists($id,$_SESSION['cart']))
		{
			$_SESSION['cart'][$id]['soluong'] += 1;
			//unset($_SESSION["cart"]);
		}else{
			//unset($_SESSION["cart"]);
			$giohang['idSP'] = $sanpham->MaSanPham;
			$giohang['hinh'] = $sanpham->HinhAnhSanPham;
			$giohang['ten']= $sanpham->TenSanPham;
			$giohang['mota'] = $sanpham->TomTat;
			$giohang['motachitiet'] = $sanpham->MoTa;
			$giohang['gia'] =$sanpham->DonGia;
			$giohang['soluong'] = 1 ;
			$giohang['tongtien'] = $giohang['soluong'] * $giohang['gia'];
			$_SESSION['cart'][$id] = $giohang;
			
		}
	}
	public function donhang($idDonhang,$idUser,$idSanpham,$ngaydat,$ngaygiao,$soluong,$thanhtien,$dathanhtoan,$tinhtrang)
	{
		$m_giohang = new M_giohang();
		$donhang = $m_giohang->setDonhang($idDonhang,$idUser,$idSanpham,$ngaydat,$ngaygiao,$soluong,$thanhtien,$dathanhtoan,$tinhtrang);
	}
	public function chitietdonhang($idDonhang,$idSanpham,$soluong,$dongia,$thanhtien)
	{
		$m_giohang = new M_giohang();
		$chitet = $m_giohang->addChitietDH($idDonhang,$idSanpham,$soluong,$dongia,$thanhtien);
	}
	public function huydonhang($idDonhang,$idUser)
	{
		$m_giohang = new M_giohang();
		$huy = $m_giohang->destroyDH($idDonhang,$idUser);
	}
}

 ?>
