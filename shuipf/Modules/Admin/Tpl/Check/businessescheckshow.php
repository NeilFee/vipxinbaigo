<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="table_list">
   <form class="J_ajaxForm" action="{:U('Check/businessescheckshow')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}"/>
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">商户名称</th>
            <td><input disabled="disabled" style="width: 300px;" type="test" name="name" value="{$name}" class="input" >
              </td>
          </tr>
           <tr>
            <th width="100">商户封面图片</th>
            <td>
              <img src='{$name_img}' id='thumb_preview' width='135' height='113' style='cursor:hand' />
              </td>
          </tr>
          <tr>
            <th width="100">商户类别</th>
            <td>
            <select name="node_id" disabled="disabled">
            <volist name="nodelist" id="vo">
            <option value="{$vo.id}" <if condition="$node_id eq $vo['id'] ">selected="selected"</if>>{$vo.name}</option>
            </volist>
            </select>
              </td>
          </tr>
          <tr>
            <th width="100">商户联系方式</th>
            <td><input disabled="disabled" style="width: 300px;" type="test" name="phone" value="{$phone}" class="input" >
              </td>
          </tr>
           <tr>
            <th width="100">商户地址</th>
            <td><input disabled="disabled" style="width: 300px;" type="test" name="address" value="{$address}" class="input" >
              </td>
          </tr>
        
           <tr>
            <th width="100">城市<span style="color: red;">*</span></th>
            <td>
               <select name="chengshi" disabled="disabled">  
                <volist name="citylist" id="vo">
                <option value ="{$vo.id}" <if condition="$vo['id'] eq $city"> selected="selected" </if> > {$vo.name}</option>  
                </volist>
                </select>
             </td>
          </tr>
           
		  
		  
		   <tr>
            <th width="100">门店<span style="color: red;">*</span></th>
            <td>
              <select id="thecity" name="mendian" disabled="disabled">  
                <volist name="storelist" id="vo">
                <option value ="{$vo.id}" <if condition="$vo['id'] eq $mendian">selected="selected"</if> >{$vo.name}</option>
               </volist>
             </select>
            </td>
          </tr>
		  
           <tr>
            <th width="100">商户优惠介绍</th>
            <td>
              {$introduction}
              </td>
          </tr>
          <tr>
          <th>审核结果</th>
          <td><label><input type="radio" name="status" value="1" onclick="change(this.value)" />通过  &nbsp;&nbsp;&nbsp;&nbsp;</label><label><input type="radio" name="status" value="0" onclick="change(this.value)" />不通过</label></td>
        </tr>
        <tr id="reason_td" style="display:none">
          <th width="100">不通过理由<span style="color: red;">*</span></th>
          <td>
            <input style="width: 400px;" type="text" name="reason"  class="input" id="reason" >
          </td>
        </tr>
        </tbody>
      </table>
   </div>
   <div class="btn_wrap">
      <div class="btn_wrap_pd"> 
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
      </div>
    </div>
    </form>
</div>
    <script>
    function change(value)
    {
      if(value == 1){
        $('#reason_td').hide();
      }else{
        $('#reason_td').show();
      }
      
    }
    </script>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>