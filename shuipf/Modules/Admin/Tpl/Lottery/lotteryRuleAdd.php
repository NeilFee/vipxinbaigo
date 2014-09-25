<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Lottery/lotteryRuleAdd')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
        <tr>
            <th width="100">类型</th>
            <td>
                <select name="type" onchange="typeChange(this.options[this.options.selectedIndex].value)">
                    <option selected="selected" value ="">选择类型</option>
                    <option value ="1">门店</option>
                    <option value ="2">城市</option>
                    <option value ="4">区域</option>
                    <option value ="8">全部</option>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">门店</th>
            <td>
                <select name="store" id="store" disabled='disabled'>
                    <option selected="selected" value ="">选择门店</option>
                    <volist name="storelist" id="vo">
                        <option value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">城市</th>
            <td>
                <select name="city" id="city" disabled='disabled'>
                    <option selected="selected" value ="">选择城市</option>
                    <volist name="citylist" id="vo">
                        <option value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">区域</th>
            <td>
                <select name="region" id="region" disabled='disabled'>
                    <option selected="selected" value ="">选择区域</option>
                    <volist name="regionlist" id="vo">
                        <option value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
          <tr>
            <th width="100">日期</th>
              <td><input type="test" name="date"  class="input J_date date" id="date">
            </td>
          </tr>
          <tr>
              <th width="100">数量</th>
              <td><input type="test" name="count"  class="input" id="count">
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
<script>
function typeChange(id){
    if(id==1){
        $('#store').attr("disabled",false);
        $('#city').attr("disabled",true);
        $('#region').attr("disabled",true);
    }else if(id==2){
        $('#store').attr("disabled",true);
        $('#city').attr("disabled",false);
        $('#region').attr("disabled",true);
    }else if(id==4){
        $('#store').attr("disabled",true);
        $('#city').attr("disabled",true);
        $('#region').attr("disabled",false);
    }else{
        $('#store').attr("disabled","true");
        $('#city').attr("disabled","true");
        $('#region').attr("disabled","true");
    }

    $('#store').val("");
    $('#city').val("");
    $('#region').val("");
}
</script>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>