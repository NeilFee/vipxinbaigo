<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>  
  <div class="table_list">
  <table width="100%" cellspacing="0" >
      <thead>
        <tr>
          <td width="80"  align='center'>发布时间</td>
          <td width="100"  align='center'>主题</td>
          <td width="60"  align='center'>门店</td>
          <td width="130"  align='center'>管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="list" id="r">
        <tr>
          <td align='center'>
          
          <?php 
        echo   $date_time = substr($r['date_time'],0,strlen($r['date_time'])-8);
          
          ?></td>
          <td align='center'>{$r.title}</td>
          <td align="center">
          <?php $mendianarray=explode(',',$r['mendian']); ?>
          <volist name="mendianarray" id="c">
          <volist name="storelist" id="co">
            <if condition="$co['id'] eq $c">
		      {$co.name}</br> 
		      </if>
		   </volist>
		   </volist>
          </td>
          <td align='center' >
          <a href="{:U("Check/daynewscheckshow",array("id"=>$r['id']))}">查看</a>
           </td>
        </tr>
        </volist>
      </tbody>
    </table>
     <div class="p10">
        <div class="pages"> {$page} </div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
