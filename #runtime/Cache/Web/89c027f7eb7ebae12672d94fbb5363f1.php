<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>新世界－手机版-查询结果</title>	
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/phone.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="bd-l"></div>
	<div class="bd-r"></div>
		<div class="top">
			<div class="top-l">
				<div class="logo">
					<a href=""><img src="<?php echo ($config_siteurl); ?>statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="<?php echo ($config_siteurl); ?>statics/web/img/vip-ct.png" alt="">
				</div>
			</div>
			<div class="top-r">			
				会员积分查询
			</div>
			<div class="bd-tp-b"></div>
		</div>
		<div class="phone-ct-main">
			<div class="phone-card-show-img">
				<!-- <img src="<?php echo ($config_siteurl); ?>statics/web/img/blct-card.jpg" alt="">		 -->
				<!-- <img src="<?php echo ($config_siteurl); ?>statics/web/img/np-wap.jpg" alt=""> -->
				<?php if($vipgrade == 'VP'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/ng-nwds-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'GO'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/go-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'PT'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/pt-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'GD'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/gd-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'DI'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/jtbz-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'ST'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/jtml-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'GP'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/ng-nwds-wap.jpg" alt=""><?php endif; ?>
				<?php if($vipgrade == 'BG'): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/bg.jpg" alt=""><?php endif; ?>
				
				<!-- nwds & blct -->
				<?php if($vipgrade == 'ND'): if(($issuestore == 'SH1') or ($issuestore == 'SH2') or ($issuestore == 'SH3') or ($issuestore == 'SH4') or ($issuestore == 'SH5') or ($issuestore == 'SH6') or ($issuestore == 'SH7') or ($issuestore == 'SH8') or ($issuestore == 'SH9')): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/nd-blct-wap.jpg" alt="">
					<?php else: ?>
						<img src="<?php echo ($config_siteurl); ?>statics/web/img/nd-nwds-wap.jpg" alt=""><?php endif; endif; ?>
				<?php if($vipgrade == 'NG'): ?><!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<?php if(($issuestore == 'SH1') or ($issuestore == 'SH2') or ($issuestore == 'SH3') or ($issuestore == 'SH4') or ($issuestore == 'SH5') or ($issuestore == 'SH6') or ($issuestore == 'SH7') or ($issuestore == 'SH8') or ($issuestore == 'SH9')): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/ng-blct-wap.jpg" alt="">
					<!-- else  -->
					<?php else: ?>
						<img src="<?php echo ($config_siteurl); ?>statics/web/img/ng-nwds-wap.jpg" alt=""><?php endif; endif; ?>
				<?php if($vipgrade == 'NP'): ?><!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<?php if(($issuestore == 'SH1') or ($issuestore == 'SH2') or ($issuestore == 'SH3') or ($issuestore == 'SH4') or ($issuestore == 'SH5') or ($issuestore == 'SH6') or ($issuestore == 'SH7') or ($issuestore == 'SH8') or ($issuestore == 'SH9')): ?><img src="<?php echo ($config_siteurl); ?>statics/web/img/np-blct-wap.jpg" alt="">
					<!-- else  -->
					<?php else: ?>
						<img src="<?php echo ($config_siteurl); ?>statics/web/img/np-nwds-wap.jpg" alt=""><?php endif; endif; ?>
			</div>
			<div class="member-info">
				<p class="phone-welcome-wd">尊敬的会员<?php echo ($surname); ?>:欢迎您！</p>
				<p class="phone-card-nb"><span>会员卡号：</span><span class="clr-gold"><?php echo ($vipcode); ?></span></p>
				<p class="phone-vip-lv">会员级别：<span class="clr-gold">
				
							<?php if($vipgrade == 'VP'): ?>普卡<?php endif; ?>
							<?php if($vipgrade == 'GO'): ?>金卡<?php endif; ?>
							<?php if($vipgrade == 'PT'): ?>白金卡<?php endif; ?>
							<?php if($vipgrade == 'GD'): ?>金钻卡<?php endif; ?>
				            <?php if($vipgrade == 'DI'): ?>标准卡<?php endif; ?>
							<?php if($vipgrade == 'ST'): ?>名流卡<?php endif; ?>
							<?php if($vipgrade == 'GP'): ?>集团卡<?php endif; ?>
							<?php if($vipgrade == 'ND'): ?>金钻卡<?php endif; ?>
							<?php if($vipgrade == 'NG'): ?>金卡<?php endif; ?>
							<?php if($vipgrade == 'NP'): ?>白金卡<?php endif; ?>
							<?php if($vipgrade == 'BG'): ?>黑金卡<?php endif; ?>
				</span></p>
				<p class="phone-use-sco">可用积分：<span class="clr-gold"><?php echo (int)$currentbonus;?></span> 分</p>
				<p class="phone-sco-ddl">积分有效期至<?php echo date("Y年m月d日",strtotime($expirydate_yyyymmdd)); ?></p>
				<div class="bd-sec-b"></div>
			</div>
			<div class="warm-notice">
				<p class="warm-notice-tt">温馨提示：</p>
				<p>请登录网页版会员网站或新世界百货各门店</p>
				<p>使用积分兑换礼品.</p>
			</div>
			</div>
			<div class="blk-200"></div>
			<div class="bd-b"></div>
		</div>
		<div class="blk-100"></div>
</body>
</html>