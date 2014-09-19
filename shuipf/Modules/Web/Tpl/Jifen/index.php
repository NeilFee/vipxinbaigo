<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span>积分兑换
				</span> 
			</div>
			<div class="co-top-tab2">
				<div class="tab-section3 clearfix">
					<div class="section-btbd">
						<span>选择城市：</span>
						<div class="section-wd">
						<a <if condition="$act eq 'a'"> class="cur"</if> href="{:U("Jifen/index",array("act"=>'a'))}">不限</a>
							<volist  name="citylist" id="vo">
							<a <if condition="$cityid eq $vo['id']"> class="cur"</if>  href="{:U("Jifen/index",array("cityid"=>$vo['id']))}">{$vo.name}</a>
							</volist>
						</div>
					</div>
					<div class="sec-section2">
					<if condition="$storelistcc neq null">
						<div class="sec-section-wd">
							<volist  name="storelistcc" id="vo">
							<a <if condition="$mendian eq $vo['id']"> class="cur"</if> href="__URL__/index/storeid/{$vo['id']}/cityid/{$cityid}">{$vo.name}</a>
							</volist>
						</div>
						</if>
					</div>
					<div class="section-btbd">
						<span>选择品类：</span>
						<div class="section-wd">
						<a href="{:U("Jifen/index")}">不限</a>
							<volist name="productstypelist" id="vo">
							<a href="__URL__/index/typeid/{$vo['id']}">{$vo.name}</a>
							</volist>
						</div>
					</div>
					<div class="section-btbd-non">
						<span>积分范围：</span>                              
						<div class="section-wd">
							<a href="{:U("Jifen/index")}">不限</a>
							<volist name="productsprecelist" id="vo">
							<a href="__URL__/index/productsid/{$vo['id']}">{$vo.s_price}-{$vo.e_price}</a>
							</volist>
						</div>
					</div>
				</div>
			</div>
			<div class="total-brand">共有 <span class="tt-brnd-num">{$count}</span> 个礼品</div>
			<ul class="cdt-gift-list">
			<volist name="list" id="vo">
				<li>
					<a href="{:U("Jifen/detail",array("id"=>$vo['id']))}"><img src="{$vo.img}" alt="">
					
						<h3>{$vo.name}</h3>
						<h4>{$vo.jifen}积分
						</h4>
						<!--<i class="credit-i"></i>-->
					</a>
				</li>
				</volist>
			</ul>
			<div class="rec-merchn-r">
			<h1>< 热门兑换 ></h1>
				<volist name="productslist" id="vo">
				<div class="rec-ct">
					<div class="rec-each">
						<a href="{:U("Jifen/detail",array("id"=>$vo['id']))}">
						<img src="{$vo.img}" alt="">
						<p class="rec-wd">
							{$vo.name}
						</p>
						</a>
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