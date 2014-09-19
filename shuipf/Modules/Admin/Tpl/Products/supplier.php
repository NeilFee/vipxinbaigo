<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  <ul class="cc">
        <li class="current"><a href="__URL__/productsprece">供货商管理</a></li>
        <li><a href="__URL__/supplieradd">添加供货商</a></li>
      </ul>
</div>

  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>发布日期</td>
          
          <td width="100"  align='center'>供货商</td>
          
         
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>
           <?php 
        echo   $date_time = substr($r['date_time'],0,strlen($r['date_time'])-8);
          
          ?>
          </td>
          
           <td align='center'>
            {$r.name}
           </td>
           
          <td align='center' >
          <a href="{:U("Products/supplierup",array("id"=>$r['id']))}">编辑</a> |
           <a class="J_ajax_del" href="{:U("Products/supplierdel",array("id"=>$r['id']))}">删除</a>
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