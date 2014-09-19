	<div class="bottom">
		<a href="">
				<div class="bottom-inst">
					<a href="{:U('About/bevip')}"><h2>新手攻略</h2></a>
					<p>立即成为会员<br>新手礼包</p>
				</div>
			</a>
			
			<a href="">
				<div class="bottom-inst">
					<a href="{:U('About/viprights')}"><h2>会员特权</h2></a>
					<p>什么是会员特权<br>会员权益</p>
				</div>
			</a>
			<a href="">
				<div class="bottom-inst">
					<a href="{:U('About/bevip')}"><h2>会员成长</h2></a>
					<p>如何升级会员卡<br>会员等级</p>
				</div>
			</a>
<div class="foot">
			<p>
			<a href="__ROOT__/">首页</a>
			　|　
			<a href="{:U('Help/about')}">关于新世界百货</a>
			　|　
			<a href="{:U('Help/helpop')}">合作机会</a>
			　|　
			<a href="{:U('Help/contact')}">联系我们</a>
			　|　
			<a href="{:U('Help/problem')}">帮助中心</a>
			　|　
			<a href="{:U('Help/map')}">网站地图</a>
    		
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
<script type="text/javascript" src="{$config_siteurl}statics/web/js/home.min.js"></script>
		<script type="text/javascript" src="{$config_siteurl}statics/web/js/slider.js"></script>
		
		<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>