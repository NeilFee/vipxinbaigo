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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/index')}">合作伙伴</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/index')}">合作品牌</a><span class="clr-ccc"> > </span>{$name}
				</span>
			</div>
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$img}" width="295" height="215" alt="">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
						<span class="brand-info">
							{$discount}
						</span>
						<div class="detail-panel">
							<if condition="$keyname eq 1 ">
							<button id="shouchangkey" class="detail-clct-btn" onclick="shouchang({$id},'cooperation');"></button>
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
										<a class="jiathis_counter_style"></a>
									</div>
									<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
									<!-- JiaThis Button END -->
							</div>
						</div>
					</div>
				</div>
				<div class="detail-show">
					<h1>品牌详情</h1>
					<div class="brand-intr-wd">
						{$news}
					</div>
				</div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>