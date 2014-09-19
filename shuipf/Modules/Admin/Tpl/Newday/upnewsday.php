<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
   <form class="J_ajaxForm" action="{:U('Newday/upnewsday')}" method="post" id="myform">
   <input type="hidden" name="id" value="{$id}">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
          <tr>
            <th width="100">资讯主题<span style="color: red;">*</span></th>
            <td><input style="width: 400px;" type="test" name="title" value="{$title}" class="input" id="username">
              </td>
          </tr>
       
         <tr>
            <th width="100">城市</th>
            <td>
            <if condition="$single eq false">
	           <select name="chengshi" onchange="chengshiajax(this.options[this.options.selectedIndex].value)">  
	                 <option value ="">请选择</option>  
		            <volist name="citylist" id="vo">
				      <option value ="{$vo.id}" <if condition="$vo['id'] eq $chengshi"> selected="selected" </if> > {$vo.name}</option>  
				     </volist>
				     <option value ="">全国门店</option>
			       </select>
            <else />
              <select name="chengshi" disabled="disabled">  
                <volist name="citylist" id="vo">
              <option value ="{$vo.id}" <if condition="$vo['id'] eq $chengshi"> selected="selected" </if> > {$vo.name}</option>  
             </volist>
             </select>
             <input type='hidden' name="chengshi" value="{$citylist[0].id}">
            </if>
			    
			    
             
             </td>
          </tr>
          
          <tr>
            <th width="100">活动门店</th>
            <if condition="$single eq false">
              <td>[原始门店：
              <volist name="storelist" id="vo">
              <if condition="$vo['checkbox'] eq 1">
	               <input  checked="false" type="checkbox" value="{$vo.id}" name="mendian[]" />
	               {$vo.name}
              </if>
              </volist>]
              </br></br></br>
              <span id="thecity">[新增加门店请选择城市]</span>
              </td>
            <else/>
            <td>[原始门店：
              <volist name="storelist" id="vo">
              <if condition="$vo['checkbox'] eq 1">
                 <input type='hidden' name="mendian[]" value="{$vo.id}">
                 <input  checked="false" type="checkbox" value="{$vo.id}" name="mendian[]" disabled="disabled"/>
                 {$vo.name}
              </if>
              </volist>]
              </td>
            </if>
          </tr>
          <tr>
            <th width="100">礼品介绍<span style="color: red;">*</span></th>
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
              </td>
          </tr>
        </tbody>
      </table>
   </div>
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
      </div>
    </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>
