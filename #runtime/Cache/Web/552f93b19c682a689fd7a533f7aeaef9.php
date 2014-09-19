<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
	<!--[if lte IE 7]>
	<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
	</script>
	<![endif]-->
	<title>新世界－会员中心－我的会员卡</title>
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/media-nwd.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/respond.min.js"></script>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/"
};
</script>


    <link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/style.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/nwd.css">
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/jd.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ($config_siteurl); ?>statics/web/css/slider.css" />
	<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/layer.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/jquery.min.js"></script>
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/layer.min.js"></script>
    <script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
	<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo ($config_siteurl); ?>statics/web/css/admin_style.css" />
	
	<script>
$(function(){
function showlogoout(){
    location.href="__APP__/Index/logout";
}
setInterval(showlogoout,60000*15);// 注意函数名没有引号和括弧！

}); 
</script>

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
				<a href="__ROOT__/">
					<img src="<?php echo ($config_siteurl); ?>statics/web/img/logo.png" alt=""></a>
			</div>
			<div class="vip-add">
				<img src="<?php echo ($config_siteurl); ?>statics/web/img/vip-ct.png" alt="">
				<div class="address"> <i><img src="<?php echo ($config_siteurl); ?>statics/web/img/icon-loc.png" alt=""></i>
					<a href="">上海</a>
					&nbsp;&nbsp;&nbsp;
					<a class="pop-loc" style="color:#999" href="">[切换地址]</a>
				</div>
			</div>
		</div>
		<div class="top-r">
			<div class="top-tel"> <i class="icon-tel"><img src="<?php echo ($config_siteurl); ?>statics/web/img/icon-tel.png" alt=""></i>
				<span class="tel-num">400-810-7666</span>
				<span class="tel-date">周一至周五9:00-18:00</span>
			</div>
			
			    <div class="top-nav nav2">
					<a href="<?php echo U('Member/index');?>" style="margin-right:5px;width: 165px;height: auto;border: 1px solid #f6f4ef;background: #f6f4ef;border-radius: 89px;padding-top: 1px;">
						<i class="top-log-i"></i><span><span style="display:inline-block"><?php echo ($member_user["surname"]); ?></span> | <span style="display:inline-block;color:#E20000;">会员中心</span></span>
						<a class="log-out" href="<?php echo U("Index/logout",array("id"=>$r['id']));?>">[退出]</a>
					</a>
					<a href="http://www.xinbaigo.com/" target="_blank"><i class="top-ofcl-i"></i><span>新世界百货官网</span></a>
					<a href="http://buy.xinbaigo.com/" target="_blank"><i class="top-newbg-i"></i><span>新百购</span></a>
				</div>
		</div>
	</div>
	<div class="vip-ct-main">
		<ul class="nav">
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
		<div class="vip-ct-l">
			<div class="vip-ct-l-tpbd"></div>
			<div class="vip-hd">
				<img src="<?php echo ($config_siteurl); ?>statics/web/img/vip-hd-df.png" alt="">
				<span>
					<h2><?php echo ($member_user["surname"]); ?></h2>
					<a href="<?php echo U('Member/center');?>">[完善资料]</a>
				</span>
			</div>
			<ul>
				<a href="<?php echo U('Member/index');?>">
				
					<li <?php if(ACTION_NAME == 'index'): ?>class="cur"<?php endif; ?> >我的会员卡</li>
				</a>
				<a href="<?php echo U('Member/collection');?>">
					<li <?php if(ACTION_NAME == 'collection'): ?>class="cur"<?php endif; ?>>我的收藏</li>
				</a>
				<a href="<?php echo U('Member/center');?>">
					<li <?php if(ACTION_NAME == 'center'): ?>class="cur"<?php endif; ?>>个人资料</li>
				</a>
				<a href="<?php echo U('Member/password');?>">
					<li <?php if(ACTION_NAME == 'password'): ?>class="cur"<?php endif; ?>>修改密码</li>
				</a>
			</ul>
		</div>
		<div class="vip-ct-r">
			<h3>
				<i class="notic"></i>
				尊敬的会员 <span class="clr-gold"><?php echo ($member_user["surname"]); ?></span> : 欢迎来到VIP会员中心 !
			</h3>
			
				<div class="vip-ct-rct">
					<h2>我的收藏</h2>
					<ul class="vip-rct-tab">
						<a href="<?php echo U("Member/collection",array("ntype"=>'collection'));?>"><li <?php if($where == 'collection' ): ?>class="cur"<?php endif; ?>>礼品<?php if($where == 'collection' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<a href="<?php echo U("Member/collection",array("ntype"=>'activities'));?>"><li <?php if($where == 'activities' ): ?>class="cur"<?php endif; ?>>活动<?php if($where == 'activities' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<a href="<?php echo U("Member/collection",array("ntype"=>'businesses'));?>"><li <?php if($where == 'businesses' ): ?>class="cur"<?php endif; ?>>商户<?php if($where == 'businesses' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<a href="<?php echo U("Member/collection",array("ntype"=>'cooperation'));?>"><li <?php if($where == 'cooperation' ): ?>class="cur"<?php endif; ?>>品牌<?php if($where == 'cooperation' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<a href="<?php echo U("Member/collection",array("ntype"=>'store'));?>"><li <?php if($where == 'store' ): ?>class="cur"<?php endif; ?>>门店<?php if($where == 'store' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<a href="<?php echo U("Member/collection",array("ntype"=>'daynews'));?>"><li <?php if($where == 'daynews' ): ?>class="cur"<?php endif; ?>>资讯<?php if($where == 'daynews' ): ?>(<?php echo ($count); ?>)<?php endif; ?></li></a>
						<li class="vip-rct-tab-bg"></li>
					</ul>
					<!-- ________________________________礼品_______________________________ -->
					<?php if($where == 'collection' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="170">礼品图片</th>
							<th width="270">名称</th>
							<th width="155">兑换条件</th>
							<th width="150">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="170">
							<a href="<?php echo U("Jifen/detail",array("id"=>$vo['id']));?>" target="_blank"><img src="<?php echo ($vo["img"]); ?>" alt="<?php echo ($vo["name"]); ?>"></a></td>
							<td width="270" style="color: #a48f65;"><a href="<?php echo U("Jifen/detail",array("id"=>$vo['id']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
							<td width="155" style="color: #a48f65;"><?php echo ($vo["jifen"]); ?>积分</td>
							<td width="200">
							<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table><?php endif; ?>
					<!-- ________________________________活动_______________________________ -->
					<?php if($where == 'activities' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="115">活动</th>
							<th width="175">主题</th>
							<th width="125">门店</th>
							<th width="185">时间</th>
							<th width="140">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="115"><a href="<?php echo U("Newday/detail",array("id"=>$vo['id']));?>" target="_blank"><img src="<?php echo ($vo["img"]); ?>" alt=""></a></td>
							<td width="175" style="color: #a48f65;"><a href="<?php echo U("Newday/detail",array("id"=>$vo['id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
							<td width="125">
							<?php  $mendiansub= substr($vo['mendian'],0,strlen($vo['mendian'])-1); $mendianarray=explode(',',$mendiansub); $num=count($mendianarray); ?>
							共<?php echo ($num); ?>家门店支持该活动
							</td>
							<td width="185"><?php echo ($vo["s_date"]); ?> 至 <?php echo ($vo["e_date"]); ?></td>
							<td width="200"><!-- JiaThis Button BEGIN -->
								<div class="jiathis_style">
									<span class="jiathis_txt">分享到：</span>
									<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
								</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</table><?php endif; ?>
					<!-- _______________________________商户_______________________________ -->
					<?php if($where == 'businesses' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">联系电话</th>
							<th width="130">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="130"><a href="<?php echo U("Cooperation/mdetail",array("id"=>$vo['id']));?>" target="_blank"><img src="<?php echo ($vo["name_img"]); ?>" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="<?php echo U("Cooperation/mdetail",array("id"=>$vo['id']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
							<td width="155"><?php echo ($vo["phone"]); ?></td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table><?php endif; ?>
					
					
					<!-- _______________________________品牌_______________________________ -->
					<?php if($where == 'cooperation' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">介绍</th>
							<th width="130">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="130"><a href="<?php echo U("Cooperation/detail",array("id"=>$vo['id']));?>" target="_blank"><img src="<?php echo ($vo["img"]); ?>" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="<?php echo U("Cooperation/detail",array("id"=>$vo['id']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
							<td width="155"><?php echo ($vo["discount"]); ?></td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table><?php endif; ?>
					
					
					<!-- _______________________________门店_______________________________ -->
					<?php if($where == 'store' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">联系电话</th>
							<th width="130">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="130"><a href="<?php echo U("About/detail",array("id"=>$vo['id']));?>" target="_blank"><img src="<?php echo ($vo["images_url"]); ?>" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="<?php echo U("About/detail",array("id"=>$vo['id']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
							<td width="155"><?php echo ($vo["phone"]); ?></td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table><?php endif; ?>
					
					<!-- _______________________________资讯_______________________________ -->
					<?php if($where == 'daynews' ): ?><table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="370" style="text-align:left;padding-left:60px">资讯</th>
							<th width="145">发布时间</th>
							<th width="130">操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td width="370">
							<a style="color: #a48f65;" href="<?php echo U("Newday/newsdetail",array("id"=>$vo['id']));?>" target="_blank">
							
									<?php echo ($vo["title"]); ?>
								</a>
							</td>
							<td width="145"><?php echo ($vo["date_time"]); ?></td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="<?php echo U("Member/collectiondel",array("id"=>$vo['id']));?>">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</table><?php endif; ?>
					<div class="pageNav">
					<?php echo ($page); ?>
					</div>
				</div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
			<div class="bottom">
		<a href="">
				<div class="bottom-inst">
					<a href="<?php echo U('About/bevip');?>"><h2>新手攻略</h2></a>
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
			<p>
				©Copyright 2012 新世界百货VIP会员网站 All Rights Reserved. 沪ICP备11038586
			</p>
		</div>
	</div>
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
		})
	</script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/web/js/home.min.js"></script>
		<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/web/js/slider.js"></script>
		
		<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>

</body>
</html>