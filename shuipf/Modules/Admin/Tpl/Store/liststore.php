<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <if condition="$single eq false">
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/liststore" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
        门店名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="{$name}" placeholder="请输入 分类名称">
  
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
</if>
  
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>ID</td>
          <td width="100"  align='center'>门店名称</td>
          <td width="60"  align='center'>门店地址</td>
          <td width="50"  align='center'>客服热线</td>
          <td  align='center'>开业时间</td>
          <td  align='center'>楼层面积</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.id}</td>
          <td align='center'>{$r.name}</td>
          <td align="center">{$r.address}</td>
          <td align="center">{$r.phone}</td>
          <td align="center">{$r.opening_time}</td>
          <td align="center">{$r.measure}</td>
          <td align='center' >
          <a href="{:U("Store/updatestore",array("id"=>$r['id']))}">编辑</a> |
          
           <a href="{:U("Store/brand",array("id"=>$r['id']))}">楼层品牌</a> |
           
           <a class="J_ajax_del" href="{:U("Store/delete",array("id"=>$r['id']))}">删除</a>
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
