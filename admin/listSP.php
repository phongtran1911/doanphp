<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Examples</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            
                            <!-- DO DL vao day  -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên-sản phẩm</th>     
                                            <th>Mô tả sản phẩm</th>
                                            <th>Hình </th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng tồn</th>
                                            <th>Mã danh mục</th>
                                            <th>Mã nhà cung cấp</th>
                                            <th>Tóm tắt</th>
                                            <th>Xóa-Sửa</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($SP as $Spp){
                                            ob_start();
                                        ?>
                                            <tr class="odd gradeX">
                                                <td>{MaSanPham}</td>
                                                <td>{TenSanPham} </td>   
                                                <td>{MoTaSanPham}</td>
                                                <td><img src="../Views/img/products/{HinhAnhSanPham}" width="80" height="100"/></td>
                         
                                                <td>{DonGia}</td>
                                                <td>{SoluongTon}</td>
                                                <td>{MaDanhMuc->TenDanhMuc}</td>
                                                <td>{MaNhaCungCap->TenNhaCungCap}</td>
                                                <td>{TomTat}</td>
                                        
                                                <td><a href="xoaSP.php?idSP={MaSanPham}">Xóa</a>-<a href="index.php?p=suaSP&idSP={MaSanPham}">Sửa</a></td>
                                               
                                            </tr>
                                        
                                        <?php
                                            $s = ob_get_clean();
                                            $s = str_replace("{MaSanPham}",$Spp->MaSanPham,$s);
                                            $s = str_replace("{TenSanPham}",$Spp->TenSanPham,$s);
                                            $s = str_replace("{MoTaSanPham}",$Spp->MoTaSanPham,$s);
                                            $s = str_replace("{HinhAnhSanPham}",$Spp->HinhAnhSanPham,$s);
                                            $s = str_replace("{DonGia}",$Spp->DonGia,$s);
                                            $s = str_replace("{SoluongTon}",$Spp->SoluongTon,$s);
                                            $s = str_replace("{MaDanhMuc->TenDanhMuc}",$Spp->TenDanhMuc,$s);
                                            $s = str_replace("{MaNhaCungCap->TenNhaCungCap}",$Spp->TenNhaCungCap,$s);
                                            $s = str_replace("{TomTat}",$Spp->TomTat,$s);
                                            echo $s;
                                        }?>
                                
                                    </tbody>
                                </table>
                                <!-- /. het thuc do DL  -->
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>