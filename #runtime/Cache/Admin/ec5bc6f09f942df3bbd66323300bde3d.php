<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo ($Config["sitename"]); ?></title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
    JS_ROOT: "statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php  $getMenu = AdminbaseAction::getMenu(); if($getMenu) { ?>
<div class="nav">
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $model = $r['model']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$model."/".$action."",$r['data']);?>"><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
   <form class="J_ajaxForm" action="<?php echo U('Products/add_product');?>" method="post" id="myform">
   <input type="hidden" name="id" value="<?php echo ($id); ?>">
   <div class="table_full">
   <table class="table_form contentWrap">
        <tbody>
        
       	  <tr>
            <th width="100">产品编号<span style="color: red;">*</span></th>
            <td><input type="test" name="code" class="input" id="username">
              </td>
          </tr>
          
          <tr>
            <th width="100">礼品名称<span style="color: red;">*</span></th>
            <td><input type="test" name="name" class="input" id="username">
              </td>
          </tr>
          
           <tr>
            <th width="100">推荐标签</th>
            <td>
            
            <select name="tuijian_id">  
            <option value ="">请选择</option>  
            <?php if(is_array($productlabellist)): $i = 0; $__LIST__ = $productlabellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    </select>  
		    
              </td>
          </tr>
          
          <tr>
            <th width="100">礼品封面图<span style="color: red;">*</span></th>
            <td>
             <?php $authkey = upload_key("1,jpg|jpeg|gif|png|bmp,1,,,1"); ?>
 
	    
		<input type='hidden' name='thumb' id='thumb' value=''>
	     <a href='javascript:void(0);' onclick="flashupload('thumb_images',
	   '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','Web','10','<?php echo ($authkey); ?>');return false;">
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
            <th width="100">礼品分类<span style="color: red;">*</span></th>
            <td>
            <select name="typename">  
             <option value ="">请选择</option>  
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    </select>  
              </td>
          </tr>
          
          <tr>
            <th width="100">价格区间<span style="color: red;">*</span></th>
            <td>
            <select name="productsprece">  
            <?php if(is_array($Productsprecelist)): $i = 0; $__LIST__ = $Productsprecelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["s_price"]); ?>-<?php echo ($vo["e_price"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    </select>  
              </td>
          </tr>
          
          
          <tr>
            <th width="100">礼品积分<span style="color: red;">*</span></th>
            <td><input type="test" name="jifen" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">礼品市场价<span style="color: red;">*</span></th>
            <td><input type="test" name="sjiage" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">礼品采购价<span style="color: red;">*</span></th>
            <td><input type="test" name="cjiage" class="input" id="username">
              </td>
          </tr>
          <tr>
            <th width="100">供货商<span style="color: red;">*</span></th>
            <td>
             <select name="shangjia">
              <?php if(is_array($productssupplierlist)): $i = 0; $__LIST__ = $productssupplierlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    </select>  
              </td>
          </tr>
          
          <tr>
            <th width="100">城市</th>
            <td>
            <?php if($single == false): ?><select name="chengshi" onchange="chengshiajax(this.options[this.options.selectedIndex].value)">  
	           <option value ="" selected="selected">请选择</option>  
		            <?php if(is_array($citylist)): $i = 0; $__LIST__ = $citylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				     <option value ="">全国门店</option> 
			       </select>
          <?php else: ?>
            <select name="chengshi" disabled="disabled">  
            <?php if(is_array($citylist)): $i = 0; $__LIST__ = $citylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input type='hidden' name="chengshi" value="<?php echo ($citylist[0]["id"]); ?>"><?php endif; ?>
             </td>
          </tr>
           <tr>
            <th width="100">活动门店
            </th>
          <?php if($single == false): ?><td id="thecity">
                                            请选择城市
            </td>
          <?php else: ?>
            <td id="thecity">
              <input type="checkbox" value="<?php echo ($thisstore["id"]); ?>" name="mendian[]" checked="checked" disabled='disabled'>
                  <?php echo ($thisstore["name"]); ?>
              <input type='hidden' name="mendian[]" value="<?php echo ($thisstore["id"]); ?>">
            </td><?php endif; ?>
          </tr>
          <tr>
            <th width="100">礼品库存<span style="color: red;">*</span></th>
            <td><input type="test" name="kucun" class="input" />
              </td>
          </tr>
          <tr>
            <th width="100">礼品介绍</th>
            <td><input type="test" style="width: 500px;" name="description" class="input" id="username">
              </td>
          </tr>
          
          <tr>
            <th width="100">产品详情</th>
            <td>
             <div id='content_tip'></div><script type="text/plain" id="content" name="content"></script>
                <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
                <script type="text/javascript"  src="<?php echo CONFIG_SITEURL_MODEL; ?>statics/js/ueditor/editor_config.js"></script>
                <script type="text/javascript"  src="<?php echo CONFIG_SITEURL_MODEL; ?>statics/js/ueditor/editor_all_min.js"></script>
<script type="text/javascript">
                <?php  $authkey = upload_key("10,,1,,,0"); ?>
    var editorcontent;
                        UE.commands['attachments'] = {
                            execCommand : function(cmd){
                                flashupload('flashupload', '附件上传','content',ueAttachment,'10,,1,,,0','Web','10','<?php echo ($authkey); ?>');
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
    $.post("<?php echo U('Public/mendian');?>",{id:id},function(data){
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
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        <a  href="#" onclick="yulanpage();" >点击预览</a>
      </div>
    </form>
    <script>
		function yulanpage()
		{
			$("#yulan1").val($("input[name=name]").val());
			$("#yulan2").val($("input[name=jifen]").val());
			$("#yulan3").val($("input[name=code]").val());
			$("#yulan4").val($("input[name=thumb]").val());
			$("#yulan5").val($("input[name=description]").val());
			$("#yulan6").val($("textarea[name=content]").val());
			$('#yulanfrom').submit();
		}

    </script>
    <form action="__URL__/yulan" method="post" name="yulanfrom" id="yulanfrom" target="_blank">
    <input type="hidden" name="name" id="yulan1" value="">
    <input type="hidden" name="jifen" id="yulan2" value="">
    <input type="hidden" name="code" id="yulan3" value="">
    <input type="hidden" name="thumb" id="yulan4" value="">
    <input type="hidden" name="description" id="yulan5"  value="">
    <input type="hidden" name="jieshao" id="yulan6" value="">
    </form>
    
</div>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript" src="<?php echo ($config_siteurl); ?>statics/js/content_addtop.js"></script>

</body>
</html>