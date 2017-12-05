<?php
session_start();
include('Controllers/c_sanpham.php');
$m_sanpham = new C_sanpham();
$chitiet = $m_sanpham->chitiettin();
$chitiettin = $chitiet['ctt'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trang Chủ</title>

    <!-- Bootstrap -->  
   
    <link href="Views/css/bootstrap.css" rel="stylesheet">
    <link href="Views/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Views/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider2.css"/>
  
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
                       <form class="navbar-form navbar-left" role="search" action="timkiem.php" method="POST">
                                <div class="form-group">
                                  <input type="text" id="txtSearch" class="form-control" placeholder="Search" name="tukhoa">
                              </div>
                              <button type="submit" id="btnSearch" class="btn btn-default" >Tìm kiếm</button>
                    </form>
                </ul>
              </div>
        </div>
    </nav>
</div>
<br><br><br>
 <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$chitiettin->TenTinTuc?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?=$chitiettin->TacGia?></a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="Views/img/News/<?=$chitiettin->HinhAnhTinTuc?>" alt="" style="width: 150%;">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$chitiettin->NgayDang?></p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?=$chitiettin->ChiTietTinTuc?></p>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->

        </div>
        <!-- /.row -->
    </div>




<div class="row">
    <div class="container-fluid background-green text-center padding-x margin-top">
        <a href="#"><i class="fa fa-twitter lightgreen padding fontsize"></i></a>
        <a href="#"><i class="fa fa-facebook lightgreen padding fontsize"></i></a>
        <a href="#"><i class="fa fa-dribbble lightgreen padding fontsize"></i></a>
        <a href="#"><i class="fa fa-flickr lightgreen padding fontsize"></i></a>
        <a href="#"><i class="fa fa-github lightgreen padding fontsize"></i></a>
    </div>
    </div>
    <div class="row">
    <div class="container-fluid background-black padding-10">

        <small><a class="padding lightblack" href="#">Trang chủ</a>|</small>
        <small><a class="padding lightblack" href="#">Giới thiệu</a>|</small>
        <small><p class="pull-right lightblack">Copyright @ 2015. Tempelate by <a class="lightblack" href="#"><i>ABC</i></a></p></small>

        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Views/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="Views/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btnSearch").click(function() {
            var keyword = $('#txtSearch').val();
            $.post("timkiem.php",{tukhoa:keyword},function(data){
                $('#datasearch').html(data);
            })
        })
    })
</script>
</body>
</html>