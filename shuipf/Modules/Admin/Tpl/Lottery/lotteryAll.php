<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
 <div class="nav">
  <ul class="cc">
        <li class="current"><a href="">抽奖活动管理</a></li>
        <li ><a href="__URL__/lotteryAdd">添加抽奖活动</a></li>
        
      </ul>
</div>
   <div class="h_a">搜索</div>
    <form class="" action="__URL__/lotteryAll" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
       抽奖活动名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="{$name}" placeholder="请输入抽奖活动名称">
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="30"  align='center'>序号</td>
          <td width="120"  align='center'>活动名称</td>
          <td width="60"  align='center'>起始日期</td>
          <td width="60"  align='center'>截止日期</td>
          <td width="150"  align='center'>活动描述</td>
          <td width="50"  align='center'>发布状态</td>
          <td width="60"  align='center'>创建时间</td>
          <td width="60"  align='center'>更新时间</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.id}</td>
          <td align='center'>{$r.name}</td>
          <td align='center'>{$r.starttime}</td>
          <td align='center'>{$r.endtime}</td>
          <td align='center'>{$r.description}</td>
          <if condition="$r['status'] eq 0"> <td align='center'>未发布</td>
              <else /> <td align='center'>已发布</td>
          </if>
          <td align='center'>{$r.createtime}</td>
          <td align='center'>{$r.updatetime}</td>
          <td align='center' >
          <a href="{:U("Lottery/lotteryUpdate",array("id"=>$r['id']))}">编辑</a> |
          <a href="{:U("Lottery/lotteryRuleAll",array("id"=>$r['id']))}">规则</a> |
          <a href="{:U("Lottery/lotteryDrawByRule",array("id"=>$r['id']))}">抽奖</a> |
          <a class="J_ajax_del" href="{:U("Lottery/lotteryDelete",array("id"=>$r['id']))}">删除</a>
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