<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Ad/addAdvertg')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}"/>
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">广告位名称</th>
            <td><input type="test" name="adname" value="{$adname}" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位描述</th>
            <td><input type="test" name="adatl" value="{$adatl}" class="input" id="username">
              </td>
          </tr>
          
          
          <tr>
            <th width="100">广告位宽度</th>
            <td><input type="test" name="adwidth" value="{$adwidth}" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位高度</th>
            <td><input type="test" name="adheight" value="{$adheight}" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告位个数</th>
            <td><input type="test" name="adnum" value="{$adnum}" class="input" id="username">
              </td>
          </tr>
          
        </tbody>
      </table>
   </div>
   <div class="btn_wrap">
      <div class="btn_wrap_pd"> 
      <if condition="$id eq '' ">            
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        <else />
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
        </if>
      </div>
    </div>
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>