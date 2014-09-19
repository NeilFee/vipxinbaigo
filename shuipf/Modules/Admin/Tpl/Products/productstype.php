<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li class="current"><a href="index.php?g=Admin&amp;m=Products&amp;a=productstype&amp;menuid=270">分类管理</a></li>
        <li><a href="__URL__/add_productstype">添加分类</a></li>
      </ul>
</div>
  <div class="table_list">
     <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="60"  align='center'>行数</td>
          <td width="100" align='center'>分类名称</td>
          <td width="130" align='center'>管理操作</td>
        </tr>
      </thead>
      
      <tbody>
        <volist name="list" id="r">
	        <tr>
	          <td align='center'>{$r.id}</td>
	          <td align='center'>{$r.name}</td>
	          <td align='center' >
	          <a href="{:U("Products/up_productstype",array("id"=>$r['id']))}">编辑</a> |
	           <a class="J_ajax_del" href="{:U("Products/del_productstype",array("id"=>$r['id']))}">删除</a>
	           </td>
	        </tr>
        </volist>
      </tbody>
      
    </table>
     <div class="p10">
        <div class="pages"> {$page} </div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>