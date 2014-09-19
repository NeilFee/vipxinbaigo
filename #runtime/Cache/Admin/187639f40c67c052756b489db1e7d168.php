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
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>排序</td>
          <td width="100"  align='center'>广告名称</td>
          <td width="60"  align='center'>广告描述</td>
          <td width="150"  align='center'>有效期</td>
          <td  align='center'>广告</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
          <td align='center'><?php echo ($r["paixu"]); ?></td>
          <td align='center'><?php echo ($r["name"]); ?></td>
          <td align="center"><?php echo ($r["adatl"]); ?></td>
          <td align="center"><?php echo ($r["sta_date"]); ?>-<?php echo ($r["end_date"]); ?></td>
          <td align="center">
          <a href="<?php echo ($r["ad_url"]); ?>">
          <img alt="" src="<?php echo ($r["ad_img"]); ?>" height="200" width="500">
           </a></td>
          <td align='center' >
          <a href="<?php echo U("Ad/up_advertisement",array("id"=>$r['id']));?>">编辑</a> |
          <a class="J_ajax_del" href="<?php echo U("Ad/del_advertisement",array("id"=>$r['id']));?>">删除</a>
           </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
     <div class="p10">
        <div class="pages"> <?php echo ($page); ?> </div>
      </div>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>