<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新世界百货VIP会员网站-快乐出行</title>
	<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
		<!--[if lte IE 7]>
<script>window.location.href='http://www.microsoft.com/china/windows/internet-explorer/';</script>
</script>
<![endif]-->
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/media-nwd.css">
	<script src="{$config_siteurl}statics/web/js/respond.min.js"></script>
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/style.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/nwd.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/jd.css">
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/web/css/slider.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/layer.css">
	<script src="{$config_siteurl}statics/web/js/jquery.min.js"></script>
    
    <!--携程所所需头文件-->
    <link rel="stylesheet" href="{$config_siteurl}statics/web/css/tab.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/lrtk_ctrip.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/calendar.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/web/css/m_listcity.css" >
    <link rel="stylesheet" href="{$config_siteurl}statics/web/css/hotCity.css" >
	<script type="text/javascript" src="{$config_siteurl}statics/web/js/calendar.js" ></script>  
	<script type="text/javascript" src="{$config_siteurl}statics/web/js/calendar-zh.js" ></script>
	<script type="text/javascript" src="{$config_siteurl}statics/web/js/calendar-setup.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/web/js/city-data-domestic.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/web/js/city-data-international.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/web/js/getHotCity.js"></script>
    <!--携程所所需头文件-->

	<script type="text/javascript">
		$(document).ready(function(){			
			$('.navigation li').hover(
				function () {
					$('ul', this).fadeIn();
				}, 
				function () {
					$('ul', this).fadeOut();
				}
			);
			
			/*
			$(".dw-nav").mouseover(function() {
				$(this).find('a').addClass('chosen');
				$(this).find('.nav-bar').stop().show();	
				});
			$(".dw-nav").mouseleave(function() {
				$(this).find('a').removeClass('chosen');
			$(this).find('.nav-bar').stop().hide();
				});
			$(".detail-nav-last-nav-li").mouseover(function() {
				$(this).find('a').addClass('chosen-last');
				$(this).find('.nav-bar').stop().show();	
				});
			$(".detail-nav-last-nav-li").mouseleave(function() {
				$(this).find('a').removeClass('chosen-last');
			$(this).find('.nav-bar').stop().hide();
				});
			*/
			$('#tx-weixin').hover(function() {
				$('.qr-code').show();
			}, function() {
				$('.qr-code').hide();
			});
			$('.mid-tab').find('.zx').mouseover(function () {
				$(this).css('border-bottom-color','#a48f65');
				$(this).find('a').css('color','#a48f65');
				$('.rq').find('a').css('color','#383e54');
				$('.jf').find('a').css('color','#383e54');
				$('.rq').css('border-bottom-color','#383e54');
				$('.jf').css('border-bottom-color','#383e54');
				$('.zx-ct').show();
				$('.rq-ct').hide();
				$('.jf-ct').hide();
			});
			$('.mid-tab').find('.rq').mouseover(function () {
				$(this).css('border-bottom-color','#a48f65');
				$(this).find('a').css('color','#a48f65');
				$('.zx').find('a').css('color','#383e54');
				$('.jf').find('a').css('color','#383e54');
				$('.zx').css('border-bottom-color','#383e54');
				$('.jf').css('border-bottom-color','#383e54');
				$('.zx-ct').hide();
				$('.rq-ct').show();
				$('.jf-ct').hide();
			});
			$('.mid-tab').find('.jf').mouseover(function () {
				$(this).css('border-bottom-color','#a48f65');
				$(this).find('a').css('color','#a48f65');
				$('.rq').find('a').css('color','#383e54');
				$('.zx').find('a').css('color','#383e54');
				$('.rq').css('border-bottom-color','#383e54');
				$('.zx').css('border-bottom-color','#383e54');
				$('.zx-ct').hide();
				$('.rq-ct').hide();
				$('.jf-ct').show();
			});
		})
	</script>
		<script>
		$(document).ready(function() {
			$('#zx-n1').click(function() {
				$(this).addClass('cur');
				$('#zx-n2').removeClass('cur');
				$('#zx-n3').removeClass('cur');
				$('#zx-box-1').show();
				$('#zx-box-2').hide();
				$('#zx-box-3').hide();
			});
			$('#zx-n2').click(function() {
				$(this).addClass('cur');
				$('#zx-n1').removeClass('cur');
				$('#zx-n3').removeClass('cur');
				$('#zx-box-1').hide();
				$('#zx-box-2').show();
				$('#zx-box-3').hide();
			});
			$('#zx-n3').click(function() {
				$(this).addClass('cur');
				$('#zx-n1').removeClass('cur');
				$('#zx-n2').removeClass('cur');
				$('#zx-box-1').hide();
				$('#zx-box-2').hide();
				$('#zx-box-3').show();
			});

			$('#jf-n1').click(function() {
				$(this).addClass('cur');
				$('#jf-n2').removeClass('cur');
				$('#jf-n3').removeClass('cur');
				$('#jf-box-1').show();
				$('#jf-box-2').hide();
				$('#jf-box-3').hide();
			});
			$('#jf-n2').click(function() {
				$(this).addClass('cur');
				$('#jf-n1').removeClass('cur');
				$('#jf-n3').removeClass('cur');
				$('#jf-box-1').hide();
				$('#jf-box-2').show();
				$('#jf-box-3').hide();
			});
			$('#jf-n3').click(function() {
				$(this).addClass('cur');
				$('#jf-n1').removeClass('cur');
				$('#jf-n2').removeClass('cur');
				$('#jf-box-1').hide();
				$('#jf-box-2').hide();
				$('#jf-box-3').show();
			});
			$('#rq-n1').click(function() {
				$(this).addClass('cur');
				$('#rq-n2').removeClass('cur');
				$('#rq-n3').removeClass('cur');
				$('#rq-box-1').show();
				$('#rq-box-2').hide();
				$('#rq-box-3').hide();
			});
			$('#rq-n2').click(function() {
				$(this).addClass('cur');
				$('#rq-n1').removeClass('cur');
				$('#rq-n3').removeClass('cur');
				$('#rq-box-1').hide();
				$('#rq-box-2').show();
				$('#rq-box-3').hide();
			});
			$('#rq-n3').click(function() {
				$(this).addClass('cur');
				$('#rq-n1').removeClass('cur');
				$('#rq-n2').removeClass('cur');
				$('#rq-box-1').hide();
				$('#rq-box-2').hide();
				$('#rq-box-3').show();
			});
		});
		</script>
    <script type="text/javascript">
		//浮动框
		function openDialogOne(){
			$(".h_close").click();
			$('#lightone').layer();
		}
		function openDialogTwo(){
			$(".h_close").click();
			$('#lighttwo').layer();
		}
		//tab切换
		function setTab(m,n){
			var menu=document.getElementById("tab"+m).getElementsByTagName("li");  
			var showdiv=document.getElementById("tablist"+m).getElementsByTagName("div");  
			for(i=0;i<menu.length;i++)
			{
			   menu[i].className=i==n?"now":""; 
			   showdiv[i].style.display=i==n?"block":"none"; 
			}
			if(n==0){
				//切换到机票查询
			   $("#ordertype").val("flight");
			   $("#fromCityCn").val("");
			   $("#toCityCn").val("");
			   $("#EntTime2").val("");					
			   $("#imgjf").attr("src", "/statics/web/img/newindex/icon_money.jpg");
			}else if(n==1){
				//切换到酒店查询
			   $("#ordertype").val("hotel");
			   $("#inCity").val("");
			   $("#EntTime").val("");
			   $("#EntTime3").val("");
			   $("#imgjf").attr("src", "/statics/web/img/newindex/icon_money1.jpg");
			}else if(n==2){
				//切换到团购查询
			   $("#ordertype").val("groupon");
			   $("#groupCity").val("");
			   $("#imgjf").attr("src", "/statics/web/img/newindex/icon_money.jpg");
			}else if(n==3){
				//切换到度假查询
			   $("#ordertype").val("travel");
			   $("#fromArea").val("");
			   $("#toAreaCn").val("");
			   $("#imgjf").attr("src", "/statics/web/img/newindex/icon_money3.jpg");
			}
		}
		//表单验证
		<?php
		$user=session("user");
		$vipcode = $user['vipcode'];
		?>
		function checkorder(){
			var ordertype = $("#ordertype").val();
			var cardNum = '{$vipcode}';
			//var cardNum = '1234';
			if(cardNum==null || cardNum=="") {
			   layer.use('/statics/web/js/layer.ext.js'); //载入拓展模块
				$.layer({
					type : 2,
					title : '会员登录',
					iframe : {src : '/index.php/Index/login'},
					area : ['600px' , '320px'],
					offset : ['100px','']
				});
			   return;
			}
			if($("#isok").prop("checked")==false){
				   alert("请确认并同意相关活动条款！");
				   
				   return
			};
			if(ordertype=='flight') {
			   //校验字段
			   if($("#fromCityCn").val()==null || $.trim($("#fromCityCn").val())==''){
				   alert("出发城市不能为空！");
				   $("#fromCityCn").focus();
				   return
			   }
			   var StartCity = encodeURIComponent(encodeURIComponent($("#fromCityCn").val()));
			   if($("#toCityCn").val()==null || $.trim($("#toCityCn").val())==''){
				   alert("到达城市不能为空！");
				   $("#toCityCn").focus();
				   return
			   }
			   var DestCity = encodeURIComponent(encodeURIComponent($("#toCityCn").val()));
			   if($("#EntTime2").val()==null || $.trim($("#EntTime2").val())==''){
				   alert("出发时间不能为空！");
				   $("#EntTime2").focus();
				   $("#EntTime2").click();
				   return
			   }
			   var DepartDate = $("#EntTime2").val();
			   var FlightType = $('input[name="FlightType"]:checked').val();
			   //var ReturnDate = $("#EntTime4").val();
			   
			   /*if(FlightType=='21' && (ReturnDate==null || $.trim(ReturnDate)=='')) {
				   alert("购买国际机票返回日期不能为空！");
				   return;
			   }*/
			   
			   //国内国际机票链接
			   var planeurl = "http://u.ctrip.com/union/CtripRedirect.aspx?TypeID="+FlightType+"&FlightWay=0&StartCity="+StartCity+"&DestCity="+DestCity+"&DepartDate="+DepartDate+"&sid=455955&allianceid=22185&ouid="+cardNum;	 			   
			   window.open(planeurl,"_blank");
			}else if(ordertype=='hotel'){
			   var inCity = encodeURIComponent(encodeURIComponent($("#inCity").val()));
			   var inCityVal = $("#inCityVal").val();
			   //alert(inCityVal);
			   var CheckInDate = $("#EntTime").val();
			   var CheckOutDate = $("#EntTime3").val();
			   var hotelType = $('input[name="hotelType"]:checked').val();
			   
			   if(inCity==null || inCity=='') {
				   alert("入住城市不能为空！");
				   $("#inCity").focus();
				   return;
			   }
			   if(CheckInDate==null || CheckInDate=='') {
				   alert("入住日期不能为空！");
				   $("#EntTime").focus();
				   $("#EntTime").click();
				   return;
			   }
			   if(CheckOutDate==null || CheckOutDate=='') {
				   alert("退房日期不能为空！");
				   $("#EntTime3").focus();
				   $("#EntTime3").click();
				   return;
			   }
			   
			   var hotelurl = "http://u.ctrip.com/union/CtripRedirect.aspx?TypeID="+hotelType+"&CityName="+inCity+"&CityID="+inCityVal+"&CheckInDate="+CheckInDate+"&CheckOutDate="+CheckOutDate+"&Starts=&Room=&MinPirce=&MaxPirce=&sid=455955&allianceid=22185&ouid="+cardNum;
							   
			   if(hotelType=='273') {
				   hotelurl = "http://u.ctrip.com/union/CtripRedirect.aspx?TypeID="+hotelType+"&CheckInDate="+CheckInDate+"&CheckOutDate="+CheckOutDate+"&CityID="+inCityVal+"&RoomNumber=&ViewType=&Star=&MinPrice=&MaxPrice=&OrderBy=&OrderType=&Page=&KeyOne=&KeyTwo=&sid=455955&allianceid=22185&ouid="+cardNum;
			   }
			   
			   window.open(hotelurl,"_blank");
			}else if(ordertype=='groupon'){
			   var groupCity = encodeURIComponent(encodeURIComponent($("#groupCity").val()));
			   if(groupCity==null || groupCity=='') {
				   alert("团购城市不能为空！");
				   $("#groupCity").focus();
				   return;
			   }
			   var grouponurl = "http://u.ctrip.com/union/CtripRedirect.aspx?TypeID=50&CityName="+groupCity+"&AllianceID=22185&SID=455955&ouid="+cardNum;
			   window.open(grouponurl,"_blank");
			}else if(ordertype=='travel'){
			   var fromArea = encodeURIComponent(encodeURIComponent($("#fromArea").val()));
			   var toAreaCn = encodeURIComponent(encodeURIComponent($("#toAreaCn").val()));
			   if(fromArea==null || fromArea=='') {
				   alert("出发地不能为空！");
				   $("#fromArea").focus();
				   return;
			   }
			   if(toAreaCn==null || toAreaCn=='') {
				   alert("目的地不能为空！");
				   $("#toAreaCn").focus();
				   return;
			   }
			   var travelurl = "http://u.ctrip.com/union/CtripRedirect.aspx?TypeID=30&StartCity="+fromArea+"&SearchValue="+toAreaCn+"&Channel=1&CurrentTab=126&sid=455955&allianceid=22185&ouid="+cardNum;
			   window.open(travelurl,"_blank");
			}				 
		}
		//加载国际数据
		function changeAbroad() {
			//favorite_names_temp = favorite_names;
			//station_names_temp = station_names;
			//favorite_names = favorite_abroad_names;
			//station_names = station_abroad_names;
			
			//load_favorite_names();
			//load_station_names();
			
			//showAllCity();
			showInternationalCity();
			if($("#ordertype").val()=='flight') {
				//机票初始
				$("#fromCityCn").val("");
				$("#toCityCn").val("");
				$("#EntTime2").val("");
				$("#fromCityCn").focus();
			}else if($("#ordertype").val()=='hotel'){
				//国外酒店初始
				$("#inCity").val("");
				$("#EntTime").val("");
				$("#EntTime3").val("");
				$("#inCity").focus();
			}
			
		}
		//加载国内数据
		function changeMainland() {
			showDomesticCity();
			if($("#ordertype").val()=='flight') {
				//机票初始
				$("#fromCityCn").val("");
				$("#toCityCn").val("");
				$("#EntTime2").val("");
				$("#fromCityCn").focus();
			}else if($("#ordertype").val()=='hotel'){
				//国外酒店初始
				$("#inCity").val("");
				$("#EntTime").val("");
				$("#EntTime3").val("");
				$("#inCity").focus();
			}
			//if(favorite_names_temp!='' && station_names_temp!='') {
				//favorite_names = favorite_names_temp;
				//station_names = station_names_temp;
			  
				//load_favorite_names();
				//load_station_names();
			
				//showAllCity();
			//}				
		}
		</script>
        <script>
		//层漂浮
		$.fn.layer = function(){
			var isIE = (document.all) ? true : false;
			var isIE6 = isIE && !window.XMLHttpRequest;
			var position = !isIE6 ? "fixed" : "absolute";
			var containerBox = jQuery(this);
			
				containerBox.css({"z-index":"9999","display":"block","position":position ,"top":"50%","left":"50%","margin-top": -(containerBox.height()/2)+ "px","margin-left": -(containerBox.width()/2) + "px"});
			var layer=jQuery("<div></div>");

				layer.css({"width":"100%","height":"100%","position":position,"top":"0px","left":"0px","background-color":"#000","z-index":"9998","opacity":"0.6"});
			jQuery("body").append(layer);
			function layer_iestyle(){
				var maxWidth = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth) + "px";
				var maxHeight = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) + "px";
				layer.css({"width" : maxWidth , "height" : maxHeight });
			}
			function containerBox_iestyle(){
				var marginTop = jQuery(document).scrollTop - containerBox.height()/ 2 + "px";
				var marginLeft = jQuery(document).scrollLeft - containerBox.width()/ 2 + "px";
				containerBox.css({"margin-top" : marginTop , "margin-left" : marginLeft });
			}
			if(isIE){
				layer.css("filter","alpha(opacity=60)");
			}
			if(isIE6){
				layer_iestyle();
				containerBox_iestyle();
			}
			jQuery("window").resize(function(){
				layer_iestyle();
			});
		
			layer.click(function(){
				containerBox.hide();
				jQuery(this).remove();
			});
		
			$(".h_close").click(function(){
				containerBox.hide();
				layer.remove();
			});
		};
	</script>
	<script src="{$config_siteurl}statics/web/js/layer.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="side-bar">
		<div class="side-top">快捷<br>菜单</div>
		<a href="{:U('Help/contact')}"class="side-each"><div class="side-ol-sv"></div><span>联系我们</span></a>
		<a href="{:U('Newday/index')}" class="side-each"><div class="side-ac-nw"></div><span>活动资讯</span></a>
		<a href="{:U('Jifen/index')}" class="side-each"><div class="side-md-gf"></div><span style="margin-top:3px;">礼品兑换</span></a>
		<a href="http://weibo.com/xinshijiebaihuo" class="side-each"><div class="side-sn-wb"></div><span>微博</span></a>
		<a href="" class="side-each" id="tx-weixin"><div class="side-tx-wb"></div><span>微信</span></a>
		<a id="roll_top" href="javascript:;" class="side-top" style="background: #444; color: #fff;height:30px;">TOP</a>
	    <div class="qr-code"></div>
	</div>
	<div class="bd-l"></div>
	<div class="bd-r"></div>
		<div class="top">
			<div class="top-l">
				<div class="logo">
					<a href="__ROOT__/"><img src="{$config_siteurl}statics/web/img/logo.png" alt=""></a>
				</div>
				<div class="vip-add">
					<img src="{$config_siteurl}statics/web/img/vip-ct.png" alt="">
					<div class="address">
					<i><img src="{$config_siteurl}statics/web/img/icon-loc.png" alt=""></i>
						<a class="pop-loc" href="">{$country}</a>
						&nbsp;&nbsp;&nbsp;
						<a class="pop-loc" style="color:#999" href="">[切换地址]</a>
					</div>
				</div>
			</div>
			<div class="top-r">
				<div class="top-tel">
				<i class="icon-tel"><img src="{$config_siteurl}statics/web/img/icon-tel.png" alt=""></i>
					<span class="tel-num">400-810-7666</span>
					<span class="tel-date">周一至周五9:00-18:00</span>
				</div>
				<div class="top-nav">
				<if condition="$_SESSION['user']">
				<a href="{:U('Member/index')}" style="margin-right:5px;width: 165px;height: auto;border: 1px solid #f6f4ef;background: #f6f4ef;border-radius: 89px;padding-top: 1px;">
						<i class="top-log-i"></i><span><span style="display:inline-block">{$member_user.surname}</span> | <span style="display:inline-block;color:#E20000;">会员中心</span></span>
						<a class="log-out" href="{:U("Index/logout",array("id"=>$r['id']))}">[退出]</a>
					</a>
				<else/>
					<a class="vip-login" href=""><i class="top-log-i"></i><span>会员登录</span></a>
				</if>
					<a href="http://www.xinbaigo.com/" target="_blank"><i class="top-ofcl-i"></i><span>新世界百货官网</span></a>
					<a href="http://buy.xinbaigo.com/" target="_blank"><i class="top-newbg-i"></i><span>新百购</span></a>
				</div>
			</div>
		</div>
		<div class="banner">
			<ul class="nav navigation">
				<li>
					<a href="__ROOT__/">首&nbsp;&nbsp;页</a>
				</li>
				<li class="dw-nav">
					<a  href="{:U('Newday/index')}">每天一点新</a>
					<ul class="nav-bar2">
						<li><a href="{:U('Newday/index')}">会员活动</a></li>
						<li><a href="{:U('Newday/daynews')}">最新资讯</a></li>
                        <li class="xb"></li>
					</ul>
                    <!--
					<div class="nav-bar">
						<a href="{:U('Newday/index')}">会员活动</a>
						<a href="{:U('Newday/daynews')}">最新资讯</a>
					</div>
                    -->
				</li>
				<li>
					<a href="{:U('Cumulative/index')}">累积积分</a>
				</li>
				<li>
					<a href="{:U('Jifen/index')}" class="cur">积分兑换</a>
				</li>
				<li class="dw-nav">
					<a href="{:U('Cooperation/index')}">合作伙伴</a>
					<ul class="nav-bar2">
						<li><a href="{:U('Cooperation/index')}">合作品牌</a></li>
						<li><a href="{:U('Cooperation/merchant')}">联盟商户</a></li>
                        <li class="xb"></li>
					</ul>
                    <!--
					<div class="nav-bar">
						<a href="{:U('Cooperation/index')}">合作品牌</a>
						<a href="{:U('Cooperation/merchant')}">联盟商户</a>
					</div>
                    -->
				</li>
				<li class="detail-nav-last-nav-li">
					<a class="detail-nav-last-nav" href="{:U('About/index')}">关于我们</a>
					<ul class="nav-bar2">
						<li><a href="{:U('About/creditplan')}">奖励计划</a></li>
						<li><a href="{:U('About/bevip')}">成为会员</a></li>
						<li><a href="{:U('About/viprights')}">会员权益</a></li>
						<li><a href="{:U('About/index')}">零售网络</a></li>
                        <li class="xb"></li>
					</ul>
                    <!--
					<div class="nav-bar">
						<a href="{:U('About/creditplan')}">奖励计划</a>
						<a href="{:U('About/bevip')}">成为会员</a>
						<a href="{:U('About/viprights')}">会员权益</a>
						<a href="{:U('About/index')}">零售网络</a>
					</div>
                    -->
				</li>
			</ul>
			<div id="wowslider-container1">
           		<div class="ws_images">
					<ul>
						<li>
							<a target="_blank" href="/index.php?m=activities"><img src="{$config_siteurl}statics/web/img/newindex/top.jpg" alt="" title="" id="wows1_0" width="980" height="375" /></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
			<div class="mid">
			<div style="float:left;height:890px;width:745px">
					<table style="width:745px;" cellpadding="0" cellspacing="0">
						<tr>
							<td style="width: 10px; height: 10px;background:url('{$config_siteurl}statics/web/img/newindex/LT.jpg') no-repeat;"></td>
							<td style="height:10px;background:url('{$config_siteurl}statics/web/img/newindex/Topline.jpg') repeat-x;"></td>
							<td style="width: 10px; height: 10px;background:url('{$config_siteurl}statics/web/img/newindex/RT.jpg') no-repeat;"></td>
						</tr>
						<tr>
							<td style="height:10px;background:url('{$config_siteurl}statics/web/img/newindex/Leftline.jpg') repeat-y;">&nbsp;</td>
							<td style="padding:20px;font-family:'Microsoft Yahei',Verdana;font-size:14px;">
							<div style="font-family:'Microsoft Yahei',Verdana;font-size:14px;line-height:22px;">　　现在会员通过本网站快乐出行预定酒店、机票、团购等携程出行产品就能赚取积分了，连同门店购物消费积分,更快兑换现金券或其他精美礼品！<br />　　11月30日前成功订单及完成旅程后,均可抽取免单资格，订单越多，出行免单几率越大！总计3个免单名额，马上下单，快乐出行！</div>
							<div style="padding:20px 0 20px 0;">
								<div style="float:left;width:6px;height:19px;background-color:#a48f65;display:inline;"></div>
								<div style="width:100px;height:19px;margin-left:20px;color:#a48f65;font-size:18px;">活动流程</div>
							</div>
							<div><img src="{$config_siteurl}statics/web/img/newindex/activity_flow1.jpg" width="662" alt=""></div>
							<div style="padding:20px 0 20px 0;">
								<div style="float:left;width:6px;height:19px;background-color:#a48f65;display:inline;"></div>
								<div style="width:150px;height:19px;margin-left:20px;color:#a48f65;font-size:18px;">积分获取规则</div>
							</div>
							<div class="integral_rule">
								<table>
									<thead><tr> <th>订单类型</th> <th>积分累积</th> </tr></thead>
									<tbody>
										<tr> <td class="title">*酒店</td> <td>1元=2分</td> </tr>
										<tr> <td class="title">机票</td> <td>4元=1分</td> </tr>
										<tr> <td class="title">团购</td> <td>4元=1分</td> </tr>
										<tr> <td class="title">度假</td> <td>1元=1分</td> </tr>
									</tbody>
								</table>
								<p>* 可累计积分之酒店单间夜最高消费为600元；消费超过600元，将以600元计。</p>
								<p>* 积分累积比例视订单类型而定，若出现非整数情况,相应的百货积分取整数发放。</p>
							</div>
							<div style="padding-top:20px;text-align:center;">
								<a id="various1" style="display: inline-block; width: 200px; height: 45px; background-color: #a48f65; font:bold 18px/45px 'Microsoft YaHei'; color: #fff;" href="http://vip.xinbaigo.com/index.php?m=activities#inline1" onClick="openDialogOne()">查看活动规则</a>　　　　　
								<a id="various2" style="display: inline-block; width: 200px; height: 45px; background-color: #a48f65; font:bold 18px/45px 'Microsoft YaHei'; color: #fff;" href="http://vip.xinbaigo.com/index.php?m=activities#inline2" onClick="openDialogTwo()">积分获取说明</a>
							</div>
							</td>
							<td style="height:10px;background:url('{$config_siteurl}statics/web/img/newindex/Rightline.jpg') repeat-y;">&nbsp;</td>
						</tr>
						<tr>
							<td style="width: 10px; height: 10px;background:url('{$config_siteurl}statics/web/img/newindex/LB.jpg') no-repeat;">&nbsp;</td>
							<td style="height:10px;background:url('{$config_siteurl}statics/web/img/newindex/Bottomline.jpg') repeat-x;">&nbsp;</td>
							<td style="width: 10px; height: 10px;background:url('{$config_siteurl}statics/web/img/newindex/RB.jpg') no-repeat;">&nbsp;</td>
						</tr>
					</table>
				</div>
			<!-- 添加携程-->
				<div style="background-image:url('{$config_siteurl}statics/web/img/newindex/002.jpg');float: right;width: 210px;height: 395px;">
					<div style="height:275px;">
					    <div style="width:210px; margin-top:65px;">
					    	<div id="tab1">
								<ul>
									<li onMouseOver="setTab(1,0)" class="now" style="width:45px;">机票</li>
									<li onMouseOver="setTab(1,1)" class="" style="width:45px;">酒店</li>
									<li onMouseOver="setTab(1,2)" class="" style="width:45px;">团购</li>
									<li onMouseOver="setTab(1,3)" class="" style="width:45px;">度假</li>
								</ul>
							</div>
							<div id="tablist1">
								<div class="tablist block" style="display: block;">
										<ul>			
											<li style="display:none;"><input type="hidden" id="ordertype" value="flight"></li>
											<li style="text-align:center;"><input type="radio" checked="checked" value="20" name="FlightType" id="FlightTypeIn" onClick="javascript:changeMainland();">&nbsp;<label for="FlightTypeIn">国内机票</label>&nbsp;&nbsp;<input type="radio" value="21" name="FlightType" id="FlightTypeOut" onClick="javascript:changeAbroad();">&nbsp;<label for="FlightTypeOut">国际机票</label></li>
											<li style="height: 12px"></li>
											<li>&nbsp;出发城市：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" id="fromCityCn" name="fromCityCn" class="input_20txt_gray"><input type="hidden" name="fromCityVal" value="" id="fromCityVal"></li>
											<li style="height: 8px"></li>
											<li>&nbsp;到达城市：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" id="toCityCn" name="toCityCn"><input type="hidden" name="toCityVal" value="" id="toCityVal"></li>
											<li style="height: 8px"></li>
											<li>&nbsp;出发日期：<input style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" type="text" id="EntTime2" name="EntTime2" onClick="return showCalendar('EntTime2', 'y-mm-dd');"></li>
											
										</ul>
								</div>
								<div class="tablist" style="display: none;">
									
									<ul>
										<li style="display:none"><input type="hidden" id="dcity"> </li>
										<li style="text-align:center;"><input type="radio" value="10" checked="checked" name="hotelType" id="hotelTypeIn" onClick="javascript:changeMainland();">&nbsp;<label for="hotelTypeIn">国内酒店</label>&nbsp;&nbsp;<input type="radio" value="273" name="hotelType" id="hotelTypeOut" onClick="javascript:changeAbroad();">&nbsp;<label for="hotelTypeOut">国际酒店</label></li>
										<li style="height: 12px"></li>
										<li>&nbsp;入住城市：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" name="inCity" id="inCity"><input type="hidden" name="inCityVal" value="" id="inCityVal"></li>
										<li style="height: 8px"></li>
										<li>&nbsp;入住日期：<input style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" type="text" id="EntTime" name="EntTime" onClick="return showCalendar('EntTime', 'y-mm-dd');"></li>
										<li style="height: 8px"></li>
										<li>&nbsp;退房日期：<input style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" type="text" id="EntTime3" name="EntTime3" onClick="return showCalendar('EntTime3', 'y-mm-dd');">
									</ul>
								</div>
								<div class="tablist" style="display: none;">
									<ul>
										<li style="height:8px"></li>
										<li>&nbsp;团购城市：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" name="groupCity" id="groupCity"></li>
									</ul>
							  </div>
							  <div class="tablist" style="display: none;">
									<ul>
										<li>&nbsp;出发地：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;padding-left:4px;" id="fromArea" name="fromArea" class="input_20txt_gray"><input type="hidden" name="fromAreaVal" value="" id="fromAreaVal"></li>
										<li style="height: 8px"></li>
										<li>&nbsp;目的地：<input type="text" style="width:120px;height:25px;border:2px solid #dfdbd6;;padding-left:4px;" id="toAreaCn" name="toAreaCn"><input type="hidden" name="toAreaVal" value="" id="toAreaVal"></li>
									</ul>
							  </div>
							  <div class="agree_btn">
							  		<div class="icon_money"><img id="imgjf" src='{$config_siteurl}statics/web/img/newindex/icon_money.jpg' /></div>
							  		<label style=" text-decoration:underline"><input type="checkbox" value="1"  style="position:relative; top:2px;" id="isok" name="isok"  />&nbsp;<a id="various1" onClick="openDialogOne()">我同意相关活动条款</a></label></li>
									<a class="book" onClick="javascript:checkorder();">立即预定</a>
							  </div>
							</div>
					    </div>
				    </div>				
				</div>
			<!-- 添加携程-->
				<div style="clear:both;"></div>
			</div>
			<div class="bd-b"></div>
		</div>
