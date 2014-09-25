<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Lottery/lotteryRuleUpdate')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <input type="hidden" name="ruleid" value="{$rule['id']}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
        <tr>
            <th width="100">类型</th>
            <td>
                <select name="type" onchange="typeChange(this.options[this.options.selectedIndex].value)">
                    <option value ="">选择类型</option>
                    <option <if condition="$rule.scope_type eq 1">selected="selected"</if> value ="1">门店</option>
                    <option <if condition="$rule.scope_type eq 2">selected="selected"</if> value ="2">城市</option>
                    <option <if condition="$rule.scope_type eq 4">selected="selected"</if>  value ="4">区域</option>
                    <option <if condition="$rule.scope_type eq 8">selected="selected"</if>  value ="8">全部</option>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">门店</th>
            <td>
                <select name="store" id="store" <if condition="$rule.store_id eq NULL">disabled='disabled'</if>>
                    <option <if condition="$rule.store_id eq NULL">selected="selected"</if>  value ="">选择门店</option>
                    <volist name="storelist" id="vo">
                        <option <eq name="rule.store_id" value="$vo.id">selected="selected"</eq> value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">城市</th>
            <td>
                <select name="city" id="city" <if condition="$rule.city_id eq NULL">disabled='disabled'</if>>
                    <option selected="selected" value ="">选择城市</option>
                    <volist name="citylist" id="vo">
                        <option <eq name="rule.city_id" value="$vo.id">selected="selected"</eq> value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
        <tr>
            <th width="100">区域</th>
            <td>
                <select name="region" id="region" <if condition="$rule.region_id eq NULL">disabled='disabled'</if>>
                    <option <if condition="$rule.region_id eq NULL">selected="selected"</if> value ="">选择区域</option>
                    <volist name="regionlist" id="vo">
                        <option <eq name="rule.region_id" value="$vo.id">selected="selected"</eq> value ="{$vo.id}">{$vo.name}</option>
                    </volist>
                </select>
            </td>
        </tr>
          <tr>
            <th width="100">日期</th>
              <td><input type="test" name="date" value="{$rule['date']}" class="input J_date date" id="date">
            </td>
          </tr>
          <tr>
              <th width="100">数量</th>
              <td><input type="test" name="count"  value="{$rule['count']}" class="input" id="count">
              </td>
          </tr>
        </tbody>
      </table>
   </div>
   <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
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