<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <form class="J_ajaxForm" action="{:U('Products/productspreceadd')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
        
          <tr>
            <th width="100">价格区段<span style="color: red;">*</span></th>
            <td><input type="test" name="s_price" class="input" id="username">-
            <input type="test" name="e_price" class="input" id="username">
              </td>
          </tr>
          
        </tbody>
      </table>
   </div>
   
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
      </div>
    
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>