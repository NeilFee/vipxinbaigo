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
    <form class="" action="__URL__/newsday" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
      
           门店：
        <select name="mendian">
        <option value="" >请选择门店</option>
          <?php if(is_array($storelist)): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><option value="<?php echo ($s["id"]); ?>"  <?php if($mendian == $s['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($s["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
           </select> 
           
           
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form><?php endif; ?>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>主题</td>
          <td width="60"  align='center'>门店</td>
         
          
          <td width="130"  align='center'>管理操作</td>
          <td width="60"  align='center'>审核结果</td>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
          <td align='center'>
          
          <?php  echo $date_time = substr($r['date_time'],0,strlen($r['date_time'])-8); ?></td>
          <td align='center'><?php echo ($r["title"]); ?></td>
          <td align="center">
          <?php $mendianarray=explode(',',$r['mendian']); ?>
          <?php if(is_array($mendianarray)): $i = 0; $__LIST__ = $mendianarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i; if(is_array($storelist)): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i; if($co['id'] == $c): echo ($co["name"]); ?></br><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
          </td>
          <td align='center' >
          <a href="<?php echo U("Newday/upnewsday",array("id"=>$r['id']));?>">编辑</a> |
           <a class="J_ajax_del" href="<?php echo U("Newday/delnewsday",array("id"=>$r['id']));?>">删除</a>
           </td>
          <td align='center' onMouseOver="javascript:show(this);" onMouseOut="javascript:hide(this);">
            <?php echo ($r['check_status']); ?>
          <div id="mydiv" style="position:absolute;display:none;border:1px solid silver;background:silver;"> <?php echo ($r['reason']); ?>
          </div>
          </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
     <div class="p10">
        <div class="pages"> <?php echo ($page); ?> </div>
      </div>
  </div>
</div>
<script type="text/javascript">
function show(obj) { 
    var objTD  = $(obj);
    var objDiv = $(obj).children("div");
    $(objDiv).css("display","block");
    $(objDiv).css("left", $(objTD).offset().left + 10);
    $(objDiv).css("top", $(objTD).offset().top + 30);  
}
function hide(obj) {
    var objDiv = $(obj).children("div");
    $(objDiv).css("display", "none");
} 
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>