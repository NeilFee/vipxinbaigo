<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>新世界－手机版-会员积分查询</title>	
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/phone.css">
	<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="bd-l"></div>
	<div class="bd-r"></div>
		<div class="top">
			<div class="top-l">
				<div class="logo">
					<a href=""><img src="{$config_siteurl}statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="{$config_siteurl}statics/web/img/vip-ct.png" alt="">
				</div>
			</div>
			<div class="top-r">			
				会员积分查询
			</div>
			<div class="bd-tp-b"></div>
		</div>
		<div class="phone-ct-main">
		<form action="__URL__/index" method="post" name="myform">
			<div class="phone-vip-nmb"><i class="phone-vip-nmb-i"></i><input class="vip-nmb-ipt" id="vipcode" name="vipcode" type="text" placeholder="请输入会员卡号"></div>
			<div class="phone-vip-psw"><i class="phone-vip-psw-i"></i><input class="vip-psw-ipt" id="password" name="password" type="password" placeholder="请输入会员密码">
				<span class="uncorrect-tip" id="uncorrect-tip"></span>
			</div>
			<button class="phone-sub-btn" id="send-code-btn" type="button" onclick="scd()">确认并发送验证码至手机</button>
		
			<div class="phone-vip-code">
				<i class="phone-vip-code-i"></i>
				<input class="vip-code-ipt" id="message" type="text" placeholder="请输入验证码">
				<button class="phone-code-sub-btn" onclick="logikey()" type="button">确认</button>
			</div>

		</form>
			<div class="member-info" style="margin:60px 0 0 45px">
				
				<div class="bd-sec-b"></div>
			</div>
			<div class="warm-notice" style="margin:115px 0 0 45px">
				<p class="warm-notice-tt">温馨提示：</p>
				<p>1. 初始密码为本人身份证后6位，若忘记密码请<br>　至网页版会员网站进行修改。</p>
				<p>2. 验证码将发送至与会员卡绑定的手机上，若<br>　要更改绑定的手机号请至新世界门店服务台。</p>
			</div>
			</div>
			<div class="blk-200"></div>
			<div class="bd-b"></div>
		</div>
		<div class="blk-100"></div>
		
		<script type="text/javascript"> 
		function logikey()
		{
			  var  vipcode=$("#vipcode").val();
			  var  message=$("#message").val();
			  
			  $.post("__URL__/wapmember",{message:message,vipcode:vipcode},function(data){
			    	if (data.state === 'success') 
			    	{
			    		location.href ="__URL__/wapmember" ;
			        }else
			        {
			        	$("#uncorrect-tip").html(data.info);
			        }
			        },'json'
			  );
			   
		}
		function logininfo()
		{
			   var  vipcode=$("#vipcode").val();
			   var  password=$("#password").val();

			   $.post("__URL__/index",{password:password,vipcode:vipcode},function(data){
			    	if (data.state === 'success') 
			    	{
			    		$("#phone-sub-btn").attr({"disabled":"disabled"});
			    		$("#phone-sub-btn").removeAttr("onclick");
			    		scd();
			        }else
			        {
			        	$("#uncorrect-tip").html(data.info);
			        }
			        },'json'
			   );
		}

		
		function scd(){
		    var  vipcode=$("#vipcode").val();
			   var  password=$("#password").val();
			   $.post("__URL__/index",{password:password,vipcode:vipcode},function(data){
				    if (data.state === 'success') 
			    	{
			    		$("#phone-sub-btn").attr({"disabled":"disabled"});
			    		 wait = 600;
						 contdw();
			        }else
			        {
			        	$("#uncorrect-tip").html(data.info);
			        }
			        
			        },'json'
			   );
		}
		function contdw (o) {		
			var o = document.getElementById("send-code-btn");

			if (wait == 0) {
				o.removeAttribute("disabled");           
				o.innerHTML="确认并发送验证码至手机";
				o.style.background = "#a48f65";
				wait = 600;
					} else { // www.jbxue.com
						o.setAttribute("disabled", true);
						o.innerHTML= wait + "s后重新发送";
						o.style.background = "#a6a6a6";
						wait--;
						setTimeout(function() {
							contdw(o);
						},
						1000)
					}
}
		</script>
</body>
</html>