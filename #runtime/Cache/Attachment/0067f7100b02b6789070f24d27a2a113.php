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
<body class="body_none" style="height:350px;">
<style>
/*上传*/
.eidt_uphoto {
    border: 1px solid #CCCCCC;
}
.eidt_uphoto ul {
    height: 280px;
    overflow-y: scroll;
    padding-bottom: 10px;
    position: relative;
}
.eidt_uphoto li {
    display: inline;
    float: left;
    height: 100px;
    margin: 10px 0 0 10px;
    width: 87px;
}
.eidt_uphoto .invalid {
    background: none repeat scroll 0 0 #FBFBFB;
    border: 1px solid #CCCCCC;
    height: 98px;
    position: relative;
    width: 78px;
}
.eidt_uphoto .invalid .error {
    padding: 30px 1px;
    text-align: center;
}
.eidt_uphoto .no {
    background: url("<?php echo ($config_siteurl); ?>statics/images/icon/upload_pic.jpg") no-repeat scroll center center #FBFBFB;
    border: 1px solid #CCCCCC;
    height: 98px;
    overflow: hidden;
    text-indent: -2000em;
}
.eidt_uphoto .nouplode {
    background: #FBFBFB;
    border: 1px solid #CCCCCC;
    height: 98px;
    overflow: hidden;
	text-align: center;
	padding: 0px 5px 0px 5px;
}
.eidt_uphoto .schedule {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    height: 98px;
    line-height: 98px;
    position: relative;
    text-align: center;
}
.eidt_uphoto .schedule span {
    background: none repeat scroll 0 0 #F0F5F9;
    height: 98px;
    left: 0;
    position: absolute;
    top: 0;
}
.eidt_uphoto .schedule em {
    left: 0;
    position: absolute;
    text-align: center;
    top: 0;
    width: 78px;
    z-index: 1;
}
.eidt_uphoto .get{
	background:#ffffff;
	border:1px solid #cccccc;
	position:relative;
	overflow:hidden;
}
.eidt_uphoto .selected{
	border:2px solid #1D76B7;
}
.eidt_uphoto .get img{
	cursor:pointer;
}
.eidt_uphoto .del{
	position:absolute;
	width:15px;
	height:15px;
	background:url("<?php echo ($config_siteurl); ?>statics/images/icon/upload_del.png") no-repeat;
	right:1px;
	top:1px;
	overflow:hidden;
	text-indent:-2000em;
	display:none;
}
.eidt_uphoto .del:hover{
	background-position:-20px 0;
}
.eidt_uphoto .get img{
	vertical-align:top;
	width:87px;
	height:75px;
	border-bottom:1px solid #ccc;
}
.eidt_uphoto .get input{
	border:0;
	outline:0 none;
	margin-left:3px;
}
.eidt_uphoto .get .edit{
	position:absolute;
	height:22px;
	line-height:22px;
	text-align:center;
	width:78px;
	bottom:0;
	left:0;
	background:#e5e5e5;
	color:#333;
	filter:alpha(opacity=70);
	-moz-opacity:0.7;
	opacity:0.7;
	display:none;
}
.eidt_uphoto li:hover .edit,
.eidt_uphoto li:hover .del{
	/*text-decoration:none;
	display:block;*/
}
/*上传选择按钮*/
#btupload,.addnew{
	background: url("<?php echo ($config_siteurl); ?>statics/js/swfupload/images/swfBnt.png") no-repeat; float:left; margin-right:10px;width:75px; height:28px; line-height:28px;font-weight:700; color:#fff;
}
#btupload{ 
    vertical-align:middle;border:none;cursor: hand;!important;cursor: pointer;
}
.addnew{
	background: url("<?php echo ($config_siteurl); ?>statics/js/swfupload/images/swfBnt.png") no-repeat; float:left; margin-right:10px;width:75px; height:28px; line-height:28px;font-weight:700; color:#fff;
}
.addnew{
	background-position: left bottom;
}
</style>
<div class="">
  <div class="h_a">搜索</div>
  <form method="get" action="<?php echo U("Attachments/album_load");?>">
    <input type="hidden" value="Attachment" name="g">
    <input type="hidden" value="Attachments" name="m">
    <input type="hidden" value="album_load" name="a">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 名称：
        <input type="text" class="input length_2" name="filename" style="width:200px;" value="<?php echo ($_GET['filename']); ?>" placeholder="请输入文件名...">
        日期：
        <input type="text" name="uploadtime" class="input length_2 J_date" value="<?php echo ($_GET['uploadtime']); ?>" style="width:80px;">
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form>
  <div class="eidt_uphoto">
    <ul  style="height: 200px;" id="fsUploadProgress">
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="uploaded">
          <div class="get" id="aid-<?php echo ($vo["aid"]); ?>"> <a class="del" href="javascript:;">删除</a> <img onClick="album_cancel(this,'<?php echo ($vo["aid"]); ?>','<?php echo ($vo["filepath"]); ?>')" width="87" height="98" src="<?php echo ($vo["filepath"]); ?>" data-id="<?php echo ($vo["aid"]); ?>" data-path="<?php echo ($vo["filepath"]); ?>" alt="<?php echo ($vo["filename"]); ?>" title="<?php echo ($vo["filename"]); ?>">
            <input type="text" class="J_file_desc" name="flashatt[<?php echo ($vo["aid"]); ?>]" value="<?php echo ($vo["filename"]); ?>" style="width:68px">
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="p10"><div class="pages"> <?php echo ($Page); ?> </div> </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
<script type="text/javascript">
$(document).ready(function(){
	set_status_empty();
});	
function set_status_empty(){
	parent.window.$('#att-status').html('');
	parent.window.$('#att-name').html('');
}
function album_cancel(obj,id,source){
	var src = $(obj).attr("data-path");
	var filename = $(obj).attr("title");
	//选择状态中的数据对象
	var selected = $("#fsUploadProgress .selected");
	if($("#aid-"+id).hasClass('selected')){
		$("#aid-"+id).removeClass("selected");
		selected = $("#fsUploadProgress .selected");
		var imgstr = parent.window.$("#att-status").html();
		var length = selected.children("img").length;
		var strs = filenames = '';
		$.get(GV.DIMAUB+'index.php?a=swfupload_json_del&m=Attachments&g=Attachment&aid='+id+'&src='+source+'&filename='+filename);
		for(var i=0;i<length;i++){
			strs += '|'+selected.children("img").eq(i).attr('path');
			filenames += '|'+selected.children("img").eq(i).attr('title');
		}
		parent.window.$('#att-status').html(strs);
		parent.window.$('#att-name').html(filenames);
	} else {
		var num = parent.window.$('#att-status').html().split('|').length;
		var file_upload_limit = '<?php echo ($file_upload_limit); ?>';
		if(num > file_upload_limit) {alert('不能选择超过'+file_upload_limit+'个附件'); return false;}
		$("#aid-"+id).addClass("selected");
		$.get(GV.DIMAUB+'index.php?a=swfupload_json&m=Attachments&g=Attachment&aid='+id+'&src='+source+'&filename='+filename);
		parent.window.$('#att-status').append('|'+src);
		parent.window.$('#att-name').append('|'+filename);
	}
}
</script>
</body>
</html>