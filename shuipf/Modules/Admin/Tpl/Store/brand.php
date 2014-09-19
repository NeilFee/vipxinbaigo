<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <form class="J_ajaxForm" action="{:U('Store/addstore')}" method="post" id="myform">
   <div class="h_a">楼层品牌</div>
   <div class="table_full">
   <table width="100%" class="table_form contentWrap">
        <tbody>
        
        <tr>
            <th width="100%">
             <a class="J_dialog" href="{:U('Store/addfloor',array("id"=>$id))}" title="新增楼层">[新增楼层]</a>
            </th >
          </tr>
          <volist name="list" id="vo">
          <tr>
            <th width="100%">
            <h1>{$vo.name} {$vo.range}-
            <a class="J_dialog" href="{:U("Store/floorupdata",array("id"=>$vo['id']))}">修改</a>
            <a class="J_ajax_del" href="{:U("Store/floordelete",array("id"=>$vo['id']))}">删除</a></a>
            </h1>
            </th >
          </tr>
          <tr>
            <th width="100%">
                   <a class="J_dialog" href="{:U('Store/addbrand',array("id"=>$vo['id']))}" title="新增品牌">[新增品牌]</a>        -------> 
                   <volist name="vo.Storebrand" id="c">
                   {$c.name}[<a class="J_dialog" href="{:U("Store/brandupdata",array("id"=>$c['id']))}">修改</a>][<a class="J_ajax_del" href="{:U("Store/branddelete",array("id"=>$c['id']))}">删除</a>] |
                   </volist>
             </th>
          </tr>
          </volist>
        </tbody>
      </table>
   </div>
   
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>