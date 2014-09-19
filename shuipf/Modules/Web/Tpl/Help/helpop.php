<include file="Public:top"/>
			<div class="bread-box">
				<span class="bread-pieces">
					<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="">合作机会</a>
				</span>
				<a class="detail-back" href="{:U('Newday/index')}"><< 返回会员活动</a>
			</div>
		<div class="help-pb clearfix">
			<ul class="help-l-nav">
				<li><a href="{:U('Help/about')}">关于新世界百货</a></li>
				<li><a  href="{:U('Help/contact')}">联系我们</a></li>
				<li><a  class="cur"  href="{:U('Help/helpop')}">合作机会</a></li>
				<li><a  href="{:U('Help/problem')}">帮助中心</a></li>
				<li><a  href="{:U('Help/map')}">网站地图</a></li>
			</ul>
			<div class="help-r-ct">
				<div class="help-ct-top">
					<h1 style="line-height:45px">合作机会</h1>
					<span class="q-need-help" style="line-height:1.5">我们正在积极寻求与社会各行各业的合作与共赢，衷心希望与更多的合作伙伴携手共进。<br>我们重视通过有效的合作帮助双方获得有价值的资源，从而实现双赢。</span>
				</div>
				<div class="help-ct-main contact-us-ct" style="background: none;">
					<h2 style="font-size:18px">提交合作意向</h2>
					<form class="contact-us-fm" action="{:U('Help/helpop')}" method="post">
					<div class="contact-us-each">
						<label for="">公司名称：</label>
						<input name="title" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">联系人：</label>
						<input name="contacts" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">职位名称：</label>
						<input name="zhiwei" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">电话：</label>
						<input name="phone" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">邮箱：</label>
						<input name="mail" class="contact-us-inpt" type="text">
					</div>
					<div class="contact-us-each">
						<label for="">合作门店：</label>
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
						<label style="vertical-align: top;margin-top: 5px;display: inline-block;" for="">合作计划：</label>
						<textarea name="content" id="" cols="30" rows="10"></textarea>
						<span style="font-size:12px;display:inline-block;vertical-align: bottom;margin-bottom: 10px;"><strong style="color:#ff7300">1000</strong> 字</span>
					</div>
					
					<button class="sub-fk">提交</button>
					</form>
				</div>
			</div>
		</div>
		</div>
			<div class="bd-b"></div>
		</div>
	<include file="Public:foot"/>