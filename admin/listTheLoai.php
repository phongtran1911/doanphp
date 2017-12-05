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
                                            <th>Danh Mục</th>
                                            <th>Tên Danh Mục</th>
                                            <th>Tóm Tắt</th>
                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($TL as $tll){
                                            ob_start();
                                        ?>
                                            <tr class="odd gradeX">
                                                <td>{MaDanhMuc}</td>
                                                <td>{TenDanhMuc}</td>
                                                <td>{TomTat}</td>
                                            
                                                <td><a href="xoaTL.php?idTL={MaDanhMuc}">Xóa</a>-<a href="index.php?p=suaTL&idDM={MaDanhMuc}">Sửa</a></td>
                                                
                                            </tr>
                                        
                                        <?php
                                            $s = ob_get_clean();
                                            $s = str_replace("{MaDanhMuc}",$tll->MaDanhMuc,$s);
                                            $s = str_replace("{TenDanhMuc}",$tll->TenDanhMuc,$s);
                                            $s = str_replace("{TomTat}",$tll->TomTat,$s);
                                        
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