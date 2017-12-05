<?php 
include('database.php');
class M_user extends database
{
    function dangki($name,$username,$password,$mail,$phone,$address)
    {
    	$sql = "INSERT INTO khachhang(TenKhachHang,TaiKhoan,MatKhau,Email,DienThoai,DiaChi) VALUES(?,?,?,?,?,?)";
    	$this->setQuery($sql);
    	$result = $this->execute(array($name,$username,md5($password),$mail,$phone,$address));
    	if($result)
    	{
    		return $this->getLastId();
    	}
    	else
    	{
    		return false;
    	}

    }
    function dangnhap($username,$md5_password)
    {
        $sql = "SELECT * FROM khachhang WHERE TaiKhoan = '$username' and MatKhau = '$md5_password'";
        $this->setQuery($sql);
        return $this->loadRow(array($username,$md5_password));
    }
    function doimatkhau($md5_passwordnew)
    {
        $sql = "UPDATE khachhang set MatKhau = '$md5_passwordnew'";
        $this->setQuery($sql);
        return $this->loadRow(array($md5_passwordnew));
    }
    function layten()
    {
        $sql = "SELECT * FROM khachhang";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}
 ?>