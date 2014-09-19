<include file="menu"/>
				<div class="vip-ct-rct">
					<h2>修改密码</h2>
					<div class="ch-psw-ntc">
						<i class="ch-psw-ntc-i"></i>
						<span class="ch-psw-ntc-wds">
							密码设置后请妥善保管，且尽量避免泄露给其他人。出于安全考虑，我们建议您三个月更换一次密码，以保证您的个人账户安全。此外，我们也会通过温馨提示，通知您密码修改，敬请关注。
						</span>
					</div>
					 <form class="ch-psw-l J_ajaxForm" action="{:U('Member/password')} " method="post" id="myform">
						
						
			<input type="hidden" name="vipcode" value="{$member_user.vipcode}">
			
			
			
			
						<div class="ch-psw-box">
							<i class="ch-psw-old"></i>
							<input type="password" name="password" value=""/>
						</div>
						<div class="ch-psw-box">
							<i class="ch-psw-new"></i>
							<input type="password" name="newpassword" value=""/>
						</div>
						<div class="ch-psw-box">
							<i class="ch-psw-renew"></i>
							<input type="password" name="n_newpassword" value=""/>
						</div>
						<button class="ch-psw-sub   J_ajax_submit_btn" type="submit">修改密码</button>
					</form>
					<div class="ch-psw-r">
						<div class="ch-psw-note">请输入原始密码。默认为身份证后6位</div>
						<div class="ch-psw-note">请输入新密码</div>
						<div class="ch-psw-note">请确定新密码</div>
						<div class="ch-psw-note"></div>
					</div>	
				</div>
			</div>
		</div>
			<div class="bd-b"></div>
		</div>
		<include file="foot"/>	