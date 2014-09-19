<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <if condition="$single eq false">
  <div class="h_a">搜索</div>
    <form class="" action="__URL__/product" method="get" id="myform">
    <div class="search_type cc mb10">
     礼品名称：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="{$name}" placeholder="请输礼品名称">
     城市：
        <select name="chengsi">
        <option value="" >请选择城市</option>
          <volist name="citylist" id="s">
           <option value="{$s.id}" <if condition="$chengshi eq $s['id']">selected="selected" </if> >{$s.name}</option>
            </volist>
           </select> 
                 门店：
        <select name="mendian">
        <option value="" >请选择门店</option>
          <volist name="storelist" id="s">
           <option value="{$s.id}"  <if condition="$mendian eq $s['id']">selected="selected" </if> >{$s.name}</option>
            </volist>
           </select> 
          <button class="btn btn_submit mr10 " type="submit">搜索</button>  
        </span> 
        
    </div>
  </form>
</if>
  <div class="table_list">
  <form class="J_ajaxForm" action="{:U('Products/productpaixu')}" method="post" id="myform">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="20"  align='center'>推荐排序</td>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>礼品名称</td>
          <td width="60"  align='center'>礼品分类</td>
          <td  align='center'>礼品采购价</td>
          <td  align='center'>积分</td>
          <td width="130"  align='center'>管理操作</td>
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
          <td align='center'>{$r.date_time}</td>
          <td align='center'>{$r.name}</td>
          <td align="center">
          <volist name="typelist" id="co">
            <if condition="$co['id'] eq $r['typename'] ">
		      {$co.name} 
		      </if>
		   </volist>
          </td>
          <td align="center">{$r.cjiage}</td>
          <td align="center">{$r.jifen}</td>
          <td align='center' >
          <a href="{:U("Products/productup",array("id"=>$r['id']))}">编辑</a> |
          <if condition="$r['tuijian'] eq 1 ">
          <a  href="{:U("Products/producttuijian",array("id"=>$r['id'],"key"=>0))}">
 			<span style="color: red">
 			取消推荐</span>
 			</a> |
 			<else/>
           <a href="{:U("Products/producttuijian",array("id"=>$r['id'],"key"=>1))}">推荐</a> |
           </if>
           <a class="J_ajax_del" href="{:U("Products/productdel",array("id"=>$r['id']))}">删除</a>
           </td>
        </tr>
        </volist>
      </tbody>
    </table>
     <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
     <div class="p10">
        <div class="pages"> {$page} </div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
