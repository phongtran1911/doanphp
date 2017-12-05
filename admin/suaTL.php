<meta charset="utf-8">
<link id="callCss" rel="stylesheet" href="../public/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="../public/themes/css/base.css" rel="stylesheet" media="screen"/>
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
<form class="form-horizontal" method="post" action="#" >
		<h4>SỬA THỂ LOẠI</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Tên Danh Mục <sup>*</sup></label>
			<div class="controls">
			  <input type="text" value="<?php echo $TL_ID->TenDanhMuc ?>" id="txtDM" name="txtDM" placeholder="Tên Danh Mục">
			</div> 
		 </div>

		 
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Tóm Tắt <sup>*</sup></label>
		<div class="controls">
		 <textarea  name="tomtat" id="tomtat" cols="10" rows="3"><?php  echo $TL_ID->TomTat ?></textarea>
		</div>
		</div>
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Sửa"  name="btnSua"/>
			</div>
		</div>		
	</form>
</div>

</div>
</div>
</div>
</div>

