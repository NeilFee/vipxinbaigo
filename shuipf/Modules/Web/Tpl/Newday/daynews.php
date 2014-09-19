<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Newday/index')}">每天一点新</a><span class="clr-ccc"> > </span>最新资讯
				</span> 
			</div>
			<div class="co-top-tab2">
				<ul>
					<a href="{:U("Newday/index")}"><li>会员活动</li></a>
					<a href="{:U("Newday/daynews")}"><li class="cur">最新资讯</li></a>
				</ul>
				<div class="tab-section3 clearfix">
					<div class="section-btbd">
						<span>选择城市：</span>
						<div class="section-wd">
							<a <if condition="$act eq 'a'"> class="cur"</if> href="{:U("Newday/daynews",array("act"=>'a'))}">不限</a>
							<volist name="citylist" id="vo">
							<a <if condition="$cityid eq $vo['id']"> class="cur"</if> href="__URL__/daynews/cityid/{$vo.id}">{$vo.name}</a>
							</volist>
						</div>
					</div>
					<div class="section-btbd-non" style="border:none;">
						<div class="sec-section2">
						<if condition="$storelistcc neq null">
						<div class="sec-section-wd">
							<volist name="storelistcc" id="vo">
							<a  <if condition="$mendian eq $vo['id']"> class="cur"</if>  href="__URL__/daynews/storeid/{$vo.id}/cityid/{$cityid}">{$vo.name}</a>
							</volist>
						</div>
						</if>
					</div>
					</div>
				</div>
			</div>
			<div class="mtydx-act-l">
			<div class="total-brand2">共有 <span class="tt-brnd-num">{$count}</span> 条资讯</div>
			<div class="mtydx-list-ct">
				<ul>
				<volist name="list" id="vo">
					<a href="__URL__/newsdetail/id/{$vo.id}">
						<li>
							<span class="lt">{$vo.title}</span>
							<span class="rt"><span class="mtydx-zxzx-li-fbrq">发布日期：</span><span class="st-clr">{$vo.date_time}</span></span>
						</li>
					</a>
				</volist>	
				</ul>
			</div>
				</div>
				
				<div class="rec-merchn-r">
			      <h1>< 热门活动 ></h1>
				<volist name="hotlist" id="vo">
				<div class="rec-ct">
					<div class="rec-each">
						<a href="{:U("Newday/detail",array("id"=>$vo['id']))}"><img src="{$vo.img}" alt=""></a>
						<p class="rec-wd">
							<a href="{:U("Newday/detail",array("id"=>$vo['id']))}">{$vo.title}</a>
						</p>
					</div>
				</div>
			    </volist>
			    </div>

			
			<div class="pageNav">
					{$page}
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
		
		<include file="Public:foot"/>