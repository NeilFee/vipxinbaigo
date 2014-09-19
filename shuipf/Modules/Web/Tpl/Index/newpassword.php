<include file="Public:top"/>
<script type="text/javascript">
			function doforgetpsw()
			{
			   var  newpassword=$("#newpassword").val();
			    $.post("__URL__/newpassword",{newpassword:newpassword},function(data){
			    	if (data.state === 'success') 
			    	{
			    		location.href ="__ROOT__/" ;
			        }else
			        {
			        	$("#tip").html(data.info);
			        }
			        },'json'
			
			     );
			}
</script>
		<div class="bread-box">
			<span class="bread-pieces">
				<a href="__ROOT__/">首页</a><span class="clr-ccc"> > </span><a href="">修改密码</a>
			</span>
		</div>
		<div class="forget-psw-ct">
			<h1 class="forget-psw-title">请设置您的新密码</h1>
			<div class="pop-ct">
				<form class="pop-forget-l" style="padding:20px 0 0 20px" action="">
					<div class="forget-psw-box" style="margin-bottom: 10px">
						<i class="forget-vip-psw"></i>
						<input type="password" id="newpassword"  placeholder="请输入您的新密码" />
					 <span id="tip"></span>
					</div>
					<div class="forget-psw-box">
						<i class="forget-vip-psw"></i>
						<input type="password" id="newpassword"  placeholder="请再次输入您的新密码" />
					 <span id="tip"></span>
					</div>
					
					<input type="button" class="forget-psw-sub" value="确 定" onclick="doforgetpsw()"/>
					<div class="forget-psw-ntc">温馨提示：登录后可在会员中心的“修改密码”设定您的登录密码，密码设置后将不再需要手机验证.</div>
				</form>
			</div>
		</div>
	</div>
	<div class="bd-b"></div>
</div>

<include file="Public:foot"/>

