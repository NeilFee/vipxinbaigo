<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/index')}">合作伙伴</a><span class="clr-ccc"> > </span>联盟商户
				</span> 
			</div>
			<div class="co-top-tab2">
				<ul>
					<a href="{:U('Cooperation/index')}"><li>合作品牌</li></a>
					<a href="{:U('Cooperation/merchant')}"><li class="cur">联盟商户</li></a>
				</ul>
				
				
				<div class="tab-section3 clearfix">
					<div class="section-btbd">
						<span>选择城市：</span>
						<div class="section-wd">
						<a <if condition="$act eq 'a'"> class="cur"</if> href="{:U("Cooperation/merchant",array("act"=>'a'))}">不限</a>
							<volist  name="citylist" id="vo">
							<a <if condition="$cityid eq $vo['id']"> class="cur"</if>  href="{:U("Cooperation/merchant",array("cityid"=>$vo['id']))}">{$vo.name}</a>
							</volist>
						</div>
					</div>
					<div class="sec-section2">
					<if condition="$storelistcc neq null">
						<div class="sec-section-wd">
							<volist  name="storelistcc" id="vo">
							<a <if condition="$mendian eq $vo['id']"> class="cur"</if> href="__URL__/merchant/storeid/{$vo['id']}/cityid/{$cityid}">{$vo.name}</a>
							</volist>
						</div>
						</if>
					</div>
					
				</div>
				
				<div class="tab-section2 clearfix">
					<span>选择品类：</span>
					<div class="section-wd">
						<a href="{:U('Cooperation/merchant')}">不限</a>
						<volist name="businessesnodelist" id="vo">
						<a <if condition="$mid eq $vo['id'] ">class="cur"</if> href="__URL__/merchant/mid/{$vo['id']}">{$vo.name}</a>
						</volist>
					</div>
				</div>
			</div>
			<div class="total-brand">共有 <span class="tt-brnd-num">{$count}</span> 家联盟商户</div>
			<ul class="merchn-list">
			<volist name="list" id="vo">
				<li>
					<a href="{:U("Cooperation/mdetail",array("id"=>$vo['id']))}"><img src="{$vo.name_img}" alt=""></a>
					<a href="">
						<h3>{$vo.name}</h3>
					</a>
				</li>
			</volist>	
			</ul>
			<div class="rec-merchn-r">
			<h1>< 商户推荐 ></h1>
			<volist name="tuijianlist" id="vo">
				<div class="rec-ct">
					<i class="rec-num-1"></i>
					<div class="rec-each">
						<a href="{:U("Cooperation/mdetail",array("id"=>$vo['id']))}">
						<img src="{$vo.name_img}" alt=""></a>
						<div class="rec-mask"></div>
						<p class="rec-wd">
							<a href="{:U("Cooperation/mdetail",array("id"=>$vo['id']))}">{$vo.name}</a>
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