<div style="top: 0; left: 0; z-index: 1000; POSITION: absolute;">
		<div id='form_cities'>
			<div id='top_cities'>操作提示</div>
			<div id='panel_cities'></div>
			<div id='flip_cities'>翻页控制区</div> 
		</div>
	</div>
	<div style="top: 0; left: 0; z-index: 2000; POSITION: absolute;">
		<div id='form_cities2'>
			<div id='panel_cities2'></div>
	
		</div>
	</div>
    <div id="lightone" class="white_contentone" style="display: none;">
      <div class="h_close" style="display:inline-block; width:29px; height:30px; float: right; padding-top: 5px;cursor: pointer;"
>
					<img src="{$config_siteurl}statics/web/img/newindex/closebtn.jpg" width="29" height="30" alt="" style="float: right; padding-top: 5px;cursor: hand;"></div>
			<div id="inline1" class="ctripdiv">
			<h1>"你出行 我买单"活动条款</h1>
			<h2>参与资格</h2>
			<p>本次活动仅限新世界百货/上海巴黎春天VIP会员参与。非新世界百货/上海巴黎春天会员须注册成为会员方可参与本次活动。<a target="_blank" href="/index.php?m=About">详情请咨询门店。&gt;&gt;</a></p>
			<h2>活动时间</h2>
			<p>成功订购及完成旅程时间：9月15日至11月30日</p>
		
        	<h2>活动奖品</h2>
			<p>3份免单奖励</p>
            
			<h2>活动机制与奖品规则</h2>
			<p>1)预定出行产品</p>
			<p>所有通过新世界百货/巴黎春天会员网站<a href="/index.php?m=activities">【快乐出行预定专区】</a>下单并完成旅程的成功订单，在完成旅程后的次月月底将获得新世界百货/巴黎春天会员积分。</p>
			<p>2)活动抽奖</p>
			<p>根据活动期间实际完成旅程订单情况，活动参与会员将在2015年1月中旬受邀前往 “你出行 我买单”活动网站专区抽奖。有效订单数量越多，可以抽奖的次数越多。受邀会员应在收到邀请后1周内前往活动网站进行抽奖。未在指定时间内抽奖的会员，将作弃权处理。活动期间总计将有3份订单获得免单奖励。</p>
			<p>3）获得奖品</p>
			<p>免单的订单将给予订单金额返还（除税费以及其他附加费用以外），且返款金额最多不超过人民币5,000元；若订单金额超过人民币5,000元，返款金额以人民币5,000元计。返款将以新世界百货N-card的形式发放给获奖会员。</p>
			<h2>奖品领取</h2>
			<p>获奖名单将于2015年1月底在本网站公布。我们将通过电话的方式联系获奖会员前往选定门店领取奖品。获奖会员须在收到领奖通知之日起的两周内领取奖品。逾期者视为弃权，奖品不作发放。</p>
      <p style="text-align:right;"><a id="various" style="display: inline-block;  font: 14px 'Microsoft YaHei';  color: #a48f65;" onClick="openDialogTwo()">积分获取说明>></a></p>
			</div>
