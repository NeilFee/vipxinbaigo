<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Check/daynewscheckshow')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">资讯主题<span style="color: red;">*</span></th>
            <td><input style="width: 400px;" type="test" name="title" value="{$title}" class="input" id="username" disabled='disabled'>
              </td>
          </tr>
       
         <tr>
            <th width="100">城市</th>
            <td>
              <select name="chengshi" disabled="disabled">  
                <volist name="citylist" id="vo">
              <option value ="{$vo.id}" <if condition="$vo['id'] eq $chengshi"> selected="selected" </if> > {$vo.name}</option>  
             </volist>
             </select>
             
             </td>
          </tr>
          
          <tr>
            <th width="100">活动门店</th>
            <td>[原始门店：
              <volist name="storelist" id="vo">
              <if condition="$vo['checkbox'] eq 1">
                 <input type='hidden' name="mendian[]" value="{$vo.id}">
                 <input  checked="false" type="checkbox" value="{$vo.id}" name="mendian[]" disabled="disabled"/>
                 {$vo.name}
              </if>
              </volist>]
              </td>
          </tr>
          <tr>
            <th width="100">资讯介绍<span style="color: red;">*</span></th>
            <td>
             <div id='content_tip'>{$news}</div>
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
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </form>
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
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>
