<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Ad/add_advertisement')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}"/>
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">广告排序<span style="color: red;">*</span></th>
            <td><input type="test" name="paixu" value="{$paixu}" class="input" >
              </td>
          </tr>
          
          <tr>
            <th width="100">广告名称<span style="color: red;">*</span></th>
            <td><input type="test" name="name" value="{$name}" class="input" >
              </td>
          </tr>
          
           <tr>
            <th width="100">广告描述<span style="color: red;">*</span></th>
            <td><input style="width: 300px;" type="test" name="adatl" value="{$adatl}" class="input" >
              </td>
          </tr>
          
          
          <tr>
            <th width="100">广告有效期</th>
            <td>
            <input type="test" name="sta_date" class="input J_date date" value="{$sta_date}" >-
            <input type="test" name="end_date" class="input J_date date" value="{$end_date}">
              </td>
          </tr>
          
           <tr>
            <th width="100">广告图片</th>
            <td>

             <?php $authkey = upload_key("1,jpg|jpeg|gif|png|bmp,1,,,1"); ?>
 
	    
		<input type='hidden' name='thumb' id='thumb' value=''>
	     <a href='javascript:void(0);' onclick="flashupload('thumb_images',
	   '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','Web','10','{$authkey}');return false;">
	   <img src='__ROOT__/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' />
	   </a>
      <br> 
                        <input type="button" value="裁减图片" onclick="crop_cut_thumb($('#thumb').val());return false;" class="btn"> 
            <input type="button" value="取消图片" onclick="$('#thumb_preview').attr('src','__ROOT__/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" class="btn">
            
            <script type="text/javascript">
            function crop_cut_thumb(id){
	if ( id =='' || id == undefined ) { 
                      isalert('请先上传缩略图！');
                      return false;
                    }
                    var catid = $('input[name="info[catid]"]').val();
                    if(catid == '' ){
                        isalert('请选择栏目ID！');
                        return false;
                    }
                    Wind.use('artDialog','iframeTools',function(){
                   art.dialog.open(GV.DIMAUB+'index.php?a=public_imagescrop&m=Content&g=Contents&picurl='+encodeURIComponent(id)+'&input=thumb&preview=thumb_preview', {
                           title:'裁减图片', 
                        id:'crop',
                        ok: function () {
                            var iframe = this.iframe.contentWindow;
                            if (!iframe.document.body) {
                                 alert('iframe还没加载完毕呢');
                                 return false;
                            }
                            iframe.uploadfile();
                            return false;
                        },
                        cancel: true
                      });
                    });
            };
</script>
              </td>
          </tr>
           <tr>
            <th width="100">广告链接</th>
            <td><input type="test" name="ad_url" style="width: 300px;" value="{$ad_url}" class="input">
              </td>
          </tr>
          
        </tbody>
      </table>
   </div>
   <div class="btn_wrap">
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