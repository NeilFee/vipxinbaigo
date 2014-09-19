<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/style.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/nwd.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/jd.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ($config_siteurl); ?>statics/web/css/slider.css" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/layer.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.min.js"></script>
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/layer.min.js"></script>
</head>
<body>
	<div class="main">
		<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="<?php echo ($img); ?>" width="285" height="215">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">活动主题：<?php echo ($title); ?></h1>
						<i class="detail-time-i"></i>
						<span class="act-time">活动时间：<?php echo ($s_date); ?> 至 <?php echo ($e_date); ?></span>
						
					</div>
				</div>
				
				<div class="detail-show">
					<h1>活动详情</h1>
					<div class="gift-intro">
						<?php echo ($jieshao); ?>
					</div>
					<?php echo ($news); ?>
				</div>
				<div class="detail-undln"></div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
</body>
	</html>