<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
 <div class="nav">
  <ul class="cc">
        <li class="current"><a href="__URL__/index">反馈类型</a></li>
        
        <li><a href="__URL__/fankuitypeadd">添加反馈类型</a></li>
        
      </ul>
</div>
  
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/index" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
         分类名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="{$name}" placeholder="请输入 分类名称">
  
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td  align='center'>ID</td>
          <td  align='center'>反馈类型</td>
          <td  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.id}</td>
          <td align='center'>{$r.name}</td>
        
          <td align='center' >
          <a href="{:U("Fankuitype/fankuitypeaup",array("id"=>$r['id']))}">编辑</a> |
          
          
          
          <a class="J_ajax_del" href="{:U("Fankuitype/fankuitypedel",array("id"=>$r['id']))}">删除</a>
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