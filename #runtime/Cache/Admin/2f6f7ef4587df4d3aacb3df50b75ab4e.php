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
 <div class="nav">
  <ul class="cc">
        <li class="current"><a href="__URL__/index">反馈类型</a></li>
        
        <li><a href="__URL__/fankuitypeadd">添加反馈类型</a></li>
        
      </ul>
</div>
  
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/index" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
         分类名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="<?php echo ($name); ?>" placeholder="请输入 分类名称">
  
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td  align='center'>ID</td>
          <td  align='center'>反馈类型</td>
          <td  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
          <td align='center'><?php echo ($r["id"]); ?></td>
          <td align='center'><?php echo ($r["name"]); ?></td>
        
          <td align='center' >
          <a href="<?php echo U("Fankuitype/fankuitypeaup",array("id"=>$r['id']));?>">编辑</a> |
          
          
          
          <a class="J_ajax_del" href="<?php echo U("Fankuitype/fankuitypedel",array("id"=>$r['id']));?>">删除</a>
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