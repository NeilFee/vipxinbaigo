<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <if condition="$single eq false">
  <div class="h_a">搜索</div>
    <form class="" action="__URL__/businesses" method="get" id="myform">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">
         商户名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="{$name}" placeholder="请输入 品牌名称">
  
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> </div>
    </div>
  </form>
  </if>
  <div class="table_list">
   <form class="J_ajaxForm" action="{:U('Businesses/businessespaixu')}" method="post" id="myform">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
         <td width="30"  align='center'>推荐排序</td>
          <td width="60"  align='center'>发布日期</td>
          <td width="100"  align='center'>商户名称</td>
          <td width="60"  align='center'>联系方式</td>
          <td width="50"  align='center'>发布人</td>
          <td  align='center'>商品优惠</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
        <td align='center'>
          <if condition="$r['tuijian_key'] eq  1 ">
           <input style="width: 20px;" type="test" name="paixu[{$r.id}]" value="{$r.paixu}" class="input" id="username">
          </if>
          </td>
          <td align='center'>{$r.date_time}</td>
          <td align='center'>{$r.name}</td>
          <td align="center">{$r.phone}</td>
          <td align="center">{$r.nickname}</td>
          <td align="center">{$r.introduction}</td>
          <td align='center' >
          <a href="{:U("Businesses/up_businesses",array("id"=>$r['id']))}">编辑</a> |
          <if condition="$r['tuijian_key'] eq 1 ">
 			<a  href="{:U("Businesses/tuijian",array("id"=>$r['id'],"key"=>0))}">
 			<span style="color: red">
 			取消推荐</span>
 			</a> |
          <else/>
           <a  href="{:U("Businesses/tuijian",array("id"=>$r['id'],"key"=>1))}">推荐到首页</a> |
          </if>
           <a class="J_ajax_del"  href="{:U("Businesses/del_businesses",array("id"=>$r['id']))}">删除</a>
           </td>
        </tr>
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>