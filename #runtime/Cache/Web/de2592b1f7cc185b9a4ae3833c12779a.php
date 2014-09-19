<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新世界－会员中心－关于我们门店资讯</title>
		<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
		<!--[if lte IE 7]>
<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
</script>
<![endif]-->
	
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/media-nwd.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/respond.min.js"></script>
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/style.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/nwd.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/foundation.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/map.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/layer.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.min.js"></script>
	
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
	
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.fitvids.js"></script>	
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/foundation.min.js"></script>	
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.nivo.slider.js"></script>	
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/script.js"></script>
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/layer.min.js"></script>
	
	

</head>
<body>
	<div class="main">
	<div class="side-bar">
		<div class="side-top">快捷<br>菜单</div>
		<a href="<?php echo U('Help/contact');?>"class="side-each"><div class="side-ol-sv"></div><span>联系我们</span></a>
		<a href="<?php echo U('Newday/index');?>" class="side-each"><div class="side-ac-nw"></div><span>活动资讯</span></a>
		<a href="<?php echo U('Jifen/index');?>" class="side-each"><div class="side-md-gf"></div><span style="margin-top:3px;">礼品兑换</span></a>
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
					<a href=""><img src="<?php echo ($config_siteurl); ?>statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="<?php echo ($config_siteurl); ?>statics/web/img/vip-ct.png" alt="">
					<div class="address">
					<i><img src="<?php echo ($config_siteurl); ?>statics/web/img/icon-loc.png" alt=""></i>
						<a href=""><?php echo ($country); ?></a>
						&nbsp;&nbsp;&nbsp;
						<a class="pop-loc" style="color:#999" href="">[切换地址]</a>
					</div>
				</div>
			</div>
			<div class="top-r">
				<div class="top-tel">
				<i class="icon-tel"><img src="<?php echo ($config_siteurl); ?>statics/web/img/icon-tel.png" alt=""></i>
					<span class="tel-num">400-810-7666</span>
					<span class="tel-date">周一至周五9:00-18:00</span>
				</div>
				<div class="top-nav">
				<?php if($_SESSION['user']): ?><a href="<?php echo U('Member/index');?>" style="margin-right:5px;width: 165px;height: auto;border: 1px solid #f6f4ef;background: #f6f4ef;border-radius: 89px;padding-top: 1px;">
						<i class="top-log-i"></i><span><span style="display:inline-block"><?php echo ($member_user["surname"]); ?></span> | <span style="display:inline-block;color:#E20000;">会员中心</span></span>
						<a class="log-out" href="<?php echo U("Index/logout",array("id"=>$r['id']));?>">[退出]</a>
					</a>
				<?php else: ?>
					<a class="vip-login" href=""><i class="top-log-i"></i><span>会员登录</span></a><?php endif; ?>
					<a href="http://www.xinbaigo.com/" target="_blank"><i class="top-ofcl-i"></i><span>新世界百货官网</span></a>
					<a href="http://buy.xinbaigo.com/" target="_blank"><i class="top-newbg-i"></i><span>新百购</span></a>
				</div>
			</div>
		</div>
		<div class="detail-main">
			<ul class="detail-nav">
				<li>
					<a href="__ROOT__/">首&nbsp;&nbsp;页</a>
				</li>
				<li>
					<a  href="<?php echo U('Newday/index');?>" <?php if(MODULE_NAME == 'Newday'): ?>class="cur"<?php endif; ?>>每天一点新</a>
					<div class="nav-bar">
						<a href="<?php echo U('Newday/index');?>">会员活动</a>
						<a href="<?php echo U('Newday/daynews');?>">最新资讯</a>
					</div>
				</li>
				<li>
					<a href="<?php echo U('Cumulative/index');?>" <?php if(MODULE_NAME == 'Cumulative'): ?>class="cur"<?php endif; ?>>累积积分</a>
				</li>
				<li>
					<a href="<?php echo U('Jifen/index');?>" <?php if(MODULE_NAME == 'Jifen'): ?>class="cur"<?php endif; ?>>积分兑换</a>
				</li>
				<li>
					<a href="<?php echo U('Cooperation/index');?>" <?php if(MODULE_NAME == 'Cooperation'): ?>class="cur"<?php endif; ?>>合作伙伴</a>
					<div class="nav-bar">
						<a href="<?php echo U('Cooperation/index');?>">合作品牌</a>
						<a href="<?php echo U('Cooperation/merchant');?>">联盟商户</a>
					</div>
				</li>
				<li class="detail-nav-last-nav-li">
					<a class="detail-nav-last-nav" href="<?php echo U('About/index');?>"  <?php if(MODULE_NAME == 'About'): ?>class="cur"<?php endif; ?>>关于我们</a>
					<div class="nav-bar">
						<a href="<?php echo U('About/creditplan');?>">奖励计划</a>
						<a href="<?php echo U('About/bevip');?>">成为会员</a>
						<a href="<?php echo U('About/viprights');?>">会员权益</a>
						<a href="<?php echo U('About/index');?>">零售网络</a>
					</div>
				</li>
			</ul>
			
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="<?php echo U('About/index');?>">关于我们</a><span class="clr-ccc"> > </span>零售网络
				</span> 
				
			</div>
			<div class="map-top-tab">
				<ul class="map-tab-ul">
					<a href="__URL__/creditplan"><li>奖励计划</li></a>
					<a href="__URL__/bevip"><li>成为会员</li></a>
					<a href="__URL__/viprights"><li>会员权益</li></a>
					<a href="__URL__/index"><li class="cur">零售网络</li></a>
				</ul>
				<div class="map-ct">
