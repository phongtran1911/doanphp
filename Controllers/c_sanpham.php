<?php
if (!isset($_SESSION))
session_start();
include('Models/m_sanpham.php');

class C_sanpham{
	public function index()
	{
		$m_sanpham = new M_sanpham();
		$product = $m_sanpham->getSanpham();
		return array('product'=>$product);
	}
	public function lay1sanpham()
	{
		$m_sanpham = new M_sanpham();
		$product = $m_sanpham->get1sp();
		return array('product1'=>$product);
	}
	public function index1()
	{
		$m_sanpham = new M_sanpham();
		$news = $m_sanpham->getTintuc();
		return array('news'=>$news);
	}
	public function loaisanpham()
	{
		$id_loai = $_GET['madanhmuc'];
		$m_sanpham =  new M_sanpham();
		$danhmucsp = $m_sanpham->getSanphambyID($id_loai);
		return array('danhmucsp'=>$danhmucsp);
	}
	public function danhmuc()
	{
		$m_sanpham = new M_sanpham();
		$dm = $m_sanpham->getdanhmuc();
		return array('danhmuc'=>$dm);
	}
	public function chitietsp()
	{
		$id_sp = $_GET['id_sp'];
		$m_sanpham = new M_sanpham();
		$ct = $m_sanpham->getChitietSp($id_sp);
		$spnext = $m_sanpham->getChitietSpCungLoai($id_sp,$ct->MaDanhMuc);
		return array('chitietsp'=>$ct,'sanphamcungloai'=>$spnext);
	}
	public function chitiettin()
	{
		$id_tin = $_GET['id_tin'];
		$m_sanpham = new M_sanpham();
		$ctt = $m_sanpham->getChitietTin($id_tin);
		return array('ctt'=>$ctt);
	}
	public function timkiem($key)
	{
		$m_sanpham = new M_sanpham();
		$sp = $m_sanpham->search($key);
		return $sp;
	}
	public function layhinh()
	{
		$id_sp = $_GET['id_sp'];
		$m_sanpham = new M_sanpham();
		$hinhsp = $m_sanpham->getHinh($id_sp);
		return array('hinhsp'=>$hinhsp);
	}

		
}
?>