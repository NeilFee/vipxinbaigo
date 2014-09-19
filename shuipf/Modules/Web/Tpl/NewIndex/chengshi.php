<!Doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/slider.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/layer.css">

	
<script src="{$config_siteurl}statics/web/js/jquery.js"></script>
<script src="{$config_siteurl}statics/web/js/jquery.cookie.js"></script>

<script type="text/javascript">
	function city(id)
	{
		  var COOKIE_NAME = 'chengshi_id';    
		     //设置cookie，通过时间间隔    
		  $.cookie(COOKIE_NAME, id, { path: '/', expires: 1 });    
		  parent.location.reload();
	}
</script>
	<style>
		.pop-ct{position: relative;padding: 0 0 0 20px;font-family: '微软雅黑'，tahoma,arial,'Hiragino Sans GB',sans-serif;}
		.pop-loc-ct{position: relative;padding: 0;}
		.forget-top-nt{position: absolute;top: 20px;left: 95px;font-size: 12px;color: #f00;line-height: 1.5;}
		.pop-forget-l{display: inline-block;padding-top: 70px;}
		.pop-ct .forget-psw-box{position: relative;}
		.pop-ct i.forget-vip-num{position: absolute;left: 15px;top: 11px;display: inline-block;background: url('{$config_siteurl}statics/web/img/vip-i20.png') no-repeat 0 -90px;width: 15px;height: 16px;}
		.pop-ct i.forget-psw{position: absolute;left: 15px;top: 6px;display: inline-block;background: url('{$config_siteurl}statics/web/img/vip-i20.png') no-repeat 0 -150px;width: 16px;height: 25px;}
		.pop-ct input[type="text"]{width: 267px;height: 34px;margin: 0 0 20px 0;padding: 0 0 0 45px;border:1px solid #ccc;font-size: 12px;-ms-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-webkit-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-moz-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);}
		.send-code{width: 105px;height: 33px;background: #666;border: none;color: #fff;font-size: 14px;cursor: pointer;}
		.resend-code{width: 105px;height: 33px;background: #a6a6a6;border: none;color: #fff;font-size: 14px;cursor: pointer;}
		.pop-ct input[type="password"]{width: 267px;height: 34px;margin: 0 0 5px 0;padding: 0 0 0 45px;border:1px solid #ccc;font-size: 12px;-ms-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-webkit-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);-moz-box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);box-shadow:inset 1px 1px 3px 1px rgba(0,0,0,.1);}
		.pop-ct input.forget-psw-sub{width: 312px;height: 34px;line-height: 34px;margin: 0 0 20px 0;text-align: center;background: #95774c;color: #fff;font-style: 14px;font-weight: bold;border: none;cursor: pointer;margin: 10px 0 10px 0;}
		.pop-ct .forget-psw-r{display: inline-block;width: 270px;height: 60px;margin: 0 0 20px 0;padding: 0 0 0 10px;float: left;}
		.pop-ct .forget-psw-note{width: 270px;height: 36px;line-height: 36px;margin: 0 0 20px 0;color: #999;font-size: 12px;}
		.forget-psw-ntc{width: 315px;height: 25px;line-height: 25px;font-size: 12px;color: #95774b;line-height: 1.5;}
		.psw-ntc-l{float: left;height: 25px;line-height: 25px;font-size: 12px;color: #999;}
		.psw-forget{float: right;height: 25px;line-height: 25px;font-size: 12px;color: #95774c;text-decoration: underline;}
		.remember-me{display: block;font-size: 12px;color: #95774c;height: 25px;line-height: 25px;vertical-align: middle;}
		.remember-me input{height: 25px;line-height: 25px;vertical-align: middle;margin-bottom: 5px;}
		.pop-login-r{display: inline-block;width: 220px;text-align: center;}
		.pop-login-r h3{color: #9bb343;font-weight: bold;font-size: 14px;margin: 0;line-height: 1.5;}
		.pop-login-r h4{color: #999;font-size: 12px;font-weight: normal;margin: 0;line-height: 1.5;}
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
-webkit-transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);
-moz-transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);
transition: background-position .2s cubic-bezier(0.25,.5,.5,.9);
}
.qrcode-target.qrcode-target-show {
background-position: 0 0;
}
.pop-login-r .ft-img{
	background: url('/statics/web/img/login-ft.png') 0 0 no-repeat;
	width: 220px;
	height: 220px;
}
.pop-login-r .back-img{
	background: url('/statics/web/img/login-back.png') 0 0 no-repeat;
	width: 220px;
	height: 220px;
}
.top-loc{padding-left: 35px;height: 45px;line-height: 45px;border-bottom: 1px dotted #d5ccbc;}
.city-loc{display: inline-block;background: url('/statics/web/img/icon-loc.png') 0 0 no-repeat;width: 13px;height: 20px;margin-right: 15px;vertical-align: middle;margin-bottom: 3px;}
.now-loc{font-size: 14px;color: #a48f65;margin-right: 5px;}
.follow-loc{font-size: 12px;color: #999;text-decoration: none;}
.city-ct{background: #f8f6f2;border: 2px solid #fff;height: 180px;width: 521px;padding: 25px 30px;}
.city-ct a.b-city{font-size: 14px;color: #333;text-decoration: none;margin-right: 19px;}
.city-ct a.cur{color: #a48f65;}
.city-ct a:hover{color: #a48f65;}
.main-city{height: 35px;line-height: 35px;width: 460px;}
.vice-city{line-height: 35px;width: 490px;padding: 10px 0 0 0;margin: 0 auto;}
.vice-city a{font-size: 12px;color: #333;text-decoration: none;margin-right: 25px;display: inline-block;width: 50px;}
</style>
</head>
<body>

    <div class="pop-loc-ct">
    <if condition="$chengshikey eq 1">
	     <div class="top-loc">
	     	<i class="city-loc"></i>
	     	<span class="now-loc">{$dingcountry}</span>
	     	<a class="follow-loc" href="">［根据您的ip定位]</a>
	     </div>
     </if>
     
     
     <div class="city-ct">
     	<div class="vice-city">
     	    <volist name="citylist" id="vo">
	     		<a href="" onclick="city({$vo.id})">{$vo.name}</a>
	     	</volist>
     	</div>
     </div>
     
     
 	 </div>
</body>



</html>