<div class="nwds-page-core_business-business">
	<div class="map">
		<div class="map_right"></div>
		<div class="map_data">
			<img class="map-img-bg" src="<?php echo ($config_siteurl); ?>statics/web/img/core_business_map_2_tc.jpg" alt="Map">
			<div class="points">									
				<div data-x="49" data-y="62" style="left: 49%; top: 62%;">
				<a class="p_1 <?php if($cityid == 13): ?>on<?php endif; ?>" ><span></span>&nbsp;</a>
				</div>
				<div data-x="41.5" data-y="64.5" style="left: 41.5%; top: 64.5%;">
				<a class="p_2 <?php if($cityid == 14): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="56" data-y="28" style="left: 56%; top: 28%;">
				<a class="p_3 <?php if($cityid == 3): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="47.5" data-y="70" style="left: 47.5%; top: 70%;">
				<a class="p_4 <?php if($cityid == 12): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="60" data-y="15" style="left: 60%; top: 15%;">
				<a class="p_5 <?php if($cityid == 10): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="39" data-y="63" style="left: 39%; top: 63%;">
				<a class="p_6 <?php if($cityid == 27): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="51" data-y="36" style="left: 51%; top: 36%;">
				<a class="p_7 <?php if($cityid == 9): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="56" data-y="31.5" style="left: 56%; top: 31.5%;">
				<a class="p_8 <?php if($cityid == 16): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="56.5" data-y="62" style="left: 56.5%; top: 62%;">
				<a class="p_9 <?php if($cityid == 17): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="55" data-y="54" style="left: 55%; top: 54%;">
				<a class="p_10 <?php if($cityid == 18): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="50" data-y="34" style="left: 50%; top: 34%;">
				<a class="p_11 <?php if($cityid == 2): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="48" data-y="50" style="left: 48%; top: 50%;">
				<a class="p_12 <?php if($cityid == 19): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="56.5" data-y="56.5" style="left: 56.5%; top: 56.5%;">
				<a class="p_13 <?php if($cityid == 1): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="40" data-y="60" style="left: 40%; top: 60%;">
				<a class="p_14 <?php if($cityid == 20): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="55" data-y="35" style="left: 55%; top: 35%;">
				<a  class="p_15 <?php if($cityid == 21): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="54" data-y="50" style="left: 54%; top: 50%;">
				<a class="p_16 <?php if($cityid == 22): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="36.5" data-y="78.5" style="left: 36.5%; top: 78.5%;">
				<a class="p_17 <?php if($cityid == 23): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="42.5" data-y="51.5" style="left: 42.5%; top: 51.5%;">
				<a class="p_18 <?php if($cityid == 24): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="38.5" data-y="44.5" style="left: 38.5%; top: 44.5%;">
				<a class="p_19 <?php if($cityid == 25): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="52" data-y="34" style="left: 52%; top: 34%;">
				<a class="p_20 <?php if($cityid == 26): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
				<div data-x="55.5" data-y="39" style="left: 55.5%; top: 39%;">
				<a class="p_21 <?php if($cityid == 15): ?>on<?php endif; ?>"><span></span>&nbsp;</a>
				</div>
			</div>
		</div>				
		<div class="places">
			<ul>
			
				<li class="r1"><a href="<?php echo U("About/index",array("cityid"=>13));?>" id="p_1" class="<?php if($cityid == 13): ?>on<?php endif; ?>">武汉</a></li>
				<li class="r1"><a href="<?php echo U("About/index",array("cityid"=>14));?>" id="p_2" class="<?php if($cityid == 14): ?>on<?php endif; ?>">重庆</a></li>
				<li class="r1_small"><a href="<?php echo U("About/index",array("cityid"=>3));?>" id="p_3" class="<?php if($cityid == 3): ?>on<?php endif; ?>">沈阳</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>12));?>" id="p_4" class="<?php if($cityid == 12): ?>on<?php endif; ?>">长沙</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>10));?>" id="p_5" class="<?php if($cityid == 10): ?>on<?php endif; ?>">哈尔滨</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>27));?>" id="p_6" class="<?php if($cityid == 27): ?>on<?php endif; ?>">成都</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>9));?>" id="p_7" class="<?php if($cityid == 9): ?>on<?php endif; ?>">天津</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>16));?>" id="p_8" class="<?php if($cityid == 16): ?>on<?php endif; ?>">鞍山</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>17));?>" id="p_9" class="<?php if($cityid == 17): ?>on<?php endif; ?>">宁波</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>18));?>" id="p_10" class="<?php if($cityid == 18): ?>on<?php endif; ?>">南京</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>2));?>" id="p_11" class="<?php if($cityid == 2): ?>on<?php endif; ?>">北京</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>19));?>" id="p_12" class="<?php if($cityid == 19): ?>on<?php endif; ?>">郑州</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>1));?>" id="p_13" class="<?php if($cityid == 1): ?>on<?php endif; ?>">上海</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>20));?>" id="p_14" class="<?php if($cityid == 20): ?>on<?php endif; ?>">绵阳</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>21));?>" id="p_15" class="<?php if($cityid == 21): ?>on<?php endif; ?>">大连</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>22));?>" id="p_16" class="<?php if($cityid == 22): ?>on<?php endif; ?>">盐城</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>23));?>" id="p_17" class="<?php if($cityid == 23): ?>on<?php endif; ?>">昆明</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>24));?>" id="p_18" class="<?php if($cityid == 24): ?>on<?php endif; ?>">西安</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>25));?>" id="p_19" class="<?php if($cityid == 25): ?>on<?php endif; ?>">兰州</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>26));?>" id="p_20" class="<?php if($cityid == 26): ?>on<?php endif; ?>">燕郊</a></li>
				<li class=""><a href="<?php echo U("About/index",array("cityid"=>15));?>" id="p_21" class="<?php if($cityid == 15): ?>on<?php endif; ?>">烟台</a></li>
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
			<?php if($cityname != ''): ?><div class="map-store-tt">
				<i class="mar-loc-big-i"></i><h1 class="map-store-loc"><?php echo ($cityname); ?> 
				<?php if($cityid == 1): ?>巴黎春天
				<?php else: ?>
				新世界百货<?php endif; ?>－门店</h1>
			</div>
			<?php else: ?>
			
			<div class="map-store-tt">
				<i class="mar-loc-big-i"></i><h1 class="map-store-loc">全国门店
				
				</h1>
			</div><?php endif; ?>
		</div>

		<ul class="map-store-list">
				 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="__URL__/detail/id/<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["images_url"]); ?>" alt=""></a>
					<a href="__URL__/detail/id/<?php echo ($vo["id"]); ?>"><h3><?php echo ($vo["name"]); ?></h3></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
			
			<div class="pageNav">
					<?php echo ($page); ?>
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
	
		<?php if($chengshikey == 1): ?><script type="text/javascript">
