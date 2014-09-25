<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
 <div class="nav">
  <ul class="cc">
      <input type="hidden" name="id" value="{$id}">
        <li class="current"><a href="">抽奖规则管理</a></li>
        <li ><a href="{:U("Lottery/lotteryRuleAdd",array("id"=>$id))}">添加抽奖规则</a></li>
        
      </ul>
</div>
  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="30"  align='center'>序号</td>
          <td width="50"  align='center'>类型</td>
          <td width="100"  align='center'>门店</td>
          <td width="60"  align='center'>城市</td>
          <td width="60"  align='center'>区域</td>
          <td width="60"  align='center'>日期</td>
          <td width="60"  align='center'>数量</td>
          <td width="60"  align='center'>创建日期</td>
          <td width="60"  align='center'>更新日期</td>
          <td width="100"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
		  <td align='center'>{$r.id}</td>
			<switch name="r.scope_type" >
				<case value="1"><td align='center'>门店</td></case>
				<case value="2"><td align='center'>城市</td></case>
				<case value="4"><td align='center'>区域</td></case>
				<case value="8"><td align='center'>全部</td></case>
				<default /><td align='center'>错误</td>
			</switch>
          <if condition="$r.store_id eq NULL"><td align='center'>N/A</td><else/><td align='center'>{$r.store_id.name}</td></if>
          <if condition="$r.city_id eq NULL"><td align='center'>N/A</td><else/><td align='center'>{$r.city_id.name}</td></if>
          <if condition="$r.region_id eq NULL"><td align='center'>N/A</td><else/> <td align='center'>{$r.region_id.name}</td></if>
          <td align='center'>{$r.date}</td>
          <td align='center'>{$r.count}</td>
          <td align='center'>{$r.createtime}</td>
          <td align='center'>{$r.updatetime}</td>
          <td align='center' >
          <a href="{:U("Lottery/lotteryRuleUpdate",array("ruleid"=>$r['id'],"id"=>$id))}">编辑</a> |
          <a class="J_ajax_del" href="{:U("Lottery/lotteryRuleDelete",array("id"=>$r['id']))}">删除</a>
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