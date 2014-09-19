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

	<script>
		$(document).ready(function() {
			$('.ask-wd').click(function() {
				$(this).parent('li').find('.ans-wd').toggle();
			});
		});
	</script>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="">帮助中心</a>
				</span>
				<a class="detail-back" href="<?php echo U('Newday/index');?>"><< 返回会员活动</a>
			</div>
		<div class="help-pb clearfix">
			<ul class="help-l-nav">
				<li><a href="<?php echo U('Help/about');?>">关于新世界百货</a></li>
				<li><a href="<?php echo U('Help/contact');?>">联系我们</a></li>
				<li><a href="<?php echo U('Help/helpop');?>">合作机会</a></li>
				<li><a class="cur" href="<?php echo U('Help/problem');?>">帮助中心</a></li>
				
				<li><a  href="<?php echo U('Help/map');?>">网站地图</a></li>
			</ul>
			<div class="help-r-ct" style="height:auto;">
				<div class="help-ct-top">
					<h1>帮助中心</h1>
				</div>
				<div class="help-ct-main" style="padding:0">
					<h2>如何加入</h2>
					<ul>
						<li>
							<span class="ask-wd">1.	问： 有哪些会员卡可以申请？</span>
							<span class="ans-wd">答： 当前有两种卡可供申请，即N-VIP卡（线下实体卡）与交行联名卡（肄业合作）。</span>
						</li>
						<li>
							<span class="ask-wd">2.	问： 如何办理新世界N-VIP卡？</span>
							<span class="ans-wd">答： 1）未办理过新世界百货会员卡的用户：<br/>
							　 单日累计消费至指定金额（如下），持当日现沽单及个人身份证至顾客服务中心即可办理N-VIP会员卡：<br/>
							　● 金卡：当日累计消费满1,000元（含）以上<br/>
							　● 白金卡：当日累计消费满10,000元（含）以上<br/>
							　● 金钻卡：仅限受邀会员，暂不接受申请<br/>
							　　2）原VIP会员可以凭有效的VIP卡与个人身份证前往发卡门店免费更换新的N-VIP卡。<br/>
							</span>
						</li>
						<li>
							<span class="ask-wd">3.	问：如何办理交行联名卡？</span>
							<span class="ans-wd">
							答：可至任意交通银行网点即可申请办理。</span>
						</li>
						<li>
							<span class="ask-wd">4.	问：哪里可以申请N-VIP卡？</span>
							<span class="ans-wd">答： 请咨询您所在城市的新世界百货/巴黎春天顾客服务中心。</span>
						</li>
					</ul>
					<h2>N-VIP卡介绍</h2>
					<ul>
						<li>
							<span class="ask-wd">5.	问：N-VIP卡功能及使用范围？</span>
							<span class="ans-wd">答： N-VIP卡具备储值、积分、支付功能。 全国新世界百货分店或新世界百货集团内的上海巴黎春天使用（含超市）。</span>
						</li>
						<li>
							<span class="ask-wd">6.	问：N-VIP卡使用方法 ？</span>
							<span class="ans-wd">答：
							无须激活，申领成功后可立即使用。消费时，请在结账前先出示此卡。卡内金额等同于现金，持卡人可在各门店进行充值、查询余额、积分及刷卡消费。 充值后即可使用，初始消费密码见卡片背面刮开覆盖区（建议立刻修改）；消费时必须由顾客通过密码键盘自行输入6位交易密码，不得将密码告诉收银员代为输入。卡内余额不足消费金额时，可用其他支付方式支付差额，或继续充值使用。<br>卡片内的金额，不得透支、转让、折现、抵押或为其它非本须知内所订之用途。 持卡人应妥善保管及使用，并有义务防止造人窃（冒）用，如因违反前述规范造成损失，应由持卡人自行负责。<br/>
							</span>
						</li>
						<li>
							<span class="ask-wd">7.	问：N-VIP卡账户限额及会员卡服务费？</span>
							<span class="ans-wd">答： 单个账户充值后余额不超过5000元。一年内（以最后一次消费日起算）未消费的，第二年起收取会员卡服务费。资费计算标准：第一年：10元/年，第二年起：15元/年。（于未消费年次的第二年1月1日扣除）</span>
						</li>
						<li>
							<span class="ask-wd">8.	问：N-VIP卡使用手续费及购卡优惠？充值N-VIP卡时如何开具发票？</span>
							<span class="ans-wd">答： 目前使用N-VIP卡无手续费。购卡优惠条件，详询购卡当地所在门店顾客服务中心。<br/>
							</span>
						</li>
					</ul>
					<h2>会员等级</h2>
					<ul>
						<li>
							<span class="ask-wd">9.问：N-VIP卡有哪些会员等级？</span>
							<span class="ans-wd">答：当前N-VIP会员卡分三个等级，金卡、白金卡与金钻卡。N-VIP卡面相同，通常以等级标签区分卡等级。金卡无标签，白金卡每年更换年份标签，金钻卡不更换标签。</span>
						</li>
						<li>
							<span class="ask-wd">10.问：如何升级成为N-VIP白金卡会员？</span>
							<span class="ans-wd">答：您有三种方式升级成为白金会员：<br>
								方式一：消费<br>
								在卡有效期2年内，累计消费满RMB10000元及以上，持有效身份证件及原N-VIP卡至发卡店顾客服务中心办理升级。<br>
								方式二：充值<br>
								在卡有效期内，一次性充值满1万元升级为白金卡。<br>
								方式三：充值+消费<br>
								在卡有效期内，使用现金\信用卡\借记卡消费2000元，充值8000元，升级为白金卡。<br>
							</span>
						</li>
						<li>
							<span class="ask-wd">11.问：如何升级成为N-VIP金钻卡会员？</span>
							<span class="ans-wd">答：金钻会员升级仅限受邀会员。受邀会员可凭邀请短信，持有效身份证件及原N-VIP卡至原发卡店顾客服务中心申请办理。</span>
						</li>
						<li>
							<span class="ask-wd">12.问：我之前是白金卡会员，为何降级成金卡会员了？</span>
							<span class="ans-wd">答：由于您在卡有效期的2年内消费不足RMB10,000元（高于RMB3,000元）则降级为金卡会员。</span>
						</li>
						<li>
							<span class="ask-wd">13.问：我的金卡为何已过期？</span>
							<span class="ans-wd">答：由于您在卡有效期的2年内消费不足RMB3,000元，会员卡将做自动过期处理。</span>
						</li>
						<li>
							<span class="ask-wd">14.问：我的会员卡损坏了，如何办理换卡？</span>
							<span class="ans-wd">答：您可以持有效身份证件及原VIP卡到原发卡店总服务台，支付10元工本费即可办理换卡事宜。 </span>
						</li>
						<li>
							<span class="ask-wd">15.问：我的会员卡遗失了，该怎么办？</span>
							<span class="ans-wd">答：您可以持有效身份证件到原发卡店总服务台，支付10元工本费就能办理补卡。</span>
						</li>
					</ul>
					<h2>N-VIP卡充值</h2>
					<ul>
						<li>
							<span class="ask-wd">16.问：如何为会员卡充值？</span>
							<span class="ans-wd">答：持有效N-VIP卡至任意门店顾客服务中心即可进行充值操作。</span>
						</li>
						<li>
							<span class="ask-wd">17.问：有哪些充值方式？</span>
							<span class="ans-wd">答：您可以通过现金、借记卡或信用卡进行充值。</span>
						</li>
						<li>
							<span class="ask-wd">18.问：充值额度有限制吗？</span>
							<span class="ans-wd">答：最低充值金额为100元，单个账户充值后余额不超过5000元。</span>
						</li>
					</ul>

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