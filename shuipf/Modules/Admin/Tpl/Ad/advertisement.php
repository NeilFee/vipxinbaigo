<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  
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
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.paixu}</td>
          <td align='center'>{$r.name}</td>
          <td align="center">{$r.adatl}</td>
          <td align="center">{$r.sta_date}-{$r.end_date}</td>
          <td align="center">
          <a href="{$r.ad_url}">
          <img alt="" src="{$r.ad_img}" height="200" width="500">
           </a></td>
          <td align='center' >
          <a href="{:U("Ad/up_advertisement",array("id"=>$r['id']))}">编辑</a> |
          <a class="J_ajax_del" href="{:U("Ad/del_advertisement",array("id"=>$r['id']))}">删除</a>
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