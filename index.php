<?php

session_start();
//unset($_SESSION["cart"]);
include('Controllers/c_sanpham.php');
include('Controllers/c_giohang.php');
$c_sanpham = new C_sanpham();
$noidung = $c_sanpham->index();
$sanpham = $noidung['product'];
//print_r($sanpham);
$noidung1 = $c_sanpham->index1();
$news= $noidung1['news'];
$dm = $c_sanpham->danhmuc();
$danhmuc = $dm['danhmuc'];
$c_giohang = new C_giohang();
//$mahang = isset($_POST['id_sp'])?$_POST['id_sp']:1;
if(isset($_POST['muangay']))
{
     $c_giohang->giohang();
}
// if(isset($_SESSION['cart']))
// {
   
// }

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
                            echo '<li><a href ="giohang.php">('.$total.')<span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                                 ';
                                 
                                 
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
                            <li><a href="dangxuat.php">Đăng xuất</a></li>
                            <li><a href="doimatkhau.php">Đổi mật khẩu</a></li>
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
                              <button type="submit" id="btnSearch" class="btn btn-default" >Tìm kiếm</button>
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

<!--sliderend-->

<div class="container">
    <h3 class="padding-x" >Mỹ Phẩm My Miu</h3>
    <?php foreach ($danhmuc as $value) {
      ?>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a href="loaisp.php?madanhmuc=<?php echo $value->MaDanhMuc?>"><img src="Views/img/Catagory.png" width="95%"/></a>
        <h4><a href="loaisp.php?madanhmuc=<?php echo $value->MaDanhMuc?>"><?=$value->TenDanhMuc?></a></h4>
        <small><p><?=$value->TomTat?></p></small>
    </div>
    <?php  
    }
    ?>
</div>
<!--NewsSlider-->

<div class="container margin-top">

    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
        <h3>
        Sản phẩm</h3>
    </div>
    <div class="container">
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <!-- Controls -->
            <div class="controls pull-right">
                <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                data-slide="next"></a>
            </div>
        </div>
    </div>

    <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
         <form action="#" method="GET" accept-charset="utf-8">
        <div class="carousel-inner" id="datasearch">
            <?php 
    // var_dump($sanpham);

            $sotrangsp = count($sanpham) / 4;
            $sotrangsp = (int)$sotrangsp;   
            $sosptrangcuoicung = count($sanpham) %4;

            $thutusp = 0;
            for($i = 0 ; $i <= $sotrangsp ; $i++)
            {

                ?>  
                <div class="item <?php if($i==0){echo "active";} ?>">
                    <div class="row" >

                        <?php
                        $sospmoitrang = 4;
                        if( $i == $sotrangsp)
                        {   
                            $sospmoitrang = $sosptrangcuoicung;
                        }
                        for($j = $thutusp; $j< $thutusp+ $sospmoitrang ; $j++)
                        {
                            ?> 
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12 margin-top">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="chitiet.php?id_sp=<?=$sanpham[$j]->MaSanPham?>"><img src="Views/img/products/<?php echo $sanpham[$j]->HinhAnhSanPham ?>" style="height: 250px;" class="img-responsive" alt="a"/></a>
                                    </div> 
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-8">
                                                <h5>
                                                    <a href="chitiet.php?id_sp=<?=$sanpham[$j]->MaSanPham?>"><?php echo $sanpham[$j]->TenSanPham; ?></a>
                                                </h5>
                                                <h5 class="price-text-color">
                                                </h5>
                                            </div>
                                            <div class="rating  col-md-4">
                                               <small><p><?php echo number_format($sanpham[$j]->DonGia) ?>đ</p></small>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <small><p><?php echo $sanpham[$j]->TomTat ?></p></small>
                                            <br>
                                           <!--  <form action="#" method="POST" accept-charset="utf-8"> -->
                                            <input type="text" name="id_sp" value="<?php echo $sanpham[$j]->MaSanPham; ?>" hidden="">
                                                 <!-- <button type="submit" name="muangay" class="btn btn-primary" ><small>Mua Ngay</small></button> -->
                                                    
                                                 <a href="themgiohang.php?id_sp=<?php echo $sanpham[$j]->MaSanPham ?>" id="muahang">Mua hàng</a>
                                            
                                          
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } $thutusp= $j; ?> 

                        </div>
                    </div>
                    <?php 
                } 
                ?>
            </div>
            </form>
        </div>
    </div>
<!--NewsSliderEnd-->    
<!--slider2-->
<div class="container margin-top">

    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
        <h3>
           Tin tức mới nhất</h3>
    </div>
<div id="carousel-example" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->

<div class="carousel-inner">
    <div class="item active">
     <div class="row">
    <?php foreach($news as $news)
    {
        ?>
      <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12 margin-top">
            <div class="col-item">
                <div class="photo">
                  <a href="chitiettin.php?id_tin=<?=$news->MaTinTuc?>">  <img src="Views/img/News/<?php echo $news->HinhAnhTinTuc ?>" style="height: 250px;" class="img-responsive" alt="a" /></a>
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-12">
                            <h5><a href="chitiettin.php?id_tin=<?=$news->MaTinTuc?>">
                                <?php echo $news->TenTinTuc ?></a></h5>
                            <h5 class="price-text-color">
                                </h5>   
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <small><p><?php echo $news->ChiTietTinTuc ?></p></small>
                        <br>
                        <button type="button" class="btn btn-primary"><small>Read More</small></button>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <?php
 } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
<!--slider2end-->
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