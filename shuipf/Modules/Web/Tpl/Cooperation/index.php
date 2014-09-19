<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Cooperation/index')}">合作伙伴</a><span class="clr-ccc"> > </span>合作品牌
				</span> 
			</div>
			<div class="co-top-tab">
				<ul>
					<a href="{:U('Cooperation/index')}"><li class="cur">合作品牌</li></a>
					<a href="{:U('Cooperation/merchant')}"><li>联盟商户</li></a>
				</ul>
			</div>
			<div class="total-brand">共有 <span class="tt-brnd-num">{$count}</span> 个品牌</div>
			<ul class="brand-list">
			<volist name="list" id="vo">
				<li>
					<a href="{:U("Cooperation/detail",array("id"=>$vo['id']))}"><img src="{$vo.img}" alt=""></a>
					<div class="brand-list-wds">
						<a href="{:U("Cooperation/detail",array("id"=>$vo['id']))}"><h3>{$vo.name}</h3></a>
						<p class="brand-list-wd-time">{$vo.date_time} 更新</p>
						<p class="brand-list-wd-intro">{$vo.discount}</p>
					</div>
					
				</li>
				</volist>
			</ul>
			<div class="pageNav">
					{$page}
			</div>
		</div>
		
			<div class="bd-b"></div>
		</div>
	<include file="Public:foot"/>