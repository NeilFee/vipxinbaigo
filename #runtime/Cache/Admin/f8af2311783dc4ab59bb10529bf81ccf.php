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
  <div class="h_a">搜索</div>
    <form class="" action="__URL__/memberlist" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
         会员姓名：
        <input type="text" class="input length_2" name="surname" style="width:200px;" value="<?php echo ($surname); ?>" placeholder="请输入会员姓名...">
        
         联系电话：
        <input type="text" class="input length_2" name="telephone" style="width:200px;" value="<?php echo ($telephone); ?>" placeholder="请输入会员联系电话">
        
      
          会员卡号：
        <input type="text" class="input length_2" name="vipcode" style="width:200px;" value="<?php echo ($vipcode); ?>" placeholder="请输入会员卡号">
        </br>
        
             身份证件号：
        <input type="text" class="input length_2" name="vipid" style="width:200px;" value="<?php echo ($vipid); ?>" placeholder="请输入会员身份证号">  
        
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>登陆时间</td>
          <td width="100"  align='center'>姓名</td>
          <td width="60"  align='center'>会员卡等级</td>
          <td width="50"  align='center'>积分</td>
          
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
	  <?php if($vipcode == ''): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
          <td align='center'><?php echo ($r["jointdate_yyyymmdd"]); ?></td>
          <td align="center"><?php echo ($r["surname"]); ?></td>
          <td align="center"><?php echo ($r["vipgrade"]); ?></td>
          <td align="center">
          <?php echo (int)$r['currentbonus']; ?>          
          </td>        
          <td align='center' >
          <a href="<?php echo U("Member/up_memberlist",array("vipcode"=>$r['vipcode']));?>">编辑会员资料</a> 
           </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>		
		 <tr>
          <td align='center'><?php echo ($list["jointdate_yyyymmdd"]); ?></td>
          <td align="center"><?php echo ($list["surname"]); ?></td>
          <td align="center"><?php echo ($list["vipgrade"]); ?></td>
          <td align="center">
          <?php echo (int)$list['currentbonus']; ?>          
          </td>        
          <td align='center' >
          <a href="<?php echo U("Member/up_memberlist",array("vipcode"=>$list['vipcode']));?>">编辑会员资料</a> 
           </td>
        </tr><?php endif; ?>
      </tbody>
    </table>
     <div class="p10">
        <div class="pages"><?php echo ($page); ?></div>
      </div>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>