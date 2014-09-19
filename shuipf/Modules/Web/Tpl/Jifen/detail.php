<include file="Public:top"/>
<script type="text/javascript">
			function shouchang(id,keyname)
			{
			    $.post("__APP__/Index/shouchang",{id:id,keyname:keyname},function(data){
			    	if (data.state === 'success') 
			    	{
			    		$("#shouchangkey").addClass("detail-gift-clct-btn2");
						$("#shouchangkey").removeAttr("onclick"); 
			        }else
			        {
	 		        	$.layer({
	 		      		    type : 2,
	 		      		    title : '会员登录',
	 		      		    iframe : {src : '__APP__/Index/login'},
	 		      		    area : ['600px' , '330px'],
	 		      		    offset : ['100px','']
	 		      		});
				    }
			        },'json'
			     );
			}
</script>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Jifen/index')}">积分兑换</a><span class="clr-ccc"> > </span>{$name}
				</span> 
			</div>
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$img}" width="295" height="215" alt="">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
						<div class="credit-chn-box">
							<div class="credit-chn-wd" style="margin: 8px 0 0 0">
								<span class="credit-chn-tt">兑换积分：</span>
								<span class="credit-chn-str">{$jifen}积分</span>
							</div>
							<div class="credit-chn-wd" style="margin: 3px 0">
								<span class="credit-chn-tt">礼品编号：</span>
								<span class="credit-chn-str">{$code}</span>
							</div>
							<div class="credit-chn-card" style="margin: 0 0 8px 0">
								<span class="credit-chn-tt">礼品状态：</span>
								<span class="credit-chn-str"><if condition="$kucun LT 1"> 缺货 <else /> 有货（您可至支持兑换的门店使用积分换取礼品） </if></span>
							</div>
						</div>
						<div class="detail-panel">
							<button class="ol-chn-btn-gry"></button>
							<span class="dvlp-ing">正在开发中，敬请期待....</span>
							
							<if condition="$keyname eq 1 ">
							<button id="shouchangkey" class="detail-gift-clct-btn" onclick="shouchang({$id},'collection');"></button>
							<else/>
							<button class="detail-gift-clct-btn2" ></button>
							</if>
							
							<div id="tip" style="color: red"></div>
							
							<div class="detail-share" >
								<span>分享给朋友：</span>
								<!-- JiaThis Button BEGIN -->
									<div class="jiathis_style" style="display:inline-block;">
										<a class="jiathis_button_qzone"></a>
										<a class="jiathis_button_tsina"></a>
										<a class="jiathis_button_tqq"></a>
										<a class="jiathis_button_weixin"></a>
										<a class="jiathis_button_renren"></a>
										<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
									</div>
									<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
									<!-- JiaThis Button END -->
							</div>
							
							
						</div>
					</div>
				</div>
				<div class="detail-store">
					<i class="detail-store-i"></i>
					<span style="color: #333">{$city}支持兑换该礼品的门店：</span>
					<volist name="storelist" id="vo">
					<span><a href="__APP__/About/detail/id/{$vo.id}">{$vo.name}</a></span>
					</volist>
				</div>
				<!-- <div class="detail-show">
					<h1>礼品介绍</h1>
					<div class="gift-intro">
						{$description}
					</div>
					<div class="gift-pt-show">
						{$jieshao}
					</div>
				</div> -->
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>