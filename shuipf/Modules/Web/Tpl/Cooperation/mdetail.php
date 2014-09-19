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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/index')}">合作伙伴</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/merchant')}">联盟商户</a><span class="clr-ccc"> > </span>{$name}
				</span>
			</div>
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$name_img}" width="295" height="215" alt="">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
							<div class="lmsh-detail-tt-sec-address">
								<i class="merch-loc-i"></i>
								<span class="merch-add">商户地址：{$address}</span>
							</div>
							<div class="lmsh-detail-tt-sec-tel">
								<i class="merch-tel-i"></i>
								<span class="merch-tel">联系方式：{$phone}</span>
							</div>

						<div class="detail-panel">
							
							<if condition="$keyname eq 1 ">
							<button id="shouchangkey" class="detail-clct-btn" onclick="shouchang({$id},'businesses');"></button>
							<else/>
							<button class="detail-gift-clct-btn2" ></button>
							</if>
							
							
							<div class="detail-share">
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
				
				<div class="detail-show">
					<h1>商户优惠</h1>
					
				</div>
				{$introduction}
					
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>