<!Doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/"
};
</script>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/slider.css" />
<link rel="stylesheet" href="{$config_siteurl}statics/web/css/layer.css">
<link rel="stylesheet" type="text/css"
	href="{$config_siteurl}statics/web/css/admin_style.css" />
<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
<script src="{$config_siteurl}statics/web/js/layer.min.js"></script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<style>
.pop-ct {
	position: relative;
	padding: 0 0 0 20px;
}
.forget-top-nt {
	position: absolute;
	top: 20px;
	left: 95px;
	font-size: 12px;
	color: #f00;
	line-height: 1.5;
}
.pop-forget-l {
	display: inline-block;
	padding-top: 70px;
}
.pop-ct .forget-psw-box {
	position: relative;
}
.pop-ct i.forget-vip-num {
	position: absolute;
	left: 15px;
	top: 11px;
	display: inline-block;
	background: url('{$config_siteurl}statics/web/img/vip-i20.png') no-repeat 0 -90px;
	width: 15px;
	height: 16px;
}
.pop-ct i.forget-psw {
	position: absolute;
	left: 15px;
	top: 6px;
	display: inline-block;
	background: url('{$config_siteurl}statics/web/img/vip-i20.png') no-repeat 0 -150px;
	width: 16px;
	height: 25px;
}
.pop-ct i.check-code {
	position: absolute;
	left: 15px;
	top: 11px;
	display: inline-block;
	background: url('{$config_siteurl}statics/web/img/vip-i20.png') no-repeat 0 -190px;
	width: 25px;
	height: 25px;
	z-index:1000;
}
.pop-ct input[type="text"] {
	width: 267px;
	height: 34px;
	margin: 0 0 20px 0;
	padding: 0 0 0 45px;
	border: 1px solid #ccc;
	font-size: 12px;
	-ms-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	-webkit-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
}
.send-code {
	width: 105px;
	height: 33px;
	background: #a6a6a6;
	border: none;
	color: #fff;
	font-size: 14px;
	cursor: pointer;
}

.resend-code {
	width: 105px;
	height: 33px;
	background: #a6a6a6;
	border: none;
	color: #fff;
	font-size: 14px;
	cursor: pointer;
}

.pop-ct input[type="password"] {
	width: 267px;
	height: 34px;
	margin: 0 0 5px 0;
	padding: 0 0 0 45px;
	border: 1px solid #ccc;
	font-size: 12px;
	-ms-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	-webkit-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
	box-shadow: inset 1px 1px 3px 1px rgba(0, 0, 0, .1);
}
.pop-ct button.forget-psw-sub {
	width: 312px;
	height: 34px;
	line-height: 34px;
	margin: 0 0 20px 0;
	text-align: center;
	background: #95774c;
	color: #fff;
	font-style: 14px;
	font-weight: bold;
	border: none;
	cursor: pointer;
	margin: 10px 0 10px 0;
}
.pop-ct .forget-psw-r {
	display: inline-block;
	width: 270px;
	height: 60px;
	margin: 0 0 20px 0;
	padding: 0 0 0 10px;
	float: left;
}
.pop-ct .forget-psw-note {
	width: 270px;
	height: 36px;
	line-height: 36px;
	margin: 0 0 20px 0;
	color: #999;
	font-size: 12px;
}
.forget-psw-ntc {
	width: 315px;
	height: 25px;
	line-height: 25px;
	font-size: 12px;
	color: #95774b;
	line-height: 1.5;
}

.psw-ntc-l {
	float: left;
	height: 25px;
	line-height: 25px;
	font-size: 12px;
	color: #999;
}

.psw-forget {
	float: right;
	height: 25px;
	line-height: 25px;
	font-size: 12px;
	color: #95774c;
	text-decoration: underline;
}

.remember-me {
	display: block;
	font-size: 12px;
	color: #95774c;
	height: 25px;
	line-height: 25px;
	vertical-align: middle;
}

.remember-me input {
	height: 25px;
	line-height: 25px;
	vertical-align: middle;
	margin-bottom: 5px;
}

.pop-login-r {
	display: inline-block;
	width: 220px;
	text-align: center;
}

.pop-login-r h3 {
	color: #9bb343;
	font-weight: bold;
	font-size: 14px;
	margin: 0;
	line-height: 1.5;
}

.pop-login-r h4 {
	color: #999;
	font-size: 12px;
	font-weight: normal;
	margin: 0;
	line-height: 1.5;
}

.qrcode-target {
	position: absolute;
	width: 46px;
	height: 46px;
	display: block;
	top: 0;
	right: 0;
	background-image: url('{$config_siteurl}statics/web/img/qr-icon.png');
	background-position: -95px 0;
	background-repeat: no-repeat;
	cursor: pointer;
	z-index: 101;
	-webkit-transition: background-position .2s
		cubic-bezier(0.25, .5, .5, .9);
	-moz-transition: background-position .2s cubic-bezier(0.25, .5, .5, .9);
	transition: background-position .2s cubic-bezier(0.25, .5, .5, .9);
}

.qrcode-target.qrcode-target-show {
	background-position: 0 0;
}

.pop-login-r .ft-img {
	background: url('{$config_siteurl}statics/web/img/login-ft.png') 0 0 no-repeat;
	width: 220px;
	height: 220px;
}

.pop-login-r .back-img {
	background: url('{$config_siteurl}statics/web/img/login-back.png') 0 0 no-repeat;
	width: 220px;
	height: 220px;
}
</style>

</head>

<body>

	<div class="pop-ct" style="margin-top: 85px">
		<img style="position: absolute; top: -70px;" src="{$config_siteurl}statics/web/img/forget-psw-i.png"
			alt=""> <span class="forget-top-nt" style="top:-50px"> 为保障您的帐户安全， <br />
			我们将给您会员卡绑定的手机上发送验证码! <br />
		</span>
			
			<input type="hidden" name="vipcode" id="vipcode" value="{$vipcode}">
			<div class="forget-psw-box">
				<i class="check-code"></i> <input type="text"
					placeholder="请输入您收到的验证码" name="message" id="message" value=""/> 
					
					<input type="button" class="send-code"
					id="send-code-btn" value="60 秒后重发" onClick="location=location"/>
			</div>
			 <button class="forget-psw-sub" onClick="message()" type="button">验证</button>
			 <div id="tip"></div>
			<div class="forget-psw-ntc">温馨提示：登录后可在会员中心的“密码管理”设定您的登录密码，密码设置后将不再需要手机验证</div>
			</div>
			<script type="text/javascript">
			function message()
			{
			   var  message=$("#message").val();
			   var  vipcode=$("#vipcode").val();
			    $.post("__URL__/message",{message:message,vipcode:vipcode},function(data){
			    	if (data.state === 'success') 
			    	{
			   		    parent.location.reload();
			        }else
			        {
			        	$("#tip").html(data.info);
			        }
			
			        },'json'
			
			     );
			}
			</script>

	<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript"
	src="{$config_siteurl}statics/js/content_addtop.js"></script>
	
	<script type="text/javascript"> 
$(document).ready(function() {

var count = 60; 
var countdown = setInterval(CountDown, 1000); 

function CountDown() { 
$("#send-code-btn").attr("disabled", true); 
$("#send-code-btn").val( count + " 秒后重发"); 
$("#send-code-btn").css('background', '#a6a6a6'); 
if (count == 0) { 
$("#send-code-btn").val("发送验证码").removeAttr("disabled"); 
$("#send-code-btn").css('background', '#666');
clearInterval(countdown); 
} 
count--; 
} 


 });
</script>

</body>
</html>