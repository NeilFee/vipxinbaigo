<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新世界－会员中心－关于我们门店资讯</title>
		<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
		<!--[if lte IE 7]>
<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
</script>
<![endif]-->
	
	
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/style.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/nwd.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/foundation.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/map.css">
	
	<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
	
	<script>
		jQuery(function(){ 

			$('#tx-weixin').hover(function() {
				$('.qr-code').show();
			}, function() {
				$('.qr-code').hide();
			});
			
			/*返回顶部*/ 
			var jq=jQuery; 
			jq('#roll_top').hide(); 
			jq(window).scroll(function () { 
			if (jq(window).scrollTop() > 0) { 
			jq('#roll_top').fadeIn(400);//当滑动栏向下滑动时，按钮渐现的时间 
			} else { 
			jq('#roll_top').fadeOut(200);//当页面回到顶部第一屏时，按钮渐隐的时间 
			} 
			}); 
			jq('#roll_top').click(function () { 
			jq('html,body').animate({ 
			scrollTop : '0px' 
			}, 200);//返回顶部所用的时间  
			}); 
			}); 
	</script>
	
	<script src="{$config_siteurl}statics/web/js/jquery.fitvids.js"></script>	
	<script src="{$config_siteurl}statics/web/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="{$config_siteurl}statics/web/js/foundation.min.js"></script>	
	<script src="{$config_siteurl}statics/web/js/jquery.nivo.slider.js"></script>	
	<script src="{$config_siteurl}statics/web/js/script.js"></script>
	<script src="{$config_siteurl}statics/web/js/layer.min.js"></script>
	

</head>
<body>
	<div class="main">
	<div class="side-bar">
		<div class="side-top">QUICK<br>MENU</div>
		<a class="side-each"><div class="side-ol-sv"></div><span>在线客服</span></a>
		<a href="{:U('Newday/index')}" class="side-each"><div class="side-ac-nw"></div><span>活动资讯</span></a>
		<a href="{:U('Jifen/index')}" class="side-each"><div class="side-md-gf"></div><span style="margin-top:3px;">礼品兑换</span></a>
		<a href="http://weibo.com/xinshijiebaihuo" class="side-each"><div class="side-sn-wb"></div><span>微博</span></a>
		<a href="" class="side-each" id="tx-weixin"><div class="side-tx-wb"></div><span>微信</span></a>
		<a id="roll_top" href="javascript:;" class="side-top" style="background: #444; color: #fff;height:30px;">TOP</a>
	    <div class="qr-code"></div>
	</div>
	<div class="bd-l"></div>
	<div class="bd-r"></div>
		<div class="top">
			<div class="top-l">
				<div class="logo">
					<a href=""><img src="{$config_siteurl}statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="{$config_siteurl}statics/web/img/vip-ct.png" alt="">
					<div class="address">
					<i><img src="{$config_siteurl}statics/web/img/icon-loc.png" alt=""></i>
						<a href="">上海</a>
						&nbsp;&nbsp;&nbsp;
						<a class="pop-loc" style="color:#999" href="">[切换地址]</a>
					</div>
				</div>
			</div>
			<div class="top-r">
				<div class="top-tel">
				<i class="icon-tel"><img src="{$config_siteurl}statics/web/img/icon-tel.png" alt=""></i>
					<span class="tel-num">400-810-7666</span>
					<span class="tel-date">周一至周五9:00-18:00</span>
				</div>
				<div class="top-nav">
				<if condition="$_SESSION['user']">
				<a href="{:U('Member/index')}" style="margin-right:5px">
						<i class="top-log-i"></i><span><span style="display:inline-block">{$member_user.surname}</span> | <span style="display:inline-block">会员中心</span></span>
						<a class="log-out" href="{:U("Index/logout",array("id"=>$r['id']))}">[退出]</a>
					</a>
				<else/>
					<a class="vip-login" href=""><i class="top-log-i"></i><span>会员登录</span></a>
				</if>
					<a href="http://www.nwds.com.hk/" target="_blank"><i class="top-ofcl-i"></i><span>新世界官网</span></a>
					<a href="http://www.xinbaigo.com/" target="_blank"><i class="top-newbg-i"></i><span>新百购</span></a>
					<a href="http://www.leoule.com/" target="_blank" style="margin-right: 0px"><i class="top-shg-i"></i><span>生活馆</span></a>
				</div>
			</div>
		</div>
		<div class="detail-main">
			<ul class="detail-nav">
				<li>
					<a href="__ROOT__/">首&nbsp;&nbsp;页</a>
				</li>
				<li>
					<a  href="{:U('Newday/index')}" <if condition="MODULE_NAME eq 'Newday'"> class="cur" </if>>每天一点新</a>
				</li>
				<li>
					<a href="{:U('Cumulative/index')}" <if condition="MODULE_NAME eq 'Cumulative'"> class="cur" </if>>累积积分</a>
				</li>
				<li>
					<a href="{:U('Jifen/index')}" <if condition="MODULE_NAME eq 'Jifen'"> class="cur" </if>>积分兑换</a>
				</li>
				<li>
					<a href="{:U('Cooperation/index')}" <if condition="MODULE_NAME eq 'Cooperation'"> class="cur" </if>>合作伙伴</a>
				</li>
				<li class="detail-nav-last-nav-li">
					<a class="detail-nav-last-nav" href="{:U('About/index')}"  <if condition="MODULE_NAME eq 'About'"> class="cur" </if>>关于我们</a>
				</li>
			</ul>
			
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('About/index')}">关于我们</a><span class="clr-ccc"> > </span>零售网络
				</span> 
				
			</div>
			<div class="map-top-tab">
				<ul class="map-tab-ul">
					<a href="__URL__/creditplan"><li>积分计划</li></a>
					<a href="__URL__/bevip"><li>成为会员</li></a>
					<a href="__URL__/viprights"><li>会员权益</li></a>
					<a href="__URL__/index"><li class="cur">零售网络</li></a>
				</ul>
				<div class="map-ct">
