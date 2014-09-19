<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>ID</td>
          <td width="100"  align='center'>广告名称</td>
          <td width="60"  align='center'>广告描述</td>
          <td width="50"  align='center'>宽度</td>
          <td  align='center'>高度</td>
          <td  align='center'>广告数</td>
          <td width="200"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.id}</td>
          <td align='center'>{$r.adname}</td>
          <td align="center">{$r.adatl}</td>
          <td align="center">{$r.adwidth}</td>
          <td align="center">{$r.adheight}</td>
          <td align="center">{$r.adnum}</td>
          <td align='center' >
          <!-- <a href="{:U("Ad/upadvertg",array("id"=>$r['id']))}">编辑</a> | -->
          <a href="{:U("Ad/upadvertg",array("id"=>$r['id']))}">编辑</a> |
          
          <a href="{:U("Ad/advertisement",array("id"=>$r['id']))}">广告列表</a> |
          
          <a href="{:U("Ad/add_advertisement",array("id"=>$r['id']))}">添加广告</a> |
          
          <a class="J_ajax_del" href="{:U("Ad/deladvertg",array("id"=>$r['id']))}">删除</a>
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