<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>提交时间</td>
          <td width="100"  align='center'>反馈门店</td>
          <td width="60"  align='center'>公司名称</td>
          <td width="100"  align='center'>反馈内容</td>
          <td width="100"  align='center'>联系人</td>
          <td width="100"  align='center'>联系电话</td>
          <td width="100"  align='center'>职位</td>
          <td width="100"  align='center'>邮箱</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.do_date}</td>
          <td align='center'>{$r.store}</td>
          <td align="center">{$r.title}</td>
           <td align='center'>{$r.content}</td>
          <td align='center'>{$r.contacts}</td>
          <td align="center">{$r.phone}</td>
          <td align="center">{$r.zhiwei}</td>
           <td align="center">{$r.mail}</td>
          <td align='center' >
           <a class="J_ajax_del" href="{:U("Feedback/del_merchants",array("id"=>$r['id']))}">删除</a>
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