<div class="nwds-page-core_business-business">
	<div class="map">
		<div class="map_right"></div>
		<div class="map_data">
			<img class="map-img-bg" src="{$config_siteurl}statics/web/img/core_business_map_2_tc.jpg" alt="Map">
			<div class="points">									
				<div data-x="49" data-y="62" style="left: 49%; top: 62%;">
				<a href="" class="p_1"><span></span>&nbsp;</a>
				</div>
				<div data-x="41.5" data-y="64.5" style="left: 41.5%; top: 64.5%;">
				<a href="" class="p_2"><span></span>&nbsp;</a>
				</div>
				<div data-x="56" data-y="28" style="left: 56%; top: 28%;">
				<a href="" class="p_3"><span></span>&nbsp;</a>
				</div>
				<div data-x="47.5" data-y="70" style="left: 47.5%; top: 70%;">
				<a href="" class="p_4"><span></span>&nbsp;</a>
				</div>
				<div data-x="60" data-y="15" style="left: 60%; top: 15%;">
				<a href="" class="p_5"><span></span>&nbsp;</a>
				</div>
				<div data-x="39" data-y="63" style="left: 39%; top: 63%;">
				<a href="" class="p_6"><span></span>&nbsp;</a>
				</div>
				<div data-x="51" data-y="36" style="left: 51%; top: 36%;">
				<a href="" class="p_7"><span></span>&nbsp;</a>
				</div>
				<div data-x="56" data-y="31.5" style="left: 56%; top: 31.5%;">
				<a href="" class="p_8"><span></span>&nbsp;</a>
				</div>
				<div data-x="56.5" data-y="62" style="left: 56.5%; top: 62%;">
				<a href="" class="p_9"><span></span>&nbsp;</a>
				</div>
				<div data-x="55" data-y="54" style="left: 55%; top: 54%;">
				<a href="" class="p_10 "><span></span>&nbsp;</a>
				</div>
				<div data-x="50" data-y="34" style="left: 50%; top: 34%;">
				<a href="" class="p_11"><span></span>&nbsp;</a>
				</div>
				<div data-x="48" data-y="50" style="left: 48%; top: 50%;">
				<a href="" class="p_12"><span></span>&nbsp;</a>
				</div>
				<div data-x="56.5" data-y="56.5" style="left: 56.5%; top: 56.5%;">
				<a href="" class="p_13 on"><span></span>&nbsp;</a>
				</div>
				<div data-x="40" data-y="60" style="left: 40%; top: 60%;">
				<a href="" class="p_14"><span></span>&nbsp;</a>
				</div>
				<div data-x="55" data-y="35" style="left: 55%; top: 35%;">
				<a href="{$config_siteurl}statics/web/img/nwds-map.htm" class="p_15"><span></span>&nbsp;</a>
				</div>
				<div data-x="54" data-y="50" style="left: 54%; top: 50%;">
				<a href="" class="p_16 "><span></span>&nbsp;</a>
				</div>
				<div data-x="36.5" data-y="78.5" style="left: 36.5%; top: 78.5%;">
				<a href="" class="p_17 "><span></span>&nbsp;</a>
				</div>
				<div data-x="42.5" data-y="51.5" style="left: 42.5%; top: 51.5%;">
				<a href="" class="p_18 "><span></span>&nbsp;</a>
				</div>
				<div data-x="38.5" data-y="44.5" style="left: 38.5%; top: 44.5%;">
				<a href="" class="p_19 "><span></span>&nbsp;</a>
				</div>
				<div data-x="52" data-y="34" style="left: 52%; top: 34%;">
				<a href="" class="p_20 "><span></span>&nbsp;</a>
				</div>
			</div>
		</div>				
		<div class="places">
			<ul>
				<li class="r1"><a href="" id="p_1" class="">武汉</a></li>
				<li class="r1"><a href="" id="p_2" class="">重庆</a></li>
				<li class="r1_small"><a href="" id="p_3" class="">沈阳</a></li>
				<li class=""><a href="" id="p_4" class="">长沙</a></li>
				<li class=""><a href="" id="p_5" class="">哈尔滨</a></li>
				<li class=""><a href="" id="p_6" class="">成都</a></li>
				<li class=""><a href="" id="p_7" class="">天津</a></li>
				<li class=""><a href="" id="p_8" class="">鞍山</a></li>
				<li class=""><a href="" id="p_9" class="">宁波</a></li>
				<li class=""><a href="" id="p_10" class="">南京</a></li>
				<li class=""><a href="" id="p_11" class="">北京</a></li>
				<li class=""><a href="" id="p_12" class="">郑州</a></li>
				<li class=""><a href="" id="p_13" class="on">上海</a></li>
				<li class=""><a href="" id="p_14" class="">绵阳</a></li>
				<li class=""><a href="" id="p_15" class="">大连</a></li>
				<li class=""><a href="" id="p_16" class="">盐城</a></li>
				<li class=""><a href="" id="p_17" class="">昆明</a></li>
				<li class=""><a href="" id="p_18" class="">西安</a></li>
				<li class=""><a href="" id="p_19" class="">兰州</a></li>
				<li class=""><a href="" id="p_20" class="">燕郊</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
		
		<script>
			$(document).ready(function() {
				$("#store_listing").animatedScroll();
			});
		</script>
</div>

			</div>
			<div class="map-store-tt">
				<i class="mar-loc-big-i"></i><h1 class="map-store-loc">上海 新世界百货－门店</h1>
			</div>
		</div>

		<ul class="map-store-list">
				 <volist name="list" id="vo">
				<li>
					<a href="__URL__/detail/id/{$vo.id}"><img src="{$vo.images_url}" alt=""></a>
					<a href="__URL__/detail/id/{$vo.id}"><h3>{$vo.name}</h3></a>
				</li>
			</volist>

			</ul>
			
			<div class="pageNav">
					{$page}
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
	
		<include file="Public:foot"/>
			