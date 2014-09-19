<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <form class="J_ajaxForm" action="{:U('Member/upmember')}" method="post" id="myform">
   <input type="hidden" name="vipcode" value="{$vipcode}"  >
   <input type="hidden" name="vipid" value="{$vipid}">
   <input type="hidden" name="birthdayyyyy" value="{$birthdayyyyy}">
   <input type="hidden" name="birthdaymm" value="{$birthdaymm}">
   <input type="hidden" name="birthdaydd" value="{$birthdaydd}">
    <input type="hidden" name="incomecode" value="{$incomecode}">
   <input type="hidden" name="industrycode" value="{$industrycode}">
   <input type="hidden" name="emailcontact" value="{$emailcontact}">
    <input type="hidden" name="lastmodify_yyyymmdd" value="{$lastmodify_yyyymmdd}">
   <input type="hidden" name="lastmodify_hhmmss" value="{$lastmodify_hhmmss}">
   <input type="hidden" name="educationcode" value="{$educationcode}">
   <input type="hidden" name="givenname" value="{$givenname}">
    <input type="hidden" name="telephone2" value="{$telephone2}">
   <input type="hidden" name="sex" value="{$sex}">
   <input type="hidden" name="postal" value="{$postal}">
     <input type="hidden" name="password" value="{$password}">
    <input type="hidden" name="ismainvip" value="{$ismainvip}">
   <input type="hidden" name="vipcardtype" value="{$vipcardtype}">
   <input type="hidden" name="modifybystaffcode" value="{$modifybystaffcode}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">姓名</th>
            <td><input type="test" name="surname" value="{$surname}" class="input" id="username">
              </td>
          </tr>
          
          <tr>
            <th width="100">会员卡等级</th>
            <td>{$vipgrade}
              </td>
          </tr>
          
          <tr>
            <th width="100">会员卡号</th>
            <td>{$vipcode}
              </td>
          </tr>
		  
		  <tr>
            <th width="100">身份证号码</th>
            <td>{$vipid}
              </td>
          </tr>
		  
          
          <tr>
            <th width="100">会员积分</th>
            <td>{$currentbonus}
              </td>
          </tr>
          
          <tr>
            <th width="100">联系电话</th>
            <td><input type="test" name="telephone" value="{$telephone}" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">联系邮箱</th>
            <td><input type="test" name="vipemail" value="{$vipemail}" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">现居住地</th>
            <td><input type="test" name="address1" value="{$address1}{$address2}{$address3}{$address4}" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">开卡门店</th>
            <td>
            
            <volist name="storelist" id="s">
             <if condition="$issuestorecode eq $s['vipstorecode']">{$s.description}<--->{$s.remarks}</if>
            </volist>
           
              </td>
          </tr>
          
           <tr>
            <th width="100">密码</th>
            <td>
             ({$password})<font style="color: red"> 为空未设置 默认身份证后六位</font>
             </td>
          </tr>
          
           <tr>
            <th width="100">重置登陆密码</th>
            <td>
            <label><input name="Fruit" type="radio" value="1" />是 </label> 
			<label><input name="Fruit" type="radio" value="0" checked="checked" />否 </label> 
			
              </td>
          </tr>
          
        </tbody>
      </table>
   </div>
   <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
      </div>
    </div>
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>