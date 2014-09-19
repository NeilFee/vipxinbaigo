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
		<div class="detail-main clearfix">
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$thumb}" width="295" height="215" alt="">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
						<h1 class="detail-title">{$name}</h1>
						<div class="credit-chn-box">
							<div class="credit-chn-wd" style="margin: 8px 0 0 0">
								<span class="credit-chn-tt">兑换积分：</span>
								<span class="credit-chn-str">{$jifen}积分</span>
							</div>
							<div class="credit-chn-wd" style="margin: 3px 0">
								<span class="credit-chn-tt">礼品编号：</span>
								<span class="credit-chn-str">{$code}</span>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="detail-show">
					<h1>礼品介绍</h1>
					<div class="gift-intro">
						{$description}
					</div>
					<div class="gift-pt-show">
						{$jieshao}
					</div>
				</div>
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
</body>
	</html>