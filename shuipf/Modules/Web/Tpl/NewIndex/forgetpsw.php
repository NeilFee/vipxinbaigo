<include file="Public:top"/>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/admin_style.css" />
	
<script type="text/javascript"> 
	function messagkey(){
		 var  vipcode=$("#vipcode").val();
		 var messagekey="OK";
		    $.post("__URL__/forgetpsw",{vipcode:vipcode,messagekey:messagekey},function(data){
		    	if (data.state === 'success') 
		    	{
		    		$('#tip').html('');
		    		$("#tips").html(data.info);
		    		wait = 60;
		    		contdw();
		    		

		        }else
		        {
				    
		        	$("#tip").html(data.info);
		        	
		        	return false;
		        }
		        },'json'
		);
}
function contdw (o) {	
	var o = document.getElementById("send-code-btn");
	
		if (wait == 0) {
		            o.removeAttribute("disabled");           
		            o.value="发送验证码";
		            o.style.background = "#666";
		            wait = 60;
		        } else { // www.jbxue.com
		            o.setAttribute("disabled", true);
		            o.value= wait + "秒后重发";
		            o.style.background = "#a6a6a6";
		            wait--;
		            setTimeout(function() {
		                contdw(o);
		            },
		            1000)
		        }		
}
		
		


</script>
<script type="text/javascript">
			function doforgetpsw()
			{
			   var  messagecode=$("#messagecode").val();
			   var  vipcode=$("#vipcode").val();
			    $.post("__URL__/doforgetpsw",{messagecode:messagecode,vipcode:vipcode},function(data){
			    	if (data.state === 'success') 
			    	{
			    		location.href ="__URL__/newpassword" ;
			        }else
			        {
					    $("#tips").html('');
			        	$("#tip").html(data.info);
			        }
			
			        },'json'
			
			     );
			}
</script>
		<div class="bread-box">
			<span class="bread-pieces">
				<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span>忘记密码
			</span>
		</div>
		<div class="forget-psw-ct">
			<h1 class="forget-psw-title">忘记密码</h1>
			<div class="pop-ct">
				<img style="position: absolute;top: 0;left: 40px;" src="{$config_siteurl}statics/web/img/forget-psw-i.png" alt="">
				<span class="forget-top-nt">
					请输入您的会员卡号，
					<br/>
					我们将给您会员卡绑定的手机上发送验证码!
				</span>
				<form class="pop-forget-l" action="">
					<div class="forget-psw-box">
						<i class="forget-vip-num"></i>
						<input type="text" id="vipcode"  placeholder="请输入您的会员卡号" />
						<input type="button" onclick="messagkey()" style="background:#666;font-size:12px" class="send-code" id="send-code-btn" value="发送验证码" />					
					 <span class="tips_error" id="tip"></span>
					 <span class="tips_success" id="tips"></span>
					</div>
					<div class="forget-psw-box">
						<i class="forget-psw"></i>
						<input type="text" id="messagecode"  placeholder="请输入您手机收到的验证码" />
						
						<span class="forget-psw-help">
						</span>
					</div>
					<input type="button" class="forget-psw-sub" value="确 定" onclick="doforgetpsw()"/>
					<div class="forget-psw-ntc">温馨提示：登录后可在会员中心的“密码管理”设定您的登录密码，密码设置后将不再需要手机验证.</div>
				</form>
			</div>
		</div>
	</div>
	<div class="bd-b"></div>
</div>
<script type="text/javascript">
   function getpassword()
   {
     alert("123");
   }
</script>
<include file="Public:foot"/>

