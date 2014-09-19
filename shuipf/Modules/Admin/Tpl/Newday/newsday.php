<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <if condition="$single eq false">
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/newsday" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
      
           门店：
        <select name="mendian">
        <option value="" >请选择门店</option>
          <volist name="storelist" id="s">
           <option value="{$s.id}"  <if condition="$mendian eq $s['id']">selected="selected" </if> >{$s.name}</option>
            </volist>
           </select> 
           
           
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  </if>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>主题</td>
          <td width="60"  align='center'>门店</td>
         
          
          <td width="130"  align='center'>管理操作</td>
          <td width="60"  align='center'>审核结果</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>
          
          <?php 
        echo   $date_time = substr($r['date_time'],0,strlen($r['date_time'])-8);
          
          ?></td>
          <td align='center'>{$r.title}</td>
          <td align="center">
          <?php $mendianarray=explode(',',$r['mendian']); ?>
          <volist name="mendianarray" id="c">
          <volist name="storelist" id="co">
            <if condition="$co['id'] eq $c">
		      {$co.name}</br> 
		      </if>
		   </volist>
		   </volist>
          </td>
          <td align='center' >
          <a href="{:U("Newday/upnewsday",array("id"=>$r['id']))}">编辑</a> |
           <a class="J_ajax_del" href="{:U("Newday/delnewsday",array("id"=>$r['id']))}">删除</a>
           </td>
          <td align='center' onMouseOver="javascript:show(this);" onMouseOut="javascript:hide(this);">
            {$r['check_status']}
          <div id="mydiv" style="position:absolute;display:none;border:1px solid silver;background:silver;"> {$r['reason']}
          </div>
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
<script type="text/javascript">
function show(obj) { 
    var objTD  = $(obj);
    var objDiv = $(obj).children("div");
    $(objDiv).css("display","block");
    $(objDiv).css("left", $(objTD).offset().left + 10);
    $(objDiv).css("top", $(objTD).offset().top + 30);  
}
function hide(obj) {
    var objDiv = $(obj).children("div");
    $(objDiv).css("display", "none");
} 
</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
