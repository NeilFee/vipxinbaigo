<include file="Public:top"/>
<script type="text/javascript">
			function shouchang(id,keyname)
			{
			    $.post("__APP__/Index/shouchang",{id:id,keyname:keyname},function(data){
			    	if (data.state === 'success') 
			    	{
			    		$("#shouchangkey").html('');
			    		$("#shouchangkey").html('<button class="detail-gift-clct-btn2" ></button>');
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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Newday/index')}">每天一点新</a><span class="clr-ccc"> > </span><a href="{:U("Newday/daynews")}">最新资讯</a><span class="clr-ccc"> > </span>{$title}
				</span> 
			</div>
			<div class="detail-ct clearfix">
				<div class="news-dt-l">
					<div class="news-dt-top">
						<div class="news-dt-top-l">
							<h1 style="margin: 10px 0 5px 0;">{$title}</h1>
							<h2 style="margin: 5px 0 0 0;line-height:auto">发布日期： {$date_time}</h2>
							<div class="detail-share" style="margin: 5px 0 0 0;line-height:auto;height:auto;float:left">
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
						<div id="shouchangkey">
						   <if condition="$keyname eq 1">
						   		<div class="news-dt-top-r" id="news-dt-top-r">
									<button class="news-dt-top-r"  onclick="shouchang({$id},'daynews');"></button>
								</div>
							<else/>
							<button class="detail-gift-clct-btn2" ></button>
							</if>
						</div>	
							
					</div>
					<div class="news-dt-ct">
						{$news}
					</div>
				</div>
				<div class="news-dt-r">
					<h2>热门资讯</h2>
					<volist name="daytuijian" id="vo">
					<div class="news-dt-list">
						<a href="__URL__/newsdetail/id/{$vo.id}"><h3>{$vo.title}</h3></a>
					</div>
					</volist>
				</div>
				
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>