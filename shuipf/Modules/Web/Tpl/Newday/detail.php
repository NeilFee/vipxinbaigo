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
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="{:U('Newday/index')}">每天一点新</a>
					<span class="clr-ccc"> > </span><a href="{:U('Newday/index')}">会员活动</a><span class="clr-ccc"> > </span>{$title}
				</span>
			</div>
			<div class="detail-ct">
				<div class="detail-top">
					<div class="detail-l">
						<img src="{$img}" width="285" height="215">
					</div>
					<div class="detail-r">
						<h1 class="detail-title">活动主题：{$title}</h1>
						<i class="detail-time-i"></i>
						<span class="act-time">活动时间：{$s_date} 至 {$e_date}</span>
						<if condition="strtotime($e_date) lt time() ">
							<button id="yiguoqikey" class="detail-outdated-btn" onclick=""></button>
						</if>
						<div class="detail-panel">
							
							<if condition="$keyname eq 1 ">
							<button id="shouchangkey" class="detail-clct-btn" onclick="shouchang({$id},'activities');"></button>
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
				<div class="detail-store">
					<i class="detail-store-i"></i>
					
					<?php 
							
							$mendianarray=explode(',',$mendian); 
							?>
							
					<span style="color: #333">活动支持门店：</span>
					<volist name="mendianarray" id="vo">
					
					<volist name="storelist" id="co">
			            <if condition="$co['id'] eq $vo">
			            <span><a href="__URL__/index/storeid/{$co.id}/cityid/{$chengshi}">{$co.name}</a></span>
					      
					      </if>
					   </volist>
		   
					
					</volist>
				</div>
				<div class="detail-show">
					<h1>活动详情</h1>
					<div class="gift-intro">
						{$jieshao}
					</div>
					{$news}
				</div>
				<!-- <div class="detail-undln"></div> -->
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="Public:foot"/>