</div>
<div id="lighttwo" class="white_contenttwo" style="display: none; height:620px; overflow:scroll;
">
     <div class="h_close" style="display:inline-block; width:29px; height:30px; float: right; padding-top: 5px;cursor: pointer;"
>
				<img src="{$config_siteurl}statics/web/img/newindex/closebtn.jpg" width="29" height="30" alt="" style="float: right; padding-top: 5px;cursor: hand;" ></div>
		<div id="inline2" class="ctripdiv">
		<h1>快乐出行积分获取说明</h1>
		<h2>如何获得新世界百货/上海巴黎春天积分</h2>
		<p style="text-align:center;"><img src="{$config_siteurl}statics/web/img/newindex/on04.jpg"/></p>
		<h2>积分规则</h2>
		<p style="text-align:center;"><img src="{$config_siteurl}statics/web/img/newindex/on03.jpg"/></p>
        <p>* 可累计积分之酒店单间夜最高消费为600元；消费超过600元，将以600元计。</p>
		<p>* 积分累积比例视订单类型而定，若出现非整数情况,相应的百货积分取整数发放。</p>
		<h2>注意事项</h2>
		<p>1.新世界百货/上海巴黎春天VIP会员须通过本网站首页<a href="/index.php?m=activities" style="border-bottom:solid 1px gray;">[快乐出行预定专区]</a>下单并成功完成旅程后，才能累积新世界百货/上海巴黎春天会员积分</p>
		<p>2.成功订购及完成旅程是指会员以在线方式预定携程出行产品，按约定时间入住酒店或登机，且结清全部费用款项的订单。成功订购及完成旅程的订单方可获得累积新世</p><p>&nbsp;&nbsp;&nbsp;界百货/巴黎春天会员积分</p>
		<!--p>3.所有订单不可同时累积携程积分</p-->
		<p>3.积分累积仅限每个订单净销售额，即订单总额扣除税费以及其他附加费用</p>
		<p>　　a.机票订单仅限通过本网站<a href="/index.php?m=activities" style="border-bottom:solid 1px gray;">[快乐出行预定专区]</a>预定并实际购买所产生的订单成交总额不包括退票、儿童票、婴儿票（不含保险、税金、机场建设费、燃油附加费和</p><p>　　　配送费）</p>
		<p>　　b.酒店订单金额仅限酒店的入住费用，不含餐饮、娱乐、酒水、通讯及政府税金等其他费用。酒店单间夜积分可累积上限为600元，若酒店订单每间夜金额超过600</p><p>　　　元，则以600元计。</p>
		<p>　　c.团购产品积分以实际订单成交金额为准</p>
		<p>4.积分将在成功订购并完成旅程后的次月月底前计入您的新世界百货/巴黎春天会员账户内。</p>
		<p>5.有关预定、积分相关问题，请致电会员服务热线400-810-7666；有关携程出行产品相关问题，座机免费拨打800-820-6666；手机拨打1010-6666 </p>	
		<p>6.本网站上发布的所有旅游类产品（含酒店、机票和团购）均由携程网提供，新世界百货会员中心对产品不做任何担保及承诺。若您预订的旅游产品出现任何问题，请直</p><p>　接联系携程网。</p>
    <p style="text-align:right;"><a id="various" style="display: inline-block;  font: 14px 'Microsoft YaHei';  color: #a48f65;" onClick="openDialogOne()">查看活动规则>></a></p>
		</div>
</div>		
<include file="Public:foot"/>
		

	