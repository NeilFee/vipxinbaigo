<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Newday/addactivities')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">活动主题<span style="color: red;">*</span></th>
            <td><input style="width: 400px;" type="test" name="title" value="{$title}" class="input" id="username">
              </td>
          </tr>
          
          
           <tr>
            <th width="100">活动开始时间<span style="color: red;">*</span></th>
            <td><input  type="test" name="s_date" value="{$s_date}" class="input J_date date" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">活动结束时间<span style="color: red;">*</span></th>
            <td><input  type="test" name="e_date" value="{$e_date}" class="input J_date date" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">活动类型<span style="color: red;">*</span></th>
            <td>
	           <select name="atype" >  
		            <volist name="activitiestypelist" id="vo">
				      <option value ="{$vo.id}">{$vo.name}</option>  
				     </volist>
			    </select>  
             </td>
          </tr>
          
          <tr>
            <th width="100">活动封面图<span style="color: red;">*</span></th>
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
            <th width="100">活动介绍<span style="color: red;">*</span></th>
            <td><input style="width: 500px;" type="test" name="jieshao" value="{$jieshao}" class="input" id="username">
              </td>
          </tr>
           <tr>
            <th width="100">城市<span style="color: red;">*</span></th>
            <td>
            <if condition="$single eq false">
	           <select name="chengshi" onchange="chengshiajax(this.options[this.options.selectedIndex].value)">  
	           <option value ="" selected="selected">请选择</option>  
		            <volist name="citylist" id="vo">
				      <option value ="{$vo.id}">{$vo.name}</option>  
				     </volist>
				     <option value ="">全国门店</option> 
			    </select>
          <else />
            <select name="chengshi" disabled="disabled">  
            <volist name="citylist" id="vo">
              <option value ="{$vo.id}">{$vo.name}</option>  
            </volist>
            </select>
            <input type='hidden' name="chengshi" value="{$citylist[0].id}">
          </if>

             </td>
          </tr>
           <tr>
            <th width="100">活动门店<span style="color: red;">*</span>
            </th>
            <if condition="$single eq false">
            <td id="thecity">
                                            请选择城市
            </td>
            <else />
            <td id="thecity">
              <input type="checkbox" value="{$thisstore.id}" name="mendian[]" checked="checked" disabled='disabled'>
                  {$thisstore.name}
              <input type='hidden' name="mendian[]" value="{$thisstore.id}">
            </td>
          </if>
          </tr>
          <tr>
            <th width="100">活动内容<span style="color: red;">*</span></th>
            <td>
             <div id='content_tip'></div><script type="text/plain" id="content" name="news">{$news}</script>
                <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
                <script type="text/javascript"  src="<?php echo  CONFIG_SITEURL_MODEL;  ?>statics/js/ueditor/editor_config.js"></script>
                <script type="text/javascript"  src="<?php echo  CONFIG_SITEURL_MODEL;  ?>statics/js/ueditor/editor_all_min.js"></script>
<script type="text/javascript">
                <?php    
         $authkey = upload_key("10,,1,,,0"); ?>
    var editorcontent;
                        UE.commands['attachments'] = {
                            execCommand : function(cmd){
                                flashupload('flashupload', '附件上传','content',ueAttachment,'10,,1,,,0','Web','10','{$authkey}');
                            },
                            queryCommandState : function(){
                                return this.highlight ? -1 :0;
                            }
                        };
                        var editor_config_content = {
                             _catid:'10',
                             _https: '<?php echo CONFIG_SITEURL_MODEL;?>',
                             imageUrl:'<?php echo U('Attachment/Ueditor/imageUp'); ?>',
                             textarea:'info[content]',
                             toolbars:[['FullScreen', 'Source', '|', 'Undo', 'Redo', '|',
                'Bold', 'Italic', 'Underline', 'StrikeThrough', 'Superscript', 'Subscript', 'RemoveFormat', 'FormatMatch','AutoTypeSet', '|',
                'BlockQuote', '|', 'PastePlain', '|', 'ForeColor', 'BackColor', 'InsertOrderedList', 'InsertUnorderedList','SelectAll', 'ClearDoc', '|', 'CustomStyle',
                'Paragraph', '|','RowSpacingTop', 'RowSpacingBottom','LineHeight', '|','FontFamily', 'FontSize', '|',
                'DirectionalityLtr', 'DirectionalityRtl', '|', '', 'Indent', '|',
                'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyJustify', '|',
                'Link', 'Unlink', 'Anchor', '|', 'ImageNone', 'ImageLeft', 'ImageRight', 'ImageCenter', '|', 'InsertImage', 'Emotion', 'InsertVideo', 'Music','Attachments', 'Map', 'GMap', 'InsertFrame', 'PageBreak', 'insertcode', 'Webapp','Template','Background','|',
                'Horizontal', 'Date', 'Time', 'Spechars', 'WordImage', '|',
                'InsertTable', 'DeleteTable', 'InsertParagraphBeforeTable', 'InsertRow', 'DeleteRow', 'InsertCol', 'DeleteCol', 'MergeCells', 'MergeRight', 'MergeDown', 'SplittoCells', 'SplittoRows', 'SplittoCols', '|',
                 'Print', 'Preview', 'SearchReplace','Help']],
                             minFrameHeight:300
                        };
 $(document).ready(function(){
    editorcontent = new baidu.editor.ui.Editor(editor_config_content);
    editorcontent.render( 'content' );
 }); 
</script> 
              </td>
          </tr>
        </tbody>
      </table>
   </div>
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
         <a  href="#" onclick="yulanpage();" >点击预览</a>
     	 </div>
    </form>
     <script>
		function yulanpage()
		{
			$("#yulan1").val($("input[name=title]").val());
			$("#yulan2").val($("input[name=s_date]").val());
			$("#yulan3").val($("input[name=e_date]").val());
			$("#yulan4").val($("input[name=thumb]").val());
			$("#yulan5").val($("textarea[name=news]").val());
			$("#yulan6").val($("input[name=jieshao]").val());
			$('#yulanfrom').submit();
		}
    </script>
    <form action="__URL__/yulanhuodong" method="post" name="yulanfrom" id="yulanfrom" target="_blank">
    <input type="hidden" name="title" id="yulan1" value="">
    <input type="hidden" name="s_date" id="yulan2" value="">
     <input type="hidden" name="e_date" id="yulan3" value="">
      <input type="hidden" name="img" id="yulan4" value="">
       <input type="hidden" name="news" id="yulan5" value="">
        <input type="hidden" name="jieshao" id="yulan6" value="">
   
    </form>
    
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
function chengshiajax(id)
{
	$('#thecity').html('');
    $.post("{:U('Public/mendian')}",{id:id},function(data){
  	$.each(data, function(key, val) {  
  		var htmlstr='<input  type="checkbox" value="'+val['id']+'" name="mendian[]" />'+val['name'];
   		    $('#thecity').append(htmlstr);
    });},'json'
   );
}
</script>
</body>
</html>
