<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
<!--[if lte IE 7]>
<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
</script>
<![endif]-->
<link rel="stylesheet" href="<?php echo ($config_siteurl); ?>statics/web/css/media-nwd.css">
	<script src="<?php echo ($config_siteurl); ?>statics/web/js/respond.min.js"></script>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/"
};
</script>

<title>新世界－会员中心－每天一点新活动</title>

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
					<a href="__ROOT__/"><img src="<?php echo ($config_siteurl); ?>statics/web/img/logo.png" alt=""></a>
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
		<div class="detail-main clearfix">
			<ul class="detail-nav">
				<li>
					<a href="__ROOT__/">首&nbsp;&nbsp;页</a>
				</li>
				<li class="dw-nav">
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
				<li class="dw-nav">
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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="">联系我们</a>
				</span>
				<a class="detail-back" href="<?php echo U('Newday/index');?>"><< 返回会员活动</a>
			</div>
		<div class="help-pb clearfix">
			<ul class="help-l-nav">
				<li><a href="<?php echo U('Help/about');?>">关于新世界百货</a></li>
				<li><a  class="cur" href="<?php echo U('Help/contact');?>">联系我们</a></li>
				<li><a href="<?php echo U('Help/helpop');?>">合作机会</a></li>
				<li><a href="<?php echo U('Help/problem');?>">帮助中心</a></li>
				
				<li><a  href="<?php echo U('Help/map');?>">网站地图</a></li>
			</ul>
			<div class="help-r-ct">
				<div class="help-ct-top">
					<h1 style="line-height:60px">联系我们</h1>
					<span class="q-need-help">如果您希望了解更多信息，或有好的建议。请在下边表格中留下您的信息，我们将会进一步与您联系。</span>
				</div>
				<div class="help-ct-main contact-us-ct">
					<h2 style="font-size:18px">联系我们</h2>
					<form class="contact-us-fm J_ajaxForm" action="<?php echo U('Help/contact');?>" method="post" id="myform">
					<div class="contact-us-each">
						<label for="">反馈类别：</label>
						<select name="title" id="">
							<?php if(is_array($fankuitypelist)): $i = 0; $__LIST__ = $fankuitypelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="contact-us-each">
						<label for="">反馈门店：</label>
						<select name="store" id="">						
						<option>请选择</option>
						<option value="新世界百货管理中心">新世界百货管理中心</option>
						<?php if(is_array($storelist)): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							<option value="其他">其他</option>
						</select>
					</div>
					<div class="contact-us-each">
						<label style="vertical-align: top;margin-top: 5px;display: inline-block;" for="">反馈内容：</label>
						<textarea name="content" id="" cols="30" rows="10"></textarea>
						<span style="font-size:12px;display:inline-block;vertical-align: bottom;margin-bottom: 10px;"><strong style="color:#ff7300">1000</strong> 字</span>
					</div>
					<div class="contact-us-each">
						<label for="">联系人姓名：</label>
						<input name="contacts" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">联系人手机：</label>
						<input class="contact-us-inpt" name="phone" type="text">
					</div>
					<button class="sub-fk J_ajax_submit_btn" type="submit">提交反馈</button>
					</form>

				</div>
			</div>
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