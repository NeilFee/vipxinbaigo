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
   <form class="J_ajaxForm" action="<?php echo U('Ad/addAdvertg');?>" method="post" id="myform">
   <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">广告位名称</th>
            <td><input type="test" name="adname" value="<?php echo ($adname); ?>" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位描述</th>
            <td><input type="test" name="adatl" value="<?php echo ($adatl); ?>" class="input" id="username">
              </td>
          </tr>
          
          
          <tr>
            <th width="100">广告位宽度</th>
            <td><input type="test" name="adwidth" value="<?php echo ($adwidth); ?>" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位高度</th>
            <td><input type="test" name="adheight" value="<?php echo ($adheight); ?>" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位个数</th>
            <td><input type="test" name="adnum" value="<?php echo ($adnum); ?>" class="input" id="username">
              </td>
          </tr>
          
        </tbody>
      </table>
   </div>
   <div class="btn_wrap">
      <div class="btn_wrap_pd"> 
      <?php if($id == '' ): ?><button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        <?php else: ?>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button><?php endif; ?>
      </div>
    </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>

</body>
</html>