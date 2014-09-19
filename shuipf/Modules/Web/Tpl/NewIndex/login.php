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
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/admin_style.css" />
	
	<script src="{$config_siteurl}statics/js/wind.js"></script>
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
	<style>
		.pop-ct{position: relative;padding: 0 0 0 20px;font-family: '微软雅黑'，tahoma,arial,'Hiragino Sans GB',sans-serif;}
		.pop-login-l{display: inline-block;}
		.pop-ct .log-psw-box{position: relative;}
		.pop-ct i.log-vip-num{position: absolute;left: 15px;top: 11px;display: inline-block;background: url('__ROOT__/statics/web/img/vip-i20.png') no-repeat 0 -90px;width: 15px;height: 16px;}
		.pop-ct i.log-psw{position: absolute;left: 15px;top: 11px;display: inline-block;background: url('__ROOT__/statics/web/img/vip-i20.png') no-repeat 0 -30px;width: 15px;height: 16px;}
		.pop-ct input[type="text"]{width: 267px;height: 34px;line-height: 34px\0;margin: 0 0 20px 0;padding: 0 0 0 45px;border:1px solid #ccc;font-size: 12px;-ms-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-webkit-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-moz-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);}
		.pop-ct input[type="password"]{width: 267px;height: 34px;line-height: 34px\0;margin: 0 0 5px 0;padding: 0 0 0 45px;border:1px solid #ccc;font-size: 12px;-ms-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-webkit-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-moz-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);}
		.pop-ct button.log-psw-sub{width: 300px;height: 34px;line-height: 34px;text-align: center;background: #95774c;color: #fff;font-style: 14px;font-weight: bold;border: none;cursor: pointer;margin: 8px 0 6px 0;}
		.pop-ct .log-psw-r{display: inline-block;width: 270px;height: 60px;margin: 0 0 20px 0;padding: 0 0 0 10px;float: left;}
		.pop-ct .log-psw-note{width: 270px;height: 36px;line-height: 36px;margin: 0 0 20px 0;color: #999;font-size: 12px;}
		.psw-ntc{width: 315px;height: 20px;line-height: 20px;}
		.psw-ntc-l{float: left;height: 25px;line-height: 25px;font-size: 12px;color: #999;}
		.psw-forget{float: right;height: 25px;line-height: 25px;font-size: 12px;color: #95774c;text-decoration: underline;}
		.remember-me{display: block;font-size: 12px;color: #95774c;height: 25px;line-height: 25px;vertical-align: middle;}
		.remember-me input{height: 25px;line-height: 25px;vertical-align: middle;margin-bottom: 5px;}
		.pop-login-r{display: inline-block;width: 220px;text-align: left;vertical-align: top;}
		.pop-login-r h3{color: #9bb343;font-weight: bold;font-size: 14px;margin: 0;line-height: 1.5;}
		.pop-login-r h4{color: #999;font-size: 12px;font-weight: normal;margin: 0;line-height: 1.5;}
		.qrcode-target {position: absolute;width: 46px;height: 46px;display: block;top: 0;right: 0;background-image: url('{$config_siteurl}statics/web/img/qr-icon.png');background-position: -95px 0;background-repeat: no-repeat;cursor: pointer;z-index: 101;-webkit-transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);-moz-transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);}
		.qrcode-target.qrcode-target-show {background-position: 0 0;}
		.pop-login-r .ft-img{background: url('__ROOT__/statics/web/img/login-right-img.png') 0 0 no-repeat;width: 200px;height: 145px;margin: 20px 0 0 20px;}
		.pop-login-r .back-img{background: url('{$config_siteurl}statics/web/img/login-back.png') 0 0 no-repeat;width: 220px;height: 220px;}
		.pop-login-r .pop-login-r-wd{font-size: 12px;color: #999;padding-left: 35px;}
		.pop-login-r .pop-login-r-wd h5{font-size: 14px;color: #95774c;display: inline-block;margin: 0;}
		.pop-login-r .pop-login-r-wd a{font-size: 12px;color: #08c;display: inline-block;text-decoration: none;}
	</style>
</head>
<body>
    <div class="pop-ct" style="padding: 10px 0 0 20px;">
      <form class="pop-login-l " action="" method="post" id="myform">
			<div class="log-psw-box">
				<i class="log-vip-num"></i>
				<input type="text" name="vipcode" id="vipcode" placeholder="请输入您的会员卡号"/>
			</div>
			<div class="log-psw-box">
				<i class="log-psw"></i>
				<input type="password" name="password" id="password" placeholder="请输入您的密码"/>
			</div>
			<div class="psw-ntc">
			<a class="psw-ntc-l">
			温馨提示：已设置密码的用户以旧版网站密码为准；<br>
			未设置密码的用户，密码默认为身份证后6位
			</a>
			<a class="psw-forget" target="_blank"  href="__APP__/Index/forgetpsw">忘记密码</a>
			</div>
			  <button style="width:315px"  class="log-psw-sub  mr10 " type="button" onclick="logininfo();">登录</button>
			<label class="remember-me" for="remb"><input type="checkbox" id="remb" /> 记住我，方便下次登录</label>
		   <span class="tips_error" id="tips_error"></span>
		</form>
     	<div class="pop-login-r">
     		<div class="ft-img"></div>
     		<div class="pop-login-r-wd"><h5>还不是会员？</h5> <a target="_blank" href="__APP__/About/bevip">查看如何成为会员</a></div>
     		<div class="pop-login-r-wd">忘记卡号请联系 <a target="_blank" href="__APP__/About/index">开卡门店</a></div>
     	</div>
 	 </div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
	function logininfo()
	{
		   var  vipcode=$("#vipcode").val();
		   var  password=$("#password").val();

		   $.post("__URL__/login",{password:password,vipcode:vipcode},function(data){
		    	if (data.state === 'success') 
		    	{
			    	if(data.info == 1)
			    	{
			    		 parent.location.reload();
					}else
					{
					  location.href = "__URL__/message/telephone/"+data.info.telephone+"/vipcode/"+data.info.vipcode+"/stoser/"+data.info.stoser; 
					}
		        }else
		        {
		        	$("#tips_error").html(data.info);
		        }
		        },'json'
		
		   );
		     
	}

</script>
</body>
</html>