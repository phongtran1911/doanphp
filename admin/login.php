
<?php
// if (!isset($_SESSION))
// session_start();
require "../Controllers/c_admin.php" ;
    $c_admin = new c_Admin();
if(isset($_POST['btnDN']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];
  $a = $c_admin->dangnhapad($username,$password);
   //var_dump($a);die;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Đăng nhập admin | Sign In</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="assets/css/invalid.css" type="text/css" media="screen" />	
	
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="assets/js/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="assets/js/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="assets/js/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="assets/js/jquery.wysiwyg.js"></script>
		
	
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Quản trị Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="assets/img/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			<?php 
                    if(isset($_SESSION['ad_error']))
                    {
                         echo "<div class='alert alert-danger'>".$_SESSION['ad_error']."</div>";
                    }
                ?>
			<div id="login-content">
				
				<form action="#" method="POST">
				
					<div class="notification information png_bg">
						
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username" id="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" id="password" />
					</p>
					<div class="clear"></div>
				
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" name="btnDN" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
