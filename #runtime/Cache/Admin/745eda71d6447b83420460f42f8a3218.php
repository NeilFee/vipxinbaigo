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
		<div class="detail-main clearfix">
			<div class="news-dt-l">
					<div class="news-dt-top">
						<div class="news-dt-top-l">
							<h1 style="margin: 10px 0 5px 0;"><?php echo ($title); ?></h1>
							<h2 style="margin: 5px 0 0 0;line-height:auto">发布日期： <?php echo date("Y-m-d");?></h2>
						</div>
					</div>
					<div class="news-dt-ct">
						<?php echo ($news); ?>
					</div>
				</div>
		</div>
			<div class="bd-b"></div>
		</div>
</body>
	</html>