<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <form class="J_ajaxForm" action="{:U('Lottery/lotteryUpdate')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
        
          <tr>
            <th width="100">活动名称</th>
            <td><input type="test" name="name" value="{$name}" class="input" id="name">
              </td>
          </tr>
          
          <tr>
            <th width="100">起始日期</th>
            <td>
               <input type="test" name="starttime" value="{$starttime}" class="input J_date date" id="starttime">
            </td>
          </tr>

          <tr>
              <th width="100">截止日期</th>
              <td>
                  <input type="test" name="endtime" value="{$endtime}" class="input J_date date" id="endtime">
              </td>
          </tr>

          <tr>
              <th width="100">活动描述</th>
              <td>
                  <input type="test" style="width:400px;" name="description" value="{$description}" class="input length_2" id="description">
              </td>
          </tr>

          <tr>
              <th width="100">发布状态</th>
              <td><label><input type="radio" name="status" value="1" <if condition="$status eq 1">checked="1"</if> onclick="change(this.value)" />已发布  &nbsp;&nbsp;&nbsp;&nbsp;</label><label><input type="radio" name="status" value="0" <if condition="$status eq 0">checked="1"</if> onclick="change(this.value)" />未发布</label></td>
          </tr>

        </tbody>
      </table>
   </div>
   <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
      </div>
    </div>
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>