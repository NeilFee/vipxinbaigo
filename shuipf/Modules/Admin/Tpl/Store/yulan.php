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
						<img src="{$images_url}" width="285" height="215" alt="{$name}">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
						<div class="about-info-list">
							
							<span>门店地址：{$address}</span>
							<span>服务电话：{$phone}</span>
						</div>
					</div>
				</div>
				
				<div class="detail-show">
					<h1>门店介绍</h1>
					<span class="about-store-intro">
					{$introduction}
					</span>
				<div class="about-store-gen">
						<h1>门店概况</h1>
						<ul class="about-store-list">
							<li>营业时间: {$opening_time}</li>
							<li>地址：{$address}<i class="loc"></i></li>
							<li>邮编：{$zip_code}</li>
							<li>电话：{$phone}</li>
							<li>传真：{$fax}</li>
						</ul>	
					</div>
					
					
				</div>
			</div>
		</div>
</body>
	</html>