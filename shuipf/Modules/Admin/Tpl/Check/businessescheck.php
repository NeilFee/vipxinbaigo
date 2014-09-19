<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>发布日期</td>
          <td width="100"  align='center'>商户名称</td>
          <td width="60"  align='center'>联系方式</td>
          <td width="50"  align='center'>发布人</td>
          <td  align='center'>商品优惠</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.date_time}</td>
          <td align='center'>{$r.name}</td>
          <td align="center">{$r.phone}</td>
          <td align="center">{$r.nickname}</td>
          <td align="center">{$r.introduction}</td>
          <td align='center' >
          <a href="{:U("Check/businessescheckshow",array("id"=>$r['id']))}">查看</a>
        </tr>
        </volist>
      </tbody>
    </table>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>