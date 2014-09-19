<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Newday/index')}">每天一点新</a><span class="clr-ccc"> > </span>会员活动
				</span> 
			</div>
			<div class="co-top-tab2">
				<ul>
					<a href="{:U("Newday/index")}"><li class="cur">会员活动</li></a>
					<a href="{:U("Newday/daynews")}"><li>最新资讯</li></a>
				</ul>
				<div class="tab-section3 clearfix">
					<div class="section-btbd">
						<span>选择城市：</span>
						<div class="section-wd">
							<a <if condition="$act eq 'a'"> class="cur"</if> href="{:U("Newday/index",array("act"=>'a'))}">不限</a>
							<volist name="citylist" id="vo">
							<a <if condition="$cityid eq $vo['id']"> class="cur"</if> href="{:U("Newday/index",array("cityid"=>$vo['id']))}">
							{$vo.name}</a>
							</volist>
						</div>
					</div>
					<div class="section-btbd-non" style="border:none;">
						<div class="sec-section2">
						<if condition="$storelist neq null">
						<div class="sec-section-wd">
							<volist name="storelist" id="vo">
							<a <if condition="$mendian eq $vo['id']"> class="cur"</if> href="__URL__/index/storeid/{$vo['id']}/cityid/{$cityid}">
							{$vo.name}</a>
							</volist>
						</div>
						</if>
					</div>
					</div>
				</div>
			</div>
			<div class="mtydx-act-l">
			<div class="total-brand2">共有 <span class="tt-brnd-num">{$count}</span> 个活动</div>
			<div class="mtydx-act-ct">
			
			    <volist name="list" id="vo">
					<div class="zx-each">
						<a href="__URL__/detail/id/{$vo.id}"><img src="{$vo.img}" width="180" height="135" alt=""></a>
						<div class="zx-wd">
						<a href="__URL__/detail/id/{$vo.id}">
							<h2>【{$vo.title}】</h2>
							<?php 
							$mendiansub= substr($vo['mendian'],0,strlen($vo['mendian'])-1);
							$mendianarray=explode(',',$mendiansub); 
							$num=count($mendianarray);
							?>
							<volist name="mendianarray" id="qo">
									<if condition="$key LT 5 ">
									<volist name="storelistcc" id="co">
										<if condition="$qo eq $co['id'] ">
                                        <p> {$co.name}</p>	
									   </if>
										</volist>
										<else/>
										<p>更多..</p>
										</if>
										
							</volist>						
								<p>时间：<?php echo date("m.d",strtotime($vo['s_date'])); ?>-<?php echo date("m.d",strtotime($vo['e_date'])); ?></p>
						</a>
						</div>
					</div>
				</volist>
				</div>
				</div>
				<div class="rec-merchn-r" style="margin-top: 30px;">
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