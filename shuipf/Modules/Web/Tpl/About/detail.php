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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('About/index')}">关于我们</a><span class="clr-ccc"> > </span>{$name}
				</span>
			</div>
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$images_url}" width="285" height="215" alt="{$name}">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">{$name}</h1>
						<div class="about-info-list">
							<i class="about-gift-i"></i>
							<div class="about-msg">
								<a href="__APP__/Jifen/index/storeid/{$id}/cityid/{$chengshi}">礼品{$productscount}</a>  |  
								<a href="__APP__/Newday/index/storeid/{$id}/cityid/{$chengshi}">活动{$activitiescount}</a> |  
								<a href="__APP__/Newday/daynews/storeid/{$id}/cityid/{$chengshi}">资讯{$daynewscount}</a>
							</div>
							<span>门店地址：{$address}</span>
							<span>服务电话：{$phone}</span>
						</div>
						<div class="detail-panel">
							
							<if condition="$keyname eq 1 ">
							<button id="shouchangkey" class="detail-clct-btn" onclick="shouchang({$id},'store');"></button>
							<else/>
							<button class="detail-gift-clct-btn2" ></button>
							</if>
							
							<div class="detail-share">
								<span>分享给朋友：
								</span>
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
					<span style="color: #333">{$city}的其他门店：</span>
					<volist name="storelistcc" id="co">
					<span><a href="__URL__/detail/id/{$co.id}">{$co.name}</a></span>
					</volist>
				</div>
				<div class="detail-show">
					<h1>门店介绍</h1>
					<span class="about-store-intro">
					{$introduction}
					</span>
				<div class="about-store-gen">
						<h1>门店概况</h1>
						<ul class="about-store-list">
							<li>开业时间: {$opening_time}</li>
							<li>地址：{$address}<i class="loc"></i></li>
							<li>邮编：{$zip_code}</li>
							<li>电话：{$phone}</li>
							<li>传真：{$fax}</li>
						</ul>	
					</div>
					<div class="store-map">
							<!-- 在此处添加地图 -->
							<style type="text/css">
								#allmap {width:500px;height:500px;overflow: hidden;margin:0;}
							</style>

						<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=y1ED862tEvL6tMalfoCdFChv"></script>
						<div id="allmap"></div>
						<script type="text/javascript">

								// 百度地图API功能
								var map = new BMap.Map("allmap");
								var point = new BMap.Point(116.331398,39.897445);
								map.centerAndZoom(point,12);
								// 创建地址解析器实例
								var myGeo = new BMap.Geocoder();
								// 将地址解析结果显示在地图上,并调整地图视野
								myGeo.getPoint("{$address}", function(point){
								  if (point) {
									map.centerAndZoom(point, 16);
									map.addOverlay(new BMap.Marker(point));				

									map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
									map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}));  //右上角，仅包含平移和缩放按钮
									map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT, type: BMAP_NAVIGATION_CONTROL_PAN}));  //左下角，仅包含平移按钮
									map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, type: BMAP_NAVIGATION_CONTROL_ZOOM}));  //右下角，仅包含缩放按钮

								  }
								}, "北京市");
								</script>
						</div>
					<h1>百货指南</h1>
					<ul class="about-floor-list">
					<volist name="storefloorlit" id="vo">
						<li class="floor-num">
							<i class="floor-i"></i>{$vo.name}：{$vo.range}
						</li>
						<li class="floor-store">
						<volist name="vo.Storebrand" id="c">
						 {$c.name},
						</volist>
						</li>
					</volist>	
					</ul>
				</div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>