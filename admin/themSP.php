<meta charset="utf-8">

<!-- Bootstrap style responsive -->	

	<link href="../public/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="../public/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="../public/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="../public/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../public/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../public/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../public/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../public/themes/images/ico/apple-touch-icon-57-precomposed.png">
<form class="form-horizontal" method="post" action="" >
        
		<h4>THÊM SẢN PHẨM</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Tên Sản Phẩm <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="sp" name="sp" placeholder="Tên Sản Phẩm">
			</div> 
		 </div>
    	  <div class="control-group">
            <label class="control-label" for="inputLnam">Mô Tả <sup>*</sup></label>
            <div class="controls">
            <textarea name="mota" id="mota" cols="45" rows="5"></textarea>
                <script type="text/javascript" src="javascript.js"></script>        
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputLnam">Hình <sup>*</sup></label>       
                <div class="controls">
                    <input type="text" id="hinh" name="hinh" placeholder="Hình">                           
                     <input onclick="BrowseServer('img:/','hinh')" type="button" id="btnChonFile" name="btnChonFile" value="Chọn Hình" action="none" >       
                </div>
            </div>        
        
        <div class="control-group">
            <label class="control-label" for="inputLnam">Giá <sup>*</sup></label>
            <div class="controls">
            <input type="text" id="gia" name="gia" placeholder="Giá">
            </div>
        </div>
		 
       <div class="control-group">
            <label class="control-label" for="inputLnam">Số lượng tồn<sup>*</sup></label>
            <div class="controls">
            <input type="text" id="soluong" name="soluong" placeholder="Số lượng tồn">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputLnam">Danh Mục <sup>*</sup></label>
            <div class="controls">
            <select name="madanhmuc" id="madanhmuc">
                    <?php
                        foreach($TL as $tll){                   
                    ?>
                      <option value="<?php echo $tll->MaDanhMuc ?>"><?php echo $tll->TenDanhMuc ?></option>
                     
                    <?php }?>
            </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputLnam">Nhà Cung Cấp<sup>*</sup></label>
            <div class="controls">
            <select name="MaNhaCungCap" id="MaNhaCungCap">
                    <?php
                        foreach($SP as $tll){                   
                    ?>
                      <option value="<?php echo $tll->MaNhaCungCap ?>"><?php echo $tll->TenNhaCungCap ?></option>
                     
                    <?php }?>
            </select>
            </div>
        </div>


         <div class="control-group">
			<label class="control-label" for="inputFname1">Tóm Tắt<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="tomtat" name="tomtat" placeholder="Tóm Tắt">
			</div> 
		 </div>


		
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Thêm"  name="btnThemSP"/>
			</div>
		</div>		
	</form>
</div>

</div>
</div>
</div>
</div>

