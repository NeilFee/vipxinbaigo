<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/style.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/nwd.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/jd.css">
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/slider.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/layer.css">
	<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
	<script src="{$config_siteurl}statics/web/js/layer.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$name_img}" width="295" height="215" alt="">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
							<div class="lmsh-detail-tt-sec-address">
								<i class="merch-loc-i"></i>
								<span class="merch-add">商户地址：{$address}</span>
							</div>
							<div class="lmsh-detail-tt-sec-tel">
								<i class="merch-tel-i"></i>
								<span class="merch-tel">联系方式：{$phone}</span>
							</div>
					</div>
				</div>
				
				<div class="detail-show">
					<h1>商户优惠</h1>
				</div>
				{$introduction}
					
			</div>
			</div>
			<div class="bd-b"></div>
		</div>
</body>
	</html>