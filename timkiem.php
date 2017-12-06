<?php
session_start();
      include('Controllers/c_giohang.php');
      $c_tintuc = new C_giohang();
if(isset($_POST['muangay']))
{
     $c_tintuc->giohang();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kết quả tìm kiếm</title>

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
                        echo "<li> Chưa có sản phẩm trong giỏ hàng </li>";
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
      <?php
      if(isset($_POST['tukhoa']))
      {
         $key = $_POST['tukhoa'];
         $news = $c_tintuc->timkiem($key);
         ?>	

     <div class="container margin-top">
        <div><h3>Tìm thấy <?=count($news)?> sản phẩm cho từ khóa <strong><?=$key?></strong></h3></div>
<form action="#" method="POST" accept-charset="utf-8">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
           <!-- Wrapper for slides -->
                   
           <div class="carousel-inner">     
                <div class="item active">
                        <div class="row">
                            <?php foreach ($news as $news) {
                                ?>
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12 margin-top">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="chitiet.php?id_sp=<?=$news->MaSanPham?>">  <img src="Views/img/products/<?php echo $news->HinhAnhSanPham ?>" style="height: 250px;" class="img-responsive" alt="a" /></a>
                                    </div>
                                    <div class="info">
                                            <div class="row">
                                                <div class="price col-md-12">
                                                    <h5><a href="chitiet.php?id_sp=<?=$news->MaSanPham?>">
                                                        <?php echo $news->TenSanPham ?></a></h5>
                                                     <h5 class="price-text-color"></h5>
                                                </div>
                                            </div>
                                     </div>
                                     <div class="separator clear-left">
                                        <small><p><?php echo $news->TomTat ?></p></small>
                                        <br>
                                        <button type="submit" name="muangay" class="btn btn-primary"><small>Mua Ngay</small></button>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                                <?php
                                
                            }?>
                           
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div></form>
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
