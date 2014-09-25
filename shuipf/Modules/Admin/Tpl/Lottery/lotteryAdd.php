<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Lottery/lotteryAdd')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">活动名称</th>
            <td><input type="test" name="name" class="input" id="name">
            </td>
          </tr>
          <tr>
              <th width="100">起始日期</th>
              <td><input type="test" name="starttime"  class="input J_date date" id="starttime">
              </td>
          </tr>
          <tr>
              <th width="100">截止日期</th>
              <td><input type="test" name="endtime"  class="input J_date date" id="endtime">
              </td>
          </tr>
          <tr>
              <th width="100">活动描述</th>
              <td><input type="test" style="width:400px;" name="description" class="input" id="description">
              </td>
          </tr>
        </tbody>
      </table>
   </div>
   <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
      </div>
    </div>
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>