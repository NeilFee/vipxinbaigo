<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <if condition="$single eq false">
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/activities" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
        活动主题：
        <input type="text" class="input length_2" name="title" style="width:200px;" value="{$title}" placeholder="请输入 活动主题">
        
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
   <form class="J_ajaxForm" action="{:U('Newday/activitiespaixu')}" method="post" id="myform">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="30"  align='center'>推荐排序</td>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>活动主题</td>
          <td width="60"  align='center'>门店</td>
          <td width="130"  align='center'>管理操作</td>
          <td width="60"  align='center'>审核结果</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
         <td align='center'>
          <if condition="$r['tuijian'] eq  1 ">
           <input style="width: 20px;" type="test" name="paixu[{$r.id}]" value="{$r.paixu}" class="input" id="username">
          </if>
          </td>
          <td align='center'>
           <?php 
        echo   $date_time = substr($r['date_time'],0,strlen($r['date_time'])-8);
          
          ?>
          
          </td>
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
          <a href="{:U("Newday/upactivities",array("id"=>$r['id']))}">编辑</a> |
          
          <if condition="$r['tuijian'] eq 1 ">
          <a  href="{:U("Newday/activitiestuijian",array("id"=>$r['id'],"key"=>0))}">
 			<span style="color: red">
 			取消推荐</span>
 			</a> |
 			<else/>
           <a href="{:U("Newday/activitiestuijian",array("id"=>$r['id'],"key"=>1))}">推荐</a> |
           </if>
           <a class="J_ajax_del" href="{:U("Newday/delactivities",array("id"=>$r['id']))}">删除</a>
           </td>
           <td align='center' onMouseOver="javascript:show(this);" onMouseOut="javascript:hide(this);">
             {$r['check_status']}
             <div id="mydiv" style="position:absolute;display:none;border:1px solid silver;background:silver;"> {$r['reason']}
           </td>
        <tr>
        </volist>
      </tbody>
    </table>
     <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
    </form>
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
    $(objDiv).css("left", $(objTD).offset().left + 30);
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
