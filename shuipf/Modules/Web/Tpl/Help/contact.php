<include file="Public:top"/>

			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="">联系我们</a>
				</span>
				<a class="detail-back" href="{:U('Newday/index')}"><< 返回会员活动</a>
			</div>
		<div class="help-pb clearfix">
			<ul class="help-l-nav">
				<li><a href="{:U('Help/about')}">关于新世界百货</a></li>
				<li><a  class="cur" href="{:U('Help/contact')}">联系我们</a></li>
				<li><a href="{:U('Help/helpop')}">合作机会</a></li>
				<li><a href="{:U('Help/problem')}">帮助中心</a></li>
				
				<li><a  href="{:U('Help/map')}">网站地图</a></li>
			</ul>
			<div class="help-r-ct">
				<div class="help-ct-top">
					<h1 style="line-height:60px">联系我们</h1>
					<span class="q-need-help">如果您希望了解更多信息，或有好的建议。请在下边表格中留下您的信息，我们将会进一步与您联系。</span>
				</div>
				<div class="help-ct-main contact-us-ct">
					<h2 style="font-size:18px">联系我们</h2>
					<form class="contact-us-fm J_ajaxForm" action="{:U('Help/contact')}" method="post" id="myform">
					<div class="contact-us-each">
						<label for="">反馈类别：</label>
						<select name="title" id="">
							<volist name="fankuitypelist" id="vo">
							<option value="{$vo.name}">{$vo.name}</option>
							</volist>
						</select>
					</div>
					<div class="contact-us-each">
						<label for="">反馈门店：</label>
						<select name="store" id="">						
						<option>请选择</option>
						<option value="新世界百货管理中心">新世界百货管理中心</option>
						<volist name="storelist" id="vo">
							<option value="{$vo.name}">{$vo.name}</option>
							</volist>
							<option value="其他">其他</option>
						</select>
					</div>
					<div class="contact-us-each">
						<label style="vertical-align: top;margin-top: 5px;display: inline-block;" for="">反馈内容：</label>
						<textarea name="content" id="" cols="30" rows="10"></textarea>
						<span style="font-size:12px;display:inline-block;vertical-align: bottom;margin-bottom: 10px;"><strong style="color:#ff7300">1000</strong> 字</span>
					</div>
					<div class="contact-us-each">
						<label for="">联系人姓名：</label>
						<input name="contacts" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">联系人手机：</label>
						<input class="contact-us-inpt" name="phone" type="text">
					</div>
					<button class="sub-fk J_ajax_submit_btn" type="submit">提交反馈</button>
					</form>

				</div>
			</div>
		</div>
		</div>
			<div class="bd-b"></div>
		</div>
<include file="Public:foot"/>