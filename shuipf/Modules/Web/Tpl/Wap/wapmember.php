<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>新世界－手机版-查询结果</title>	
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/phone.css">
	<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="bd-l"></div>
	<div class="bd-r"></div>
		<div class="top">
			<div class="top-l">
				<div class="logo">
					<a href=""><img src="{$config_siteurl}statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="{$config_siteurl}statics/web/img/vip-ct.png" alt="">
				</div>
			</div>
			<div class="top-r">			
				会员积分查询
			</div>
			<div class="bd-tp-b"></div>
		</div>
		<div class="phone-ct-main">
			<div class="phone-card-show-img">
				<!-- <img src="{$config_siteurl}statics/web/img/blct-card.jpg" alt="">		 -->
				<!-- <img src="{$config_siteurl}statics/web/img/np-wap.jpg" alt=""> -->
				<if condition="$vipgrade eq 'VP'"><img src="{$config_siteurl}statics/web/img/ng-nwds-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'GO'"><img src="{$config_siteurl}statics/web/img/go-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'PT'"><img src="{$config_siteurl}statics/web/img/pt-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'GD'"><img src="{$config_siteurl}statics/web/img/gd-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'DI'"><img src="{$config_siteurl}statics/web/img/jtbz-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'ST'"><img src="{$config_siteurl}statics/web/img/jtml-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'GP'"><img src="{$config_siteurl}statics/web/img/ng-nwds-wap.jpg" alt=""></if>
				<if condition="$vipgrade eq 'BG'"><img src="{$config_siteurl}statics/web/img/bg.jpg" alt=""></if>
				
				<!-- nwds & blct -->
				<if condition="$vipgrade eq 'ND'">
					<if condition="($issuestore eq 'SH1') or ($issuestore eq 'SH2') or ($issuestore eq 'SH3') or ($issuestore eq 'SH4') or ($issuestore eq 'SH5') or ($issuestore eq 'SH6') or ($issuestore eq 'SH7') or ($issuestore eq 'SH8') or ($issuestore eq 'SH9')">
						<img src="{$config_siteurl}statics/web/img/nd-blct-wap.jpg" alt="">
					<else/>
						<img src="{$config_siteurl}statics/web/img/nd-nwds-wap.jpg" alt="">
					</if>
				</if>
				<if condition="$vipgrade eq 'NG'">
					<!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<if condition="($issuestore eq 'SH1') or ($issuestore eq 'SH2') or ($issuestore eq 'SH3') or ($issuestore eq 'SH4') or ($issuestore eq 'SH5') or ($issuestore eq 'SH6') or ($issuestore eq 'SH7') or ($issuestore eq 'SH8') or ($issuestore eq 'SH9')">
						<img src="{$config_siteurl}statics/web/img/ng-blct-wap.jpg" alt="">
					<!-- else  -->
					<else/>
						<img src="{$config_siteurl}statics/web/img/ng-nwds-wap.jpg" alt="">
					</if>
				</if>
				<if condition="$vipgrade eq 'NP'">
					<!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<if condition="($issuestore eq 'SH1') or ($issuestore eq 'SH2') or ($issuestore eq 'SH3') or ($issuestore eq 'SH4') or ($issuestore eq 'SH5') or ($issuestore eq 'SH6') or ($issuestore eq 'SH7') or ($issuestore eq 'SH8') or ($issuestore eq 'SH9')">
						<img src="{$config_siteurl}statics/web/img/np-blct-wap.jpg" alt="">
					<!-- else  -->
					<else/>
						<img src="{$config_siteurl}statics/web/img/np-nwds-wap.jpg" alt="">
					</if>
				</if>
			</div>
			<div class="member-info">
				<p class="phone-welcome-wd">尊敬的会员{$surname}:欢迎您！</p>
				<p class="phone-card-nb"><span>会员卡号：</span><span class="clr-gold">{$vipcode}</span></p>
				<p class="phone-vip-lv">会员级别：<span class="clr-gold">
				
							<if condition="$vipgrade eq 'VP'">普卡</if>
							<if condition="$vipgrade eq 'GO'">金卡</if>
							<if condition="$vipgrade eq 'PT'">白金卡</if>
							<if condition="$vipgrade eq 'GD'">金钻卡</if>
				            <if condition="$vipgrade eq 'DI'">标准卡</if>
							<if condition="$vipgrade eq 'ST'">名流卡</if>
							<if condition="$vipgrade eq 'GP'">集团卡</if>
							<if condition="$vipgrade eq 'ND'">金钻卡</if>
							<if condition="$vipgrade eq 'NG'">金卡</if>
							<if condition="$vipgrade eq 'NP'">白金卡</if>
							<if condition="$vipgrade eq 'BG'">黑金卡</if>
				</span></p>
				<p class="phone-use-sco">可用积分：<span class="clr-gold"><?php echo (int)$currentbonus;?></span> 分</p>
				<p class="phone-sco-ddl">积分有效期至<?php echo  date("Y年m月d日",strtotime($expirydate_yyyymmdd)); ?></p>
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