$.layer({
    type : 2,
    title : '请选择您需要查看的城市',
    iframe : {src : '__APP__/Index/chengshi'},
    area : ['600px' , '300px'],
    offset : ['100px','']
});
</script><?php endif; ?>
<div class="bottom">
			
			<a href="">
				<div class="bottom-inst">
					<a href="<?php echo U('About/bevip#vip-apply');?>"><h2>新手攻略</h2></a>
					<p>立即成为会员<br>新手礼包</p>
				</div>
			</a>
			
			<a href="">
				<div class="bottom-inst">
					<a href="<?php echo U('About/viprights');?>"><h2>会员特权</h2></a>
					<p>什么是会员特权<br>会员权益</p>
				</div>
			</a>
			<a href="">
				<div class="bottom-inst">
					<a href="<?php echo U('About/bevip');?>"><h2>会员成长</h2></a>
					<p>如何升级会员卡<br>会员等级</p>
				</div>
			</a>
			
			

			<div class="foot">
			<p>
			<a href="__ROOT__/">首页</a>
			　|　
			<a href="<?php echo U('Help/about');?>">关于新世界百货</a>
			　|　
			<a href="<?php echo U('Help/helpop');?>">合作机会</a>
			　|　
			<a href="<?php echo U('Help/contact');?>">联系我们</a>
			　|　
			<a href="<?php echo U('Help/problem');?>">帮助中心</a>
			　|　
			<a href="<?php echo U('Help/map');?>">网站地图</a>
    		
			</p>
			<p>©Copyright 2012 新世界百货VIP会员网站 All Rights Reserved. 沪ICP备11038586</p>
		</div>
		</div>


		<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/web/js/home.min.js"></script>
		<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/web/js/slider.js"></script>
		<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/web/js/slider_script.js"></script>
		<script>
				jQuery(function(){ 
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
		
			
		<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".dw-nav").mouseover(function() {
				$(this).find('a').addClass('chosen');
				$(this).find('.nav-bar').stop().show();	
				});
			$(".dw-nav").mouseleave(function() {
				$(this).find('a').removeClass('chosen');
			$(this).find('.nav-bar').stop().hide();
				});
			$(".detail-nav-last-nav-li").mouseover(function() {
				$(this).find('a').addClass('chosen-last');
				$(this).find('.nav-bar').stop().show();	
				});
			$(".detail-nav-last-nav-li").mouseleave(function() {
				$(this).find('a').removeClass('chosen-last');
			$(this).find('.nav-bar').stop().hide();
				});
			$('#tx-weixin').hover(function() {
				$('.qr-code').show();
			}, function() {
				$('.qr-code').hide();
			});
		})
	</script>
	
	<script>
	 $('.vip-login').mousedown(function(){
	layer.use('<?php echo ($config_siteurl); ?>statics/web/js/layer.ext.js'); //载入拓展模块
	$.layer({
	    type : 2,
	    title : '会员登录',
	    iframe : {src : '__APP__/Index/login'},
	    area : ['600px' , '320px'],
	    offset : ['100px','']
	});
	});
	$('.pop-loc').mousedown(function(){
	
	$.layer({
	    type : 2,
	    title : '请选择您需要查看的城市',
	    iframe : {src : '__APP__/Index/chengshi'},
	    area : ['600px' , '300px'],
	    offset : ['100px','']
	});
	})();
	</script>
	<script>
		jQuery(function(){ 
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
<script type="text/javascript">
        $(function()
        {
			$('.turn-me-into-datepicker')
				.datePicker({inline:true})
				.bind(
					'dateSelected',
					function(e, selectedDate, $td)
					{
						console.log('You selected ' + selectedDate);
					}
				);
        })();
</script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F053fdca6a02f8f9f2a75ce06e2aeb048' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
	</html>