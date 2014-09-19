<include file="menu"/>
				<div class="vip-ct-rct">
					<h2>我的收藏</h2>
					<ul class="vip-rct-tab">
						<a href="{:U("Member/collection",array("ntype"=>'collection'))}"><li <if condition="$where eq 'collection' "> class="cur"</if>>礼品<if condition="$where eq 'collection' ">({$count})</if></li></a>
						<a href="{:U("Member/collection",array("ntype"=>'activities'))}"><li <if condition="$where eq 'activities' "> class="cur"</if>>活动<if condition="$where eq 'activities' ">({$count})</if></li></a>
						<a href="{:U("Member/collection",array("ntype"=>'businesses'))}"><li <if condition="$where eq 'businesses' "> class="cur"</if>>商户<if condition="$where eq 'businesses' ">({$count})</if></li></a>
						<a href="{:U("Member/collection",array("ntype"=>'cooperation'))}"><li <if condition="$where eq 'cooperation' "> class="cur"</if>>品牌<if condition="$where eq 'cooperation' ">({$count})</if></li></a>
						<a href="{:U("Member/collection",array("ntype"=>'store'))}"><li <if condition="$where eq 'store' "> class="cur"</if>>门店<if condition="$where eq 'store' ">({$count})</if></li></a>
						<a href="{:U("Member/collection",array("ntype"=>'daynews'))}"><li <if condition="$where eq 'daynews' "> class="cur"</if>>资讯<if condition="$where eq 'daynews' ">({$count})</if></li></a>
						<li class="vip-rct-tab-bg"></li>
					</ul>
					<!-- ________________________________礼品_______________________________ -->
					<if condition="$where eq 'collection' ">
					<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="170">礼品图片</th>
							<th width="270">名称</th>
							<th width="155">兑换条件</th>
							<th width="150">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="170">
							<a href="{:U("Jifen/detail",array("id"=>$vo['id']))}" target="_blank"><img src="{$vo.img}" alt="{$vo.name}"></a></td>
							<td width="270" style="color: #a48f65;"><a href="{:U("Jifen/detail",array("id"=>$vo['id']))}" target="_blank">{$vo.name}</a></td>
							<td width="155" style="color: #a48f65;">{$vo.jifen}积分</td>
							<td width="200">
							<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							
							</td>
						</tr>
						</volist>
					</table>
					</if>
					<!-- ________________________________活动_______________________________ -->
					<if condition="$where eq 'activities' ">
					<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="115">活动</th>
							<th width="175">主题</th>
							<th width="125">门店</th>
							<th width="185">时间</th>
							<th width="140">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="115"><a href="{:U("Newday/detail",array("id"=>$vo['id']))}" target="_blank"><img src="{$vo.img}" alt=""></a></td>
							<td width="175" style="color: #a48f65;"><a href="{:U("Newday/detail",array("id"=>$vo['id']))}" target="_blank">{$vo.title}</a></td>
							<td width="125">
							<?php 
							$mendiansub= substr($vo['mendian'],0,strlen($vo['mendian'])-1);
							$mendianarray=explode(',',$mendiansub); 
							$num=count($mendianarray);
							?>
							共{$num}家门店支持该活动
							</td>
							<td width="185">{$vo.s_date} 至 {$vo.e_date}</td>
							<td width="200"><!-- JiaThis Button BEGIN -->
								<div class="jiathis_style">
									<span class="jiathis_txt">分享到：</span>
									<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
								</td>
						</tr>
						</volist>

					</table>
						</if>
					<!-- _______________________________商户_______________________________ -->
					<if condition="$where eq 'businesses' ">
				<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">联系电话</th>
							<th width="130">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="130"><a href="{:U("Cooperation/mdetail",array("id"=>$vo['id']))}" target="_blank"><img src="{$vo.name_img}" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="{:U("Cooperation/mdetail",array("id"=>$vo['id']))}" target="_blank">{$vo.name}</a></td>
							<td width="155">{$vo.phone}</td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr>
						</volist>
					</table>
					</if>
					
					
					<!-- _______________________________品牌_______________________________ -->
					<if condition="$where eq 'cooperation' ">
				<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">介绍</th>
							<th width="130">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="130"><a href="{:U("Cooperation/detail",array("id"=>$vo['id']))}" target="_blank"><img src="{$vo.img}" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="{:U("Cooperation/detail",array("id"=>$vo['id']))}" target="_blank">{$vo.name}</a></td>
							<td width="155">{$vo.discount}</td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr>
						</volist>
					</table>
					</if>
					
					
					<!-- _______________________________门店_______________________________ -->
					<if condition="$where eq 'store' ">
				<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="130">商户</th>
							<th width="130">商户名</th>
							<th width="155">联系电话</th>
							<th width="130">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="130"><a href="{:U("About/detail",array("id"=>$vo['id']))}" target="_blank"><img src="{$vo.images_url}" alt=""></a></td>
							<td width="130" style="color: #a48f65;"><a href="{:U("About/detail",array("id"=>$vo['id']))}" target="_blank">{$vo.name}</a></td>
							<td width="155">{$vo.phone}</td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr>
						</volist>
					</table>
					</if>
					
					<!-- _______________________________资讯_______________________________ -->
					<if condition="$where eq 'daynews' ">
				<table class="my-sc-act" cellpadding="0" cellspacing="0" border="0" border-collapse="collapse" border-spacing="0" >
						<tr>
							<th width="370" style="text-align:left;padding-left:60px">资讯</th>
							<th width="145">发布时间</th>
							<th width="130">操作</th>
						</tr>
						<volist name="list" id="vo">
						<tr>
							<td width="370">
							<a style="color: #a48f65;" href="{:U("Newday/newsdetail",array("id"=>$vo['id']))}" target="_blank">
							
									{$vo.title}
								</a>
							</td>
							<td width="145">{$vo.date_time}</td>
							<td width="200">
								<!-- JiaThis Button BEGIN -->
								<div class="jiathis_style" style="float: right;">
									<a  class="J_ajax_del" style="float: left;" href="{:U("Member/collectiondel",array("id"=>$vo['id']))}">删除</a>
									<span class="jiathis_txt"> | 分享到：</span>
									<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
								</div>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1394352421349918" charset="utf-8"></script>
							<!-- JiaThis Button END -->
							</td>
						</tr>
						</volist>

					</table>
					</if>
					<div class="pageNav">
					{$page}
					</div>
				</div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="foot"/>