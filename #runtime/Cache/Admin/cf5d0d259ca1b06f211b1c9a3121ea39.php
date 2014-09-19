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
<body>
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
  <form name="myform" action="<?php echo U("Rbac/listorders");?>" method="post">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="20">ID</td>
          <td width="200"  align="left" >角色名称</td>
          <td align="left" >角色描述</td>
          <td width="50"  align="left" >状态</td>
          <td width="300">管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
          <td width="10%" align="center"><?php echo ($vo["id"]); ?></td>
          <td width="15%"  ><?php echo ($vo["name"]); ?></td>
          <td ><?php echo ($vo["remark"]); ?></td>
          <td width="5%">
          <?php if($vo['status'] == 1): ?><font color="red">√</font>
          <?php else: ?>
          <font color="red">╳</font><?php endif; ?>
          </td>
          <td  class="text-c">
          <?php if($vo['id'] == 1): ?><font color="#cccccc">权限设置</font> | 
          <!--   <font color="#cccccc">栏目权限</font> | -->
          <a href="<?php echo U('Management/manager',array('role_id'=>$vo['id']));?>">成员管理</a> | 
          <font color="#cccccc">修改</font> | <font color="#cccccc">删除</font>
          <?php else: ?>
          <a href="<?php echo U("Rbac/authorize",array("id"=>$vo["id"]));?>">权限设置</a> | 
          <!-- <a href="<?php echo U("Rbac/setting_cat_priv",array("roleid"=>$vo["id"]));?>">栏目权限</a> |-->
          <a href="<?php echo U('Management/manager',array('role_id'=>$vo['id']));?>">成员管理</a> | <a href="<?php echo U('Rbac/roleedit',array('id'=>$vo['id']));?>">修改</a> | <a class="J_ajax_del" href="<?php echo U('Rbac/roledelete',array('id'=>$vo['id']));?>">删除</a><?php endif; ?>
          </td>
        </tr><?php endforeach; endif; ?>
      </tbody>
    </table>
  </form>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>