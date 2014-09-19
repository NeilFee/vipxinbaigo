<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
<!--[if lte IE 7]>
<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
</script>
<![endif]-->
<link rel="stylesheet" href="{$config_siteurl}statics/web/css/media-nwd.css">
	<script src="{$config_siteurl}statics/web/js/respond.min.js"></script>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/"
};
</script>

<title>新世界－会员中心－每天一点新活动</title>

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
	<div class="side-bar">
		<div class="side-top">快捷<br>菜单</div>
		<a href="{:U('Help/contact')}"class="side-each"><div class="side-ol-sv"></div><span>联系我们</span></a>
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
					<a href="__ROOT__/"><img src="{$config_siteurl}statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="{$config_siteurl}statics/web/img/vip-ct.png" alt="">
					<div class="address">
					<i><img src="{$config_siteurl}statics/web/img/icon-loc.png" alt=""></i>
						<a href="">{$country}</a>
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
				<a href="{:U('Member/index')}" style="margin-right:5px;width: 165px;height: auto;border: 1px solid #f6f4ef;background: #f6f4ef;border-radius: 89px;padding-top: 1px;">
						<i class="top-log-i"></i><span><span style="display:inline-block">{$member_user.surname}</span> | <span style="display:inline-block;color:#E20000;">会员中心</span></span>
						<a class="log-out" href="{:U("Index/logout",array("id"=>$r['id']))}">[退出]</a>
					</a>
				<else/>
					<a class="vip-login" href=""><i class="top-log-i"></i><span>会员登录</span></a>
				</if>
					<a href="http://www.xinbaigo.com/" target="_blank"><i class="top-ofcl-i"></i><span>新世界百货官网</span></a>
					<a href="http://buy.xinbaigo.com/" target="_blank"><i class="top-newbg-i"></i><span>新百购</span></a>
					
				</div>
			</div>
		</div>
		<div class="detail-main clearfix">
			<ul class="detail-nav">
				<li>
					<a href="__ROOT__/">首&nbsp;&nbsp;页</a>
				</li>
				<li class="dw-nav">
					<a  href="{:U('Newday/index')}" <if condition="MODULE_NAME eq 'Newday'"> class="cur" </if>>每天一点新</a>
					<div class="nav-bar">
						<a href="{:U('Newday/index')}">会员活动</a>
						<a href="{:U('Newday/daynews')}">最新资讯</a>
					</div>
				</li>
				<li>
					<a href="{:U('Cumulative/index')}" <if condition="MODULE_NAME eq 'Cumulative'"> class="cur" </if>>累积积分</a>
				</li>
				<li>
					<a href="{:U('Jifen/index')}" <if condition="MODULE_NAME eq 'Jifen'"> class="cur" </if>>积分兑换</a>
				</li>
				<li class="dw-nav">
					<a href="{:U('Cooperation/index')}" <if condition="MODULE_NAME eq 'Cooperation'"> class="cur" </if>>合作伙伴</a>
					<div class="nav-bar">
						<a href="{:U('Cooperation/index')}">合作品牌</a>
						<a href="{:U('Cooperation/merchant')}">联盟商户</a>
					</div>
				</li>
				<li class="detail-nav-last-nav-li">
					<a class="detail-nav-last-nav" href="{:U('About/index')}"  <if condition="MODULE_NAME eq 'About'"> class="cur" </if>>关于我们</a>
					<div class="nav-bar">
						<a href="{:U('About/creditplan')}">奖励计划</a>
						<a href="{:U('About/bevip')}">成为会员</a>
						<a href="{:U('About/viprights')}">会员权益</a>
						<a href="{:U('About/index')}">零售网络</a>
					</div>
				</li>
			</ul>