<include file="menu"/>
              <if condition="$upkey eq 1"> 
                 <form class="J_ajaxForm" action="{:U('Member/center')}" method="post" id="myform">
				<input type="hidden" name="vipcode" value="{$vipcode}"  >
			   <input type="hidden" name="vipid" value="{$vipid}">
			  <input type="hidden" name="surname" value="{$surname}">
			   <input type="hidden" name="emailcontact" value="{$emailcontact}">
			    <input type="hidden" name="lastmodify_yyyymmdd" value="{$lastmodify_yyyymmdd}">
			   <input type="hidden" name="lastmodify_hhmmss" value="{$lastmodify_hhmmss}">
			   <input type="hidden" name="educationcode" value="{$educationcode}">
			   <input type="hidden" name="givenname" value="{$givenname}">
			    <input type="hidden" name="telephone2" value="{$telephone2}">
			     <input type="hidden" name="currentbonus" value="{$currentbonus}">
			      <input type="hidden" name="issuestore" value="{$issuestore}">
			     <input type="hidden" name="password" value="{$password}">
			    <input type="hidden" name="ismainvip" value="{$ismainvip}">
			   <input type="hidden" name="vipcardtype" value="{$vipcardtype}">
			   <input type="hidden" name="modifybystaffcode" value="{$modifybystaffcode}">
				<div class="vip-ct-rct person-info-ct">
					<h2>个人资料</h2>
				<ul class="person-info" style="height:460px;display:block">
					<li style="display:inline-block;margin-right:60px">
						<h4>会员姓名：</h4>
						<span>{$surname}</span>
					</li>
					<li style="display:inline-block">
						<h4>身份证号：</h4>
						<span>{$vipid}</span>
					</li>
					<li>
						<h4>手机号码：</h4>
						<span><input class="chn-text" type="text" name="telephone" value="{$telephone}"></span>
					</li>
					<li>
						<h4>联系地址：</h4>
						<span><input class="chn-text" type="text" name="address1" value="{$address1}"></span>
					</li>
					<li>
						<h4>邮　　编：</h4>
						<span><input class="chn-text" value="{$postal}" name="postal" style="width:158px" type="text"></span>
					</li>
					<li>
						<h4>性　　别：</h4>
						<span>
						<input type="radio" value="M" <if condition="$sex eq  'M'">checked="checked"</if> name="sex"/>男　　
						<input type="radio" value="F" <if condition="$sex eq  'F'">checked="checked"</if> name="sex"/>女
						</span>
					</li>
					
					<li>
						<h4>出生日期：</h4>
						<span>
							<input name="shengri" class="chn-text J_date date" type="text" value="{$birthdayyyyy}-{$birthdaymm}-{$birthdaydd}"/>
						</span>
					</li>
					<li>
						<h4>Email&nbsp;&nbsp;　：</h4>
						<span><input class="chn-text" name="vipemail" type="text" value="{$vipemail}"></span>
					</li>
					
					<li>
						<h4>从事行业：</h4>
						<span><input class="chn-text" name="industrycode" value="{$industrycode}" type="text"></span>
					</li>
					<li>
						<h4>工作收入：</h4>
						<span>
							<input class="chn-text" name="incomecode" value="{$incomecode}" style="width:158px;margin-right:5px" type="text">
							<span style="font-size:12px">月/RMB</span>
						</span>
					</li>
				</ul>
				<button type="submit" class="psn-chn J_ajax_submit_btn" style="display:inline-block;margin-left: 109px;" value=" 确认修改" >确认修改</button>	
				</form>
				</div>
				
				
				<else/>
				<div class="vip-ct-rct person-info-ct">
					<h2>个人资料</h2>
				<ul class="person-info" style="height:460px;display:block">
					<li style="display:inline-block;margin-right:60px">
						<h4>会员姓名：</h4>
						<span>{$surname}</span>
					</li>
					<li style="display:inline-block">
						<h4>身份证号：</h4>
						<span>{$vipid}</span>
					</li>
					<li>
						<h4>手机号码：</h4>
						<span>{$telephone}</span>
					</li>
					<li>
						<h4>联系地址：</h4>
						<span>{$address1}</span>
					</li>
					<li>
						<h4>邮　　编：</h4>
						<span>{$postal}</span>
					</li>
					<li>
						<h4>性　　别：</h4>
						<span>
						<if condition="$sex eq  'M'">男</if> 　　
						<if condition="$sex eq  'F'">女</if> 
						</span>
					</li>
					
					<li>
						<h4>出生日期：</h4>
						<span>
							{$birthdayyyyy}-{$birthdaymm}-{$birthdaydd}
						</span>
					</li>
					<li>
						<h4>Email&nbsp;&nbsp;　：</h4>
						<span>{$vipemail}</span>
					</li>
					
					<li>
						<h4>从事行业：</h4>
						<span>{$industrycode}</span>
					</li>
					<li>
						<h4>工作收入：</h4>
						<span>
							{$incomecode}
							<span style="font-size:12px">月/RMB</span>
						</span>
					</li>
				</ul>
				<button type="button" onclick="upcenter()" class="psn-chn" style="display:inline-block;margin-left: 109px;" value=" 确认修改" >修改</button>	
				</form>
				</div>
				<script type="text/javascript">
					function upcenter()
					{
						location.href = "__URL__/center/upkey/1";//location.href实现客户端页面的跳转  
					}
				</script>
				
				</if>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>

		<include file="foot"/>	