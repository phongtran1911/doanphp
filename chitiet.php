<?php 
session_start();
include('Controllers/c_sanpham.php');
include('Controllers/c_giohang.php');
$c_sanpham = new C_sanpham();
$chitiet = $c_sanpham->chitietsp();
$chitietsanpham=$chitiet['chitietsp'];
//print_r($chitietsanpham);
$hinh = $c_sanpham->layhinh();
$hinhsp = $hinh['hinhsp'];
$spcungloai=$chitiet['sanphamcungloai'];
// $spcungloai=$c_sanpham->sanphamcungloai();
// $sanphamcungloai = $spcungloai['sanphamcungloai'];
$noidung = $c_sanpham->lay1sanpham();
$sanpham = $noidung['product1'];
$c_giohang = new C_giohang();
if(isset($_POST['muangay']))
{
     $c_giohang->giohang();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chi tiết sản phẩm</title>

    <!-- Bootstrap -->  
   
    <link href="Views/css/bootstrap.css" rel="stylesheet">
    <link href="Views/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Views/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider2.css"/>
         <link rel="stylesheet" type="text/css" href="Views/css/mycss.css">
    <link id="callCss" rel="stylesheet" href="Views/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="Views/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 


<!-- Google-code-prettify -->   
    <link href="Views/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
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
                     <?php
                    if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
                        echo '<li><a href=""> Chưa có sản phẩm trong giỏ hàng</a></li>';
                        }
                    else
                        {           
                         $total = 0 ;
                        foreach ($_SESSION['cart'] as $value) {
                            $total+=$value['soluong'];
                                }
                          echo '<li><a href ="giohang.php">('.$total.')<span class="glyphicon glyphicon-shopping-cart"></span></a></li>';
                        }
                  ?>

                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <?php
                        if(isset($_SESSION['user_name']))
                        {
                            ?>
                            <li>
                                <a><span class="glyphicon glyphicon-user"></span><?=$_SESSION['user_name']?></a>
                            </li>
                            <li><a href="dangxuat.php">Đăng xuất</li>
                            <?php
                        }
                        else {
                            ?>
                            <li><a href="dangky.php">Đăng ký</a></li>
                            <li><a href="dangnhap.php">Đăng nhập</a></li>
                            <?php
                        }
                     ?>
                                        <form class="navbar-form navbar-left" role="search" action="timkiem.php" method="POST">
                        <div class="form-group">
                          <input type="text" id="txtSearch" class="form-control" placeholder="Search" name="tukhoa">
                      </div>
                      <button type="submit" id="btnSearch" class="btn btn-default">Tìm kiếm</button>
                  </form>
                </ul>
              </div>
        </div>
    </nav>
</div>


<div class="row">
<div class="container-fluid">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="Views/img/newslider1.jpg" width="100%" alt="First slide">

                    </div>
                    <div class="item">
                        <img src="Views/img/newslider2.jpg" width="100%" alt="Second slide">

                    </div>
                    <div class="item">
                        <img src="Views/img/newslider3.jpg" width="100%" alt="Third slide">

                    </div>
                </div>

                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" 
                    href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                    </span>
        </a>
        </div>
    </div>
</div>
</div>
<div id="push">
</div>

<div class="span9" style="vertical-align: center;">
    <ul class="breadcrumb">
    <li><a href="index.php">Trang Chủ</a> <span class="divider">/</span></li>
    <li>Sản Phẩm</li>
    <li class="active">Chi tiết sản phẩm</li>
    </ul> 
   
            <div class="row">     
            <div id="gallery" class="span3">
            <a href="Views/img/products/<?=$chitietsanpham->HinhAnhSanPham?>">
                <img src="Views/img/products/<?=$chitietsanpham->HinhAnhSanPham?>" style="width:80%"/>
            </a>
            <?php
            foreach ($hinhsp as $a) {
                ?>
        <div id="differentview" class="moreOptopm carousel slide">
        <div class="carousel-inner">
          <div class="item active">
           <a href="Views/img/products/<?=$a->Tenhinh?>"> <img style="width:29%" src="Views/img/products/<?=$a->Tenhinh?>" alt=""/></a>
          </div>
        </div>
        </div>             
            <?php                
            }
            ?>
            </div>
        <form action="#" method="post" accept-charset="utf-8">
            <div class="span6">
                <h3><?=$chitietsanpham->TenSanPham?></h3>
                <small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>
                <hr class="soft"/>
                <div class="control-group">
                    <label class="control-label"><span><?=number_format($chitietsanpham->DonGia)?>đ</span></label>
                    <div class="controls">
                    <input type="number" class="span1" placeholder="Số lượng" style="width: 80px;"/>    
                     <button type="submit" name="muangay" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        </form>
    <hr class="soft clr"/>
                <p>
                <?=$chitietsanpham->TomTat?>
                </p>
                <a class="btn btn-small pull-right" href="#detail">More Details</a>
                <br class="clr"/>
            <a href="#" name="detail"></a>
            <hr class="soft"/>
</div>
            <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Sản phẩm chi tiết</a></li>
              <li><a href="#profile" data-toggle="tab">Sản phẩm cùng loại</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
              <h4>Thông tin sản phẩm</h4>
                <?=$chitietsanpham->MoTaSanPham?>
              </div>
              <div class="tab-pane fade" id="profile">
               
               <br class="clr"/>
               <hr class="soft"/> 

               <div class="tab-content">
                           <form action="#" method="POST" accept-charset="utf-8">
            <div class="tab-pane" id="listView">

                   <?php
                    foreach ($spcungloai as $value) {
                      ?>
                <div class="row">     
                        <div class="span2">
                           <a href="chitiet.php?id_sp=<?=$value->MaSanPham?>"> <img src="Views/img/products/<?=$value->HinhAnhSanPham?>" style="height: 150px; width: 100%;   "/></a>
                        </div>
                        <div class="span4">
                            <a href="chitiet.php?id_sp=<?=$value->MaSanPham?>"><h3><?=$value->TenSanPham?></h3></a>               
                            <hr class="soft"/>
                            <p>
                                <?=$value->TomTat?>
                            </p>
                            <a class="btn btn-large pull-right" href="chitiet.php?id_sp=<?=$value->MaSanPham?>">View Details</a>
                            <br class="clr"/>
                        </div>
                        <div class="span3 alignR">
                                <h3><?=number_format($value->DonGia)?></h3>

                    
                </div>
            </div>


                      <?php  
                    }
                   ?>
                  
                  <hr class="soft"/>
        </div>    </form>
</div>
<br class="clr">
</div>
        </div>
          </div>

</div>
</div>
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
<script src="Views/themes/js/jquery.js" type="text/javascript"></script>
    <script src="Views/themes/js/google-code-prettify/prettify.js"></script>
    
    <script src="Views/themes/js/bootshop.js"></script>
    <script src="Views/themes/js/jquery.lightbox-0.5.js"></script>
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