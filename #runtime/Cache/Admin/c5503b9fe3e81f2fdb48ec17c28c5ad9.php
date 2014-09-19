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
  <?php if($single == false): ?><div class="h_a">搜索</div>
    <form class="" action="__URL__/product" method="get" id="myform">
    <div class="search_type cc mb10">
     礼品名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="<?php echo ($name); ?>" placeholder="请输礼品名称">
     城市：
        <select name="chengsi">
        <option value="" >请选择城市</option>
          <?php if(is_array($citylist)): $i = 0; $__LIST__ = $citylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><option value="<?php echo ($s["id"]); ?>" <?php if($chengshi == $s['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($s["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
           </select> 
                 门店：
        <select name="mendian">
        <option value="" >请选择门店</option>
          <?php if(is_array($storelist)): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><option value="<?php echo ($s["id"]); ?>"  <?php if($mendian == $s['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($s["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
           </select> 
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> 
        
    </div>
  </form><?php endif; ?>
  <div class="table_list">
  <form class="J_ajaxForm" action="<?php echo U('Products/productpaixu');?>" method="post" id="myform">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="20"  align='center'>推荐排序</td>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>礼品名称</td>
          <td width="60"  align='center'>礼品分类</td>
          <td  align='center'>礼品采购价</td>
          <td  align='center'>积分</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
        <td align='center'>
          <?php if($r['tuijian'] == 1 ): ?><input style="width: 20px;" type="test" name="paixu[<?php echo ($r["id"]); ?>]" value="<?php echo ($r["paixu"]); ?>" class="input" id="username"><?php endif; ?>
         </td>
          <td align='center'><?php echo ($r["date_time"]); ?></td>
          <td align='center'><?php echo ($r["name"]); ?></td>
          <td align="center">
          <?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i; if($co['id'] == $r['typename'] ): echo ($co["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
          </td>
          <td align="center"><?php echo ($r["cjiage"]); ?></td>
          <td align="center"><?php echo ($r["jifen"]); ?></td>
          <td align='center' >
          <a href="<?php echo U("Products/productup",array("id"=>$r['id']));?>">编辑</a> |
          <?php if($r['tuijian'] == 1 ): ?><a  href="<?php echo U("Products/producttuijian",array("id"=>$r['id'],"key"=>0));?>">
 			<span style="color: red">
 			取消推荐</span>
 			</a> |
 			<?php else: ?>
           <a href="<?php echo U("Products/producttuijian",array("id"=>$r['id'],"key"=>1));?>">推荐</a> |<?php endif; ?>
           <a class="J_ajax_del" href="<?php echo U("Products/productdel",array("id"=>$r['id']));?>">删除</a>
           </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
     <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
     <div class="p10">
        <div class="pages"> <?php echo ($page); ?> </div>
      </div>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>