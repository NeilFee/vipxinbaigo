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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="<?php echo U('Cumulative/index');?>">累积积分</a>
				</span>
				
			</div>
			<div class="help-pb" style="background: #fff">
				<div class="help-top-tab">
					<ul>
						<a href=""><li class="cur">累积积分</li></a>
					</ul>
				</div>
			
			<div class="credit-pl-box">
				<span class="credit-pl-wd">
					　　享受贴心周到的会员礼遇之余，您亦可以凭符合资格的消费赚取积分奖励，用以换取各类缤纷奖赏。超值欢乐购，积分轻松拿。
				</span>
			</div>

			<div class="credit-pl-box">
				<div class="credit-pl-tt clearfix">
					<h2>积分获取渠道</h2><br>	
				</div>
				<a href="<?php echo U('About/index');?>"><i class="retail-store-icon"></i><h3 class="retail-store-h3">零售门店</h3></a><br>
				<p class="jfqd-wd">我们在全国拥有40家门店遍布于20多个城市，您只需在任意新世界百货以及上海巴黎春天消费，即可轻松赚取积分。</p>
			</div>

			<div class="viprights-table1" style="margin-left:10px;">
				<div class="credit-pl-tt clearfix">
					<h2>积分获取规则</h2>
				</div>
                    	<table>
                        	<tr>
                            	<td width="190" class="bl"><h1>消费类型</h1></td>
                            	<td width="150" class="bl"><h1>金钻卡</h1></td>
                            	<td width="150" class="bl"><h1>钻石卡</h1></td>
                            	<td width="150" class="bl"><h1>白金卡</h1></td>
                            	<td width="150" class="bl"><h1>金卡</h1></td>
                            	<td width="150" class="bl"><h1>普卡</h1></td>
                            </tr>
                        </table>
                    	<table>
<!--                         	<tr>
                            	<td colspan="6" class="bl"><h1>积分累积</h1></td>
                            </tr> -->
                        	<tr class="sing">
                            	<td class="bl" width="190"><h3>百货<br /><font style="font-size:12px">＊&nbsp;特例商品除外</font></h3></td>
                            	<td width="150">1元=1分</td>
                            	<td width="150">1元=1分</td>
                            	<td width="150">1元=1分</td>
                            	<td width="150">1元=1分</td>
                            	<td width="150">2元=1分</td>
                            </tr>
                        	<tr>
                            	<td class="bl"><h3>超市</h3></td>
                            	<td width="150">5元=1分</td>
                            	<td width="150">5元=1分</td>
                            	<td width="150">5元=1分</td>
                            	<td width="150">5元=1分</td>
                            	<td width="150">10元=1分</td>
                            </tr>
                        </table>

			</div>
                        <div style="text-aligin:left">
							<span class="viprights-tishi">
                			    　　*&nbsp;特例商品包括黄金、数码电子、影音器材等商品。投资类黄金（如金条、金币、金摆件等）不积分。<br />　　*&nbsp;具体积分规则另见店内公示。
							</span>
						</div>
          		
           
	<div class="blk-100 clearfix"></div>
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
	<script>
		$(document).ready(function() {
			$('.ask-wd').click(function() {
				$(this).parent('li').find('.ans-wd').toggle();
			});
		});
	</script>