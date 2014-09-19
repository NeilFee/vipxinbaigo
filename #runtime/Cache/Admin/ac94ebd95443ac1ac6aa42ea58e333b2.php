<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo ($Config["sitename"]); ?></title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
    JS_ROOT: "statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <form class="J_ajaxForm" action="<?php echo U('Member/upmember');?>" method="post" id="myform">
   <input type="hidden" name="vipcode" value="<?php echo ($vipcode); ?>"  >
   <input type="hidden" name="vipid" value="<?php echo ($vipid); ?>">
   <input type="hidden" name="birthdayyyyy" value="<?php echo ($birthdayyyyy); ?>">
   <input type="hidden" name="birthdaymm" value="<?php echo ($birthdaymm); ?>">
   <input type="hidden" name="birthdaydd" value="<?php echo ($birthdaydd); ?>">
    <input type="hidden" name="incomecode" value="<?php echo ($incomecode); ?>">
   <input type="hidden" name="industrycode" value="<?php echo ($industrycode); ?>">
   <input type="hidden" name="emailcontact" value="<?php echo ($emailcontact); ?>">
    <input type="hidden" name="lastmodify_yyyymmdd" value="<?php echo ($lastmodify_yyyymmdd); ?>">
   <input type="hidden" name="lastmodify_hhmmss" value="<?php echo ($lastmodify_hhmmss); ?>">
   <input type="hidden" name="educationcode" value="<?php echo ($educationcode); ?>">
   <input type="hidden" name="givenname" value="<?php echo ($givenname); ?>">
    <input type="hidden" name="telephone2" value="<?php echo ($telephone2); ?>">
   <input type="hidden" name="sex" value="<?php echo ($sex); ?>">
   <input type="hidden" name="postal" value="<?php echo ($postal); ?>">
     <input type="hidden" name="password" value="<?php echo ($password); ?>">
    <input type="hidden" name="ismainvip" value="<?php echo ($ismainvip); ?>">
   <input type="hidden" name="vipcardtype" value="<?php echo ($vipcardtype); ?>">
   <input type="hidden" name="modifybystaffcode" value="<?php echo ($modifybystaffcode); ?>">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">姓名</th>
            <td><input type="test" name="surname" value="<?php echo ($surname); ?>" class="input" id="username">
              </td>
          </tr>
          
          <tr>
            <th width="100">会员卡等级</th>
            <td><?php echo ($vipgrade); ?>
              </td>
          </tr>
          
          <tr>
            <th width="100">会员卡号</th>
            <td><?php echo ($vipcode); ?>
              </td>
          </tr>
		  
		  <tr>
            <th width="100">身份证号码</th>
            <td><?php echo ($vipid); ?>
              </td>
          </tr>
		  
          
          <tr>
            <th width="100">会员积分</th>
            <td><?php echo ($currentbonus); ?>
              </td>
          </tr>
          
          <tr>
            <th width="100">联系电话</th>
            <td><input type="test" name="telephone" value="<?php echo ($telephone); ?>" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">联系邮箱</th>
            <td><input type="test" name="vipemail" value="<?php echo ($vipemail); ?>" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">现居住地</th>
            <td><input type="test" name="address1" value="<?php echo ($address1); echo ($address2); echo ($address3); echo ($address4); ?>" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">开卡门店</th>
            <td>
            
            <?php if(is_array($storelist)): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i; if($issuestorecode == $s['vipstorecode']): echo ($s["description"]); ?><---><?php echo ($s["remarks"]); endif; endforeach; endif; else: echo "" ;endif; ?>
           
              </td>
          </tr>
          
           <tr>
            <th width="100">密码</th>
            <td>
             (<?php echo ($password); ?>)<font style="color: red"> 为空未设置 默认身份证后六位</font>
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
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>

</body>
</html>