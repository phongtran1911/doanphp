
<?php
session_start();
include ('Models/m_user.php');
class C_user{
	function dangkiTK($name,$username,$password,$mail,$phone,$address)
	{
		$m_user = new M_user();
		$id_user = $m_user->dangki($name,$username,$password,$mail,$phone,$address);
		if($id_user>0)
		{
			$_SESSION['success'] = "Đăng ký thành công!";
			header('location:index.php');
			if(isset($_SESSION['error']))
			{
				unset($_SESSION['error']);
			}
		}
		else
		{
			$_SESSION['error'] = "Đăng ký không thành công!";
			header('location:dangky.php');
		}
	}
	function dangnhapTK($username,$password)
	{
		$m_user = new M_user();
		$user = $m_user->dangnhap($username,$password);
		if($user == true)
		{
			$_SESSION['user_name'] = $user->TenKhachHang;
			header('location:index.php');
			if(isset($_SESSION['user_error']))
			{
				unset($_SESSION['user_error']);
			}
		}
		else
		{
			$_SESSION['user_error'] = "Đăng nhập không thành công!";
			header('location:dangnhap.php');
		}
	}
	function doimatkhau($username,$password,$passwordnew)
	{
		$m_user = new M_user();
		$user =$m_user->dangnhap($username,$password);
		if($user == false)
		{
			$_SESSION['user_error'] = "Tài khoản hoặc mật khẩu sai!";
			header('location:doimatkhau.php');
		}
		else
		{
			$user = $m_user->doimatkhau($passwordnew);
			header('location:index.php');
			if(isset($_SESSION['user_error']))
			{
				unset($_SESSION['user_error']);
			}
		}
	}
	function layten()
	{
		$m_user = new M_user();
		$user = $m_user->layten();
		return array('ten'=>$user);
	}
	function dangxuat()
	{
		session_destroy();
		header('location:index.php');
	}
}
?>
