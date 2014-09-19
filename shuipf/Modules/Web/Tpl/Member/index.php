<include file="menu"/>
			<div class="vip-ct-rct my-vip-card">
				<div class="card-info">
				
				<if condition="$member_user['vipgrade'] eq 'VP'"><img class="card-pt" src="{$config_siteurl}statics/web/img/ng-nwds.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'GO'"><img class="card-pt" src="{$config_siteurl}statics/web/img/go.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'PT'"><img class="card-pt" src="{$config_siteurl}statics/web/img/pt.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'GD'"><img class="card-pt" src="{$config_siteurl}statics/web/img/gd.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'DI'"><img class="card-pt" src="{$config_siteurl}statics/web/img/jtbz.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'ST'"><img class="card-pt" src="{$config_siteurl}statics/web/img/jtml.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'GP'"><img class="card-pt" src="{$config_siteurl}statics/web/img/ng-nwds.png" alt=""></if>
				<if condition="$member_user['vipgrade'] eq 'BG'"><img class="card-pt" src="{$config_siteurl}statics/web/img/bg.png" alt=""></if>
				
				<!-- nwds & blct -->
				<if condition="$member_user['vipgrade'] eq 'ND'">
					<if condition="($member_user['issuestore'] eq 'SH1') or ($member_user['issuestore'] eq 'SH2') or ($member_user['issuestore'] eq 'SH3') or ($member_user['issuestore'] eq 'SH4') or ($member_user['issuestore'] eq 'SH5') or ($member_user['issuestore'] eq 'SH6') or ($member_user['issuestore'] eq 'SH7') or ($member_user['issuestore'] eq 'SH8') or ($member_user['issuestore'] eq 'SH9')">
						<img class="card-pt" src="{$config_siteurl}statics/web/img/nd-blct.png" alt="">
					<else/>
						<img class="card-pt" src="{$config_siteurl}statics/web/img/nd-nwds.png" alt="">
					</if>
				</if>
				<if condition="$member_user['vipgrade'] eq 'NG'">
					<!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<if condition="($member_user['issuestore'] eq 'SH1') or ($member_user['issuestore'] eq 'SH2') or ($member_user['issuestore'] eq 'SH3') or ($member_user['issuestore'] eq 'SH4') or ($member_user['issuestore'] eq 'SH5') or ($member_user['issuestore'] eq 'SH6') or ($member_user['issuestore'] eq 'SH7') or ($member_user['issuestore'] eq 'SH8') or ($member_user['issuestore'] eq 'SH9')">
						<img class="card-pt" src="{$config_siteurl}statics/web/img/ng-blct.png" alt="">
					<!-- else  -->
					<else/>
						<img class="card-pt" src="{$config_siteurl}statics/web/img/ng-nwds.png" alt="">
					</if>
				</if>
				<if condition="$member_user['vipgrade'] eq 'NP'">
					<!-- if issuestore == SH1 || SH2 || SH3 || SH4 || SH5 || SH6 || SH7 || SH8 || SH9 -->
					<if condition="($member_user['issuestore'] eq 'SH1') or ($member_user['issuestore'] eq 'SH2') or ($member_user['issuestore'] eq 'SH3') or ($member_user['issuestore'] eq 'SH4') or ($member_user['issuestore'] eq 'SH5') or ($member_user['issuestore'] eq 'SH6') or ($member_user['issuestore'] eq 'SH7') or ($member_user['issuestore'] eq 'SH8') or ($member_user['issuestore'] eq 'SH9')">
						<img class="card-pt" src="{$config_siteurl}statics/web/img/np-blct.png" alt="">
					<!-- else  -->
					<else/>
						<img class="card-pt" src="{$config_siteurl}statics/web/img/np-nwds.png" alt="">
					</if>
				</if>
					
					<ul class="card-wd">
						<li>
							<span>会员卡级别：</span>
							<span class="card-num">

							<if condition="$member_user['vipgrade'] eq 'VP'">普卡</if>
							<if condition="$member_user['vipgrade'] eq 'GO'">金卡</if>
							<if condition="$member_user['vipgrade'] eq 'PT'">白金卡</if>
							<if condition="$member_user['vipgrade'] eq 'GD'">金钻卡</if>
				            <if condition="$member_user['vipgrade'] eq 'DI'">标准卡</if>
							<if condition="$member_user['vipgrade'] eq 'ST'">名流卡</if>
							<if condition="$member_user['vipgrade'] eq 'GP'">集团卡</if>
							<if condition="$member_user['vipgrade'] eq 'ND'">金钻卡</if>
							<if condition="$member_user['vipgrade'] eq 'NG'">金卡</if>
							<if condition="$member_user['vipgrade'] eq 'NP'">白金卡</if>
							<if condition="$member_user['vipgrade'] eq 'BG'">黑金卡</if>

							（{$member_user.vipcode}）</span>
							&nbsp;<a href="{:U('About/viprights')}">我的会员权益>></a>
						</li>
						<li>
							<span>可 用 积 分：</span>
							<span class="jf-num">
							<?php echo (int)$member_user['currentbonus'];?>分
							</span>
							&nbsp;
							<a href="{:U('Jifen/index')}">立即兑换礼品>></a>
						</li>
						<li>
							<span>最后有效期：</span>
							<span class="jf-num">
							<?php echo  date("Y年m月d日",strtotime($member_user['expirydate_yyyymmdd' ])); ?>
							</span>
							<span>（以最新申领的会员卡为准）</span>
						</li>
					</ul>
				</div>
				<div class="card-ct">
					<ul class="mid-tab" style="margin-bottom: -4px;">
						<li class="zs" style="border-bottom-color: #a48f65;width: 95px;height: 28px;">
							<a href="" style="color: #a48f65;font-size: 14px;font-weight: bold;">专属活动</a>
						</li>
					</ul>
					<div class="zs-ct">
					
					<volist name="activitieslist" id="vo">
						<div class="zs-each" style="background: #fff;margin: 0 -1px 0 0px;border-color:#ccc">
							<a href="__APP__/Newday/detail/id/{$vo.id}">
								<img src="{$vo.img}" width="180" height="135" alt=""></a>
							<div class="zs-wd">
							<a href="">
								<?php 
							$mendiansub= substr($vo['mendian'],0,strlen($vo['mendian'])-1);
							$mendianarray=explode(',',$mendiansub); 
							$num=count($mendianarray);
							?>
									<h2><a href="__APP__/Newday/detail/id/{$vo.id}">【{$vo.title}】</a></h2>
									
									<volist name="mendianarray" id="qo">
									<if condition="$key LT 5 ">
									<volist name="storelist" id="co">
										<if condition="$qo eq $co['id'] ">
                                        <p> {$co.name}</p>	
									   </if>
										</volist>
										<else/>
										<a href="__URL__/detail/id/{$vo.id}"><p>更多..</p></a>
										
										</if>
									</volist>
									<p>时间：<?php echo date("m.d",strtotime($vo['s_date'])); ?>-<?php echo date("m.d",strtotime($vo['e_date'])); ?></p>
								</a>
							</div>
						</div>
					</volist>
					
					</div>

					
					<div class="card-mid-bottom" style="background:none;margin: 20px 0 0 0;height: 195px;">
							<ul class="mid-tab" style="width:720px;margin-bottom: -4px;">
								<li class="zs" style="border-bottom-color: #a48f65;width: 95px;height: 28px;margin:0">
									<a href="" style="color: #a48f65;font-size: 14px;font-weight: bold;">推荐礼品</a>
								</li>
							</ul>
							<ul id="new-gift" class="new-gift" style="width: 707px;background: #fff;padding-left: 10px;">
							<volist name="productlist" id="vo">
								<li style="margin:20px 10px 0 20px">
									<a href="{:U("Jifen/detail",array("id"=>$vo['id']))}" target="_blank">
										<img src="{$vo.img}" width="140" height="105" alt="{$vo.jifen}">
										<h2 style="margin:0;font-weight:normal;padding:0;border:none" title="{$vo.name}">{$vo.name}</h2>
									</a>
								</li>
								<div class="sp-line" style="margin: 12px 3px;"></div>
							</volist>
								<li class="cov-lst-line" style="width: 30px;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bd-b"></div>
	</div>
<include file="foot"/>		