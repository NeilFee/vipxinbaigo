<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
    <form class="" action="__URL__/memberlist" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
         会员姓名：
        <input type="text" class="input length_2" name="surname" style="width:200px;" value="{$surname}" placeholder="请输入会员姓名...">
        
         联系电话：
        <input type="text" class="input length_2" name="telephone" style="width:200px;" value="{$telephone}" placeholder="请输入会员联系电话">
        
      
          会员卡号：
        <input type="text" class="input length_2" name="vipcode" style="width:200px;" value="{$vipcode}" placeholder="请输入会员卡号">
        </br>
        
             身份证件号：
        <input type="text" class="input length_2" name="vipid" style="width:200px;" value="{$vipid}" placeholder="请输入会员身份证号">  
        
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="60"  align='center'>登陆时间</td>
          <td width="100"  align='center'>姓名</td>
          <td width="60"  align='center'>会员卡等级</td>
          <td width="50"  align='center'>积分</td>
          
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
	  <if condition="$vipcode eq ''">
        <volist name="list" id="r">
        <tr>
          <td align='center'>{$r.jointdate_yyyymmdd}</td>
          <td align="center">{$r.surname}</td>
          <td align="center">{$r.vipgrade}</td>
          <td align="center">
          <?php echo (int)$r['currentbonus']; ?>          
          </td>        
          <td align='center' >
          <a href="{:U("Member/up_memberlist",array("vipcode"=>$r['vipcode']))}">编辑会员资料</a> 
           </td>
        </tr>
        </volist>
		<else/>		
		 <tr>
          <td align='center'>{$list.jointdate_yyyymmdd}</td>
          <td align="center">{$list.surname}</td>
          <td align="center">{$list.vipgrade}</td>
          <td align="center">
          <?php echo (int)$list['currentbonus']; ?>          
          </td>        
          <td align='center' >
          <a href="{:U("Member/up_memberlist",array("vipcode"=>$list['vipcode']))}">编辑会员资料</a> 
           </td>
        </tr>
		
		</if>
      </tbody>
    </table>
     <div class="p10">
        <div class="pages">{$page}</div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>