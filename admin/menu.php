<meta charset="utf-8" />

<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php
if(isset($_SESSION['user_name']))
                        {
                            ?>
                            <li style="text-decoration:blink; ">
                                <span class="glyphicon glyphicon-user"></span><?=$_SESSION['user_name']?>
                            <a href="logout.php">Đăng xuất</li>
                            <?php
                        }?> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>				
					
					     <!-- Quan ly  -->                

                      <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Loại Sản Phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?p=listTheloai">Danh Sách Loại Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="index.php?p=themTL">Thêm Loại Sản Phẩm</a>
                            </li>
                                  
                        </ul>
                      </li>  


                      <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Sản Phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?p=listSP">Danh Sách Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="index.php?p=themSP">Thêm Sản Phẩm</a>
                            </li>
                                  
                        </ul>
                      </li>  
                       <!-- //Quan ly  -->       
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  