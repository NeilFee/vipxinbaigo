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
  <?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php  $getMenu = AdminbaseAction::getMenu(); if($getMenu) { ?>
<div class="nav">
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $model = $r['model']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$model."/".$action."",$r['data']);?>"><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
  <div class="h_a">邮箱配置</div>
  <div class="table_full">
    <form method='post'   id="myform" class="J_ajaxForm"  action="<?php echo U('Config/mail');?>">
      <table width="100%"  class="table_form">
        <tr>
          <th width="120">邮件发送模式</th>
          <th class="y-bg"><input name="mail_type" checkbox="mail_type" value="1"  type="radio"  checked>
            SMTP 函数发送 </th>
        </tr>
        <tbody id="smtpcfg" style="">
          <tr>
            <th>邮件服务器</th>
            <th class="y-bg"><input type="text" class="input" name="mail_server" id="mail_server" size="30" value="<?php echo ($Site["mail_server"]); ?>"/></th>
          </tr>
          <tr>
            <th>邮件发送端口</th>
            <th class="y-bg"><input type="text" class="input" name="mail_port" id="mail_port" size="30" value="<?php echo ($Site["mail_port"]); ?>"/></th>
          </tr>
          <tr>
            <th>发件人地址</th>
            <th class="y-bg"><input type="text" class="input" name="mail_from" id="mail_from" size="30" value="<?php echo ($Site["mail_from"]); ?>"/></th>
          </tr>
          <tr>
            <th>发件人名称</th>
            <th class="y-bg"><input type="text" class="input" name="mail_fname" id="mail_fname" size="30" value="<?php echo ($Site["mail_fname"]); ?>"/></th>
          </tr>
          <tr>
            <th>AUTH LOGIN验证</th>
            <th class="y-bg"><input name="mail_auth" id="mail_auth" value="1" type="radio"  <?php if( $Site['mail_auth'] == '1' ): ?>checked<?php endif; ?>> 开启 
            <input name="mail_auth" id="mail_auth" value="0" type="radio" <?php if( $Site['mail_auth'] == '0' ): ?>checked<?php endif; ?>> 关闭</th>
          </tr>
          <tr>
            <th>验证用户名</th>
            <th class="y-bg"><input type="text" class="input" name="mail_user" id="mail_user" size="30" value="<?php echo ($Site["mail_user"]); ?>"/></th>
          </tr>
          <tr>
            <th>验证密码</th>
            <th class="y-bg"><input type="password" class="input" name="mail_password" id="mail_password" size="30" value="<?php echo ($Site["mail_password"]); ?>"/></th>
          </tr>
        </tbody>
      </table>
      <div class="btn_wrap">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>