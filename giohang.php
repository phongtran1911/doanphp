<?php
session_start();
include('Controllers/c_giohang.php');
$c_sanpham = new C_giohang();

$flag=null;
if(!isset($_SESSION["cart"])){
	$flag = false;
}else{
	foreach ($_SESSION["cart"] as $value) {
		if(isset($value["idSP"])){
			$flag = true;
		}else{
			$flag = false;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Giỏ hàng</title>

    <!-- Bootstrap -->  
   
    <link href="Views/css/bootstrap.css" rel="stylesheet">
    <link href="Views/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Views/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/slider2.css"/>
    <link rel="stylesheet" type="text/css" href="Views/css/cart.css"/>
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
<?php
    if($flag ==false){
        header("location:index.php");
    }else{
    if(isset($_SESSION['cart']))
    {
?>
<div class="cart-bottom">
    <div class="table">
        <table>
            <tbody>
              <tr  class="main-heading">                
                    <th>Hình</th>
                    <th class="long-txt">Mô tả</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>                      
             </tr>
            <?php foreach ($_SESSION['cart'] as $key=>$value) {
            ?>

            <tr class="cake-top">
                <td class="cakes">                
                    <div class="product-img" style="width: 30px;">
                        <img src="Views/img/products/<?php echo $value["hinh"]?>">
                    </div>
                </td>
                <td class="cake-text">
                    <div class="product-text">
                        <h3><?php echo substr($value["motachitiet"],0,100) ?></h3>
                        <p><?php echo $value["mota"]?></p>
                    </div>
                </td>
                <td class="quantity">                
                  <div class="product-right">
                     <input min="1" type="number" id="quantity" name="quantity" value="<?php $value["soluong"]?>" class="form-control input-small">               
                  </div>
                </td>
                <td class="price">
                    <h4><?php echo number_format($value["gia"])?></h4>                 
                </td>
                <td class="top-remove">
                    <h4><?php echo number_format($value["soluong"] * $value["tongtien"]) ?></h4>
                    <div class="close">
                      <a href="xoa.php?idSP=<?php echo $value['idSP']?>"><h5>Remove</h5></a>
                    </div>
                </td>
                
            </tr>

               <?php
               }
               ?>  
           </tbody>
        </table>
    </div>
    <div class="vocher">
        <div class="dis-total">
            <h1>Total 
            <?php
                echo $value["tongtien"]+=$value["tongtien"];
            ?>
                
            </h1>
            <div class="tot-btn">
                <a class="shop" href="index.php">Back to Shop</a>
                <a class="check" href="#">Continue to Checkout</a>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<?php
}
}
 ?>



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
<script src="Views/js/jquery-1.11.0.min.js"></script>
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