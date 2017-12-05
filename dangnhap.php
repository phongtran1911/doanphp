<?php 
include('Controllers/c_user.php');
$c_user = new C_user();
if(isset($_POST['dangnhap']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $c_user->dangnhapTK($username,md5($password));
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Đăng nhập</title>

    <!-- Bootstrap -->  
   
    <link href="Views/css/bootstrap.css" rel="stylesheet">
    <link href="Views/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Views/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider2.css"/>
  <link href="Views/css/shop-homepage.css" rel="stylesheet">
    <link href="Views/css/my.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="Views/css/mycss.css">
    </style>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="Views/js/html5shiv.min.js"></script>
    <script src="Views/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top text-center" id="idMenu">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand padding-top padding-left" id="logoIndex" href="index.php"><img src="Views/img/header1.png" width="120%"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar" >
                <ul class="nav navbar-nav pull-right">
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                    <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </ul>
              </div>
        </div>
    </nav>
</div>

 <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php 
                    if(isset($_SESSION['user_error']))
                    {
                         echo "<div class='alert alert-danger'>".$_SESSION['user_error']."</div>";
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng nhập</div>
                    <div class="panel-body">
                        <form method="POST" action="#">
                            <div>
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" placeholder="User name" name="username" 
                                >
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <br>
                            <button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Views/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="Views/js/bootstrap.min.js"></script>
<script src="Views/js/my.js"></script>
</body>
</html>