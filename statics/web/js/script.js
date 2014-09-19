//load jQuery in noConflict mode, just in case of Prototype/other jQuery versions are being used
//jQuery.noConflict();

//jQuery(document).ready(function() {
var roundaboutLoaded = false;
$(window).load(function() {
	$(".roundabout_outer").show();
	$("ul.roundabout").roundabout({
		responsive: true
	});
	roundaboutLoaded = true;
	$(window).resize();
});

// Magazine page setup
$(window).ready(function() {
	var setupMagazineImg = function() {
		var h = 220;
		$(".media_magazines li .img").each(function() {
			if (h < $(this).outerHeight())
				h = $(this).outerHeight();
		});		
		$(".media_magazines li .img").css({
			height : h + "px"
		});
	};
	var setupMagazineTxt = function() {
		var h = 0;
		$(".media_magazines li p").each(function() {
			if (h < $(this).height())
				h = $(this).height();
		});
		$(".media_magazines li p").css({
			height : h + "px"
		});
	};
	setupMagazineImg();
	setupMagazineTxt();
	
	var $popupmsg = $("#popupmsg");
	if ($popupmsg.length > 0) {
		$("#popuplink").fancybox({
			maxWidth	: 800,
			maxHeight: 600,
			fitToView	: true,
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'none',
			margin: [60,20,20,20]			
		});
		$popupmsg.delay(1000).show(function() {
			$("#popuplink").click();
		});
	}
});


$(document).ready(function() {
	var nwds_init = function() {		
		/* Time Line listing bullets */
		$(".timeline_listing > ul > li > h6").click(function() {
			//$(this).text("abc");
			var $li = $(this).parent(),
				$detail = $(this).parent().find(".detail");
			if ($li.hasClass("on")) {
				$detail.stop().slideUp(300, function() {
					$li.removeClass("on");
				});
			} else {
				$detail.stop().slideDown(300, function() {
					$li.addClass("on");
				});
			}
		});
		
		$(".nwds-mobile-menu-toggle").click(function() {
			var w = $(window).width() - 70;
			if ($("body").hasClass("nwds-menu-open")) {
				$("body").removeClass("nwds-menu-open");
				$("body").css({left: 0});	
				$(".nwds-main-nav").css({width: w+"px", left: "-"+w+"px"});
			} else {
				$("body").addClass("nwds-menu-open");
				$(".nwds-main-nav").css({width: w+"px", left: "0px"});
				$("body").css({left: w+"px"});
			}
		});
		
		$(".table_nav  .off").click(function(e) {
			e.preventDefault();
		});
		
		$(".table_nav > div").click(function() {
			if ($(this).hasClass("on")) {
				//hide 
				$(this).find("ul").stop(true,true).slideUp(300);
				$(this).removeClass("on");
			} else {
				// show
				$(this).find("ul").stop(true,true).slideDown(300);
				$(this).addClass("on");
			}
		});
		
		$(".nwds-page-development .smallpad a").click(function(e) {
			e.preventDefault();
			var $p = $(this).parent().parent().parent().find(".lImg");
			$p.find("a").attr("href", $(this).attr("href")).attr("title", $(this).attr("title"));
			$p.find("img").attr("src", $(this).find("img").attr("src")).attr("title", $(this).attr("title")).attr("alt", $(this).attr("alt"));
			$(".nwds-page-development .smallpad li").removeClass("on");
			$(this).parent().addClass("on");
		});
		
		$(".nwds-page-development .smallpad2 a").click(function(e) {
			e.preventDefault();
			var $p = $(this).parent().parent().find(".lImg");
			$p.find("img").attr("src", $(this).attr("href")).attr("title", $(this).find("img").attr("title"));
			$(".nwds-page-development .smallpad2 .smallpad2_item").removeClass("on");
			$(this).addClass("on");
		});
		
		/* Mobile search icon */
		$("#mobile_search_btn").click(function(e) {
			e.preventDefault();
			mobile_search_btn(!$(this).hasClass("on"));
		});
		var mobile_search_btn = function(status) {		
			var $btn = $("#mobile_search_btn"),
				$img = $btn.find("img"),
				$form = $(".nwds-search-form");
			if (!status) {
				$btn.removeClass("on");
				$img.attr("src", $img.attr("src").replace("h_mo.png","h.png"));			
				$form.hide();
			} else {
				$btn.addClass("on");
				$img.attr("src", $img.attr("src").replace("h.png","h_mo.png"));
				$form.show();
			}
		};
		
		/* submenu */
		if ($("html").hasClass("touch")) {
			$(".nwds-top-bar > ul > li > a").click(function(e) {
				if (Modernizr.mq('only screen and (min-width: 768px)')) {
					var $li = $(this).parent();
					e.preventDefault();
					if (!$li.hasClass("hover")) {
						$li.addClass("hover");
					}
				}
			});
		}
		$(".nwds-top-bar > ul > li > a").hover(function() {
			if (Modernizr.mq('only screen and (min-width: 768px)') || ($("html").hasClass("lt-ie9") && $(window).outerWidth() >= 768)) {
				var $li = $(this).parent();
				//$li.addClass("hover");
				$li.find(".nwds-top-bar-sub").stop(true,true).slideDown(300);
			}
		});		
		$topbarlis = $(".nwds-top-bar > ul > li");
		$topbarlis.each(function() {
			var el = $(this);
			//console.log(el);
			$("a", el).focus(function() {
				console.log("focus ");
				$topbarlis.removeClass("hover");
				el.addClass("hover");				
				//$(this).parents("li").addClass("focus_hover");
			}).blur(function() {
				//if (el.find("a:focus").width > 0)
					//el.removeClass("hover");
				//$(this).parents("li").removeClass("focus_hover");
			});
			$("a", el).focusout(function() {				
				setTimeout($.proxy(function() {
					var target = document.activeElement;
					console.log(target);
					if (target !== null) {
						if (el.has(target).length === 0) {
							el.removeClass("hover");	
							console.log("focus out");
						}
					}
				}, this), 1);
			});
			
		});
		
		$(".nwds-top-bar > ul > li").hover(function() {			
			$(".nwds-top-bar > ul > li").removeClass("hover");	
		}, function() {
			if (Modernizr.mq('only screen and (min-width: 768px)') || ($("html").hasClass("lt-ie9") && $(window).outerWidth() >= 768)) {
				$(this).find(".nwds-top-bar-sub").stop(true,true).slideUp(300);
				//$(this).removeClass("hover");
			}
		});
				
		$(".list_style_3 .title").click(function() {
			var $li = $(this).parent(),
				$c = $li.find(".content");
			if ($li.hasClass("on")) {			
				$c.slideUp(500, function() {
					$li.removeClass("on");
					$(window).resize();
				});
			} else {
				$c.slideDown(500, function() {
					$li.addClass("on");		
					$(window).resize();		
				});
			}
		});
		
		$(".datepicker").datepicker();
		
		var totalSliderSlides = $('#slider img').length;
		$('#slider').nivoSlider({
			controlNav: true,
			controlNavThumbs: true,
			directionNav: false,
			afterLoad: function() {
				$("#slider").append("<div class='slidenum'>1/"+totalSliderSlides+"</div>");
			},
			afterChange: function() {
				var currentSlide = $('#slider').data('nivo:vars').currentSlide + 1;
				$("#slider .slidenum").text(currentSlide + "/" + totalSliderSlides);
			}
		});		
		if ($("#slider").length > 0)
			$('#slider').data('nivoslider').stop();
		
		$(".fitVid").fitVids();
	
		
		$(".map .points > div").each(function() {
			var x = $(this).attr("data-x"),
				y = $(this).attr("data-y");
				// x = x / 790 * 100;
				// y = y / 420 * 100;
			$(this).css({left: x + "%", top: y + "%"});	
		});												
		
		$(".map .places a").hover(function() {
			var c = $(this).attr("id");
			$(".map .points ."+c).addClass("hover");
		}, function() {
			var c = $(this).attr("id");
			$(".map .points ."+c).removeClass("hover");
		});
			
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '80%',
			height		: '80%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'none',
			margin: [60,20,20,20]
		});
		
		$(".fancyboxmap").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '80%',
			height		: '80%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'none',
			margin: [60,20,20,20],
			afterLoad: function(c,p) {
				init_gmap();
			}
		});
		
		$(".fancybox").fancybox({
			margin: [60,20,20,20],
			height 	: '40%',
			maxHeight	: 600
		});
							
		var $videobox = $("#videobox");
		if ($videobox.length > 0) {
			// var ogv = $videobox.attr("data-ogv"),
				// mp4 = $videobox.attr("data-mp4"),
				// webm = $videobox.attr("data-webm");
			projekktor('#player_a', {
				// poster: 'media/intro.png',
				// title: '',
				height: 400,
				width: 640,
				playerFlashMP4: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf',
				playerFlashMP3: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf'
				// playlist: [
					// {
						// 0: {src: ogv, type: "video/ogg"},
						// 1: {src: mp4, type: "video/mp4"},
						// 2: {src: webm, type: "video/webm"}
					// }
				// ]    
			}, function(player) {
				// on ready
			});
		}
		
		var $videoPlayer = $("#videoPlayer");
		if ($videoPlayer.length > 0) {
			projekktor('#videoPlayer', {
				// poster: 'media/intro.png',
				// title: '',
				playerFlashMP4: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf',
				playerFlashMP3: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf'
				// playlist: [
					// {
						// 0: {src: ogv, type: "video/ogg"},
						// 1: {src: mp4, type: "video/mp4"},
						// 2: {src: webm, type: "video/webm"}
					// }
				// ]    
			}, function(player) {
				// on ready
			});
			
			$(".video_link").click(function(e) {
				e.preventDefault();
				var ogv = $(this).attr("data-ogv"),
					mp4 = $(this).attr("data-mp4"),
					webm = $(this).attr("data-webm");
				$("#playerBox").html("").html('<video id="videoPlayer" height="370" style="width: 100%;" class="projekktor" controls>' +
						'<source src="'+ogv+'" type="video/ogg" />'+
						'<source src="'+mp4+'" type="video/mp4" />'+
						'<source src="'+webm+'" type="video/webm" />'+
					'</video>');
				projekktor('#videoPlayer', {
					// poster: 'media/intro.png',
					// title: '',
					autoplay: true,
					playerFlashMP4: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf',
					playerFlashMP3: contentUrl + '/css/projekktor/swf/StrobeMediaPlayback/StrobeMediaPlayback.swf'
					// playlist: [
						// {
							// 0: {src: ogv, type: "video/ogg"},
							// 1: {src: mp4, type: "video/mp4"},
							// 2: {src: webm, type: "video/webm"}
						// }
					// ]    
				}, function(player) {
					// on ready
				});
				/*
				$(".fitVid").html("").html('<iframe height="370" width="100%" frameborder=0 src="http://player.youku.com/embed/'+video_id+'"></iframe>');
				$(".fitVid").fitVids();
				*/
				$(".featured .mce h2").text($(this).find(".mce p").text());
				$(".featured .mce .detail").html($(this).find(".detail").html());
				$(".featured").animatedScroll();
				if ($(this).parent().hasClass("recommended")) {
					$(".featured").addClass("recommended");
				} else {
					$(".featured").removeClass("recommended");
				}
			});			
		}
		
		$(".fancybox_video").fancybox({
			margin: [60,20,20,20],
			padding: 0,
			scrolling: 'no'
		});
			
		$(".tab_row a").click(function(e) {
			e.preventDefault();
			if (!$(this).hasClass("on")) {
				var id = $(this).attr("id");
				$(".tab_row a.on").removeClass("on");
				$(this).addClass("on");
				$(".content_box.on").removeClass("on");
				$(".content_box."+id).addClass("on");
			}
		});		
		
		// Enews form		
		var enews_form_submitting=false;
		$(".nwds-form_enews").submit(function() {
			if (!enews_form_submitting) {
				enews_form_submitting = true;
				$(this).find(".err").text("");				
				$.post( 
					$(this).attr("action"), 
					$(this).serialize(),
					function(r) {
						//console.log(r);
						if (r.status == "0") {
							//console.log($(".nwds-form-ajax .err"));
							for (var i = 0; i < r.err.length; i++) {
								$(".nwds-form_enews .err").append(r.err[i] + "<br />");
							}
						} else {
							$(".nwds-form2")[0].reset();		
							alert(enews_success_msg);
						}
						enews_form_submitting = false;
					},
					"json"
				);
			}
			return false;
		});
		
		var form_submitting=false;
		$(".nwds-form-ajax").submit(function() {
			if (!form_submitting) {
				form_submitting = true;
				$(this).find(".err").text("");				
				$.post( 
					$(this).attr("action"), 
					$(this).serialize(),
					function(r) {
						//console.log(r);
						if (r.status == "0") {
							//console.log($(".nwds-form-ajax .err"));
							for (var i = 0; i < r.err.length; i++) {
								$(".nwds-form-ajax .err").append(r.err[i] + "<br />");
							}
							$(".nwds-form-ajax .err").animatedScroll();
						} else {
							$(".nwds-form")[0].reset();					
							$(".nwds-top-bar").animatedScroll();
							alert(form_success_msg);
						}
						form_submitting = false;
					},
					"json"
				);
			}
			return false;
		});
		
		$(".nwds-form .reset").click(function(e) {
			e.preventDefault();
			$(".nwds-form")[0].reset();
		});
		
		$(".hasOver").hover(function() {
			$(this).attr("src", $(this).attr("src").replace(".png", "_over.png").replace(".jpg", "_over.jpg"));
		}, function() {			
			$(this).attr("src", $(this).attr("src").replace("_over", ""));
		});
		
		if ($(".nwds-page-about_us-structure").length > 0) {
			$("#about_us_img_1").fadeIn(750);
			$("#about_us_img_2").delay(500).fadeIn(750);
			$("#about_us_img_3").delay(800).fadeIn(750);
			$("#about_us_img_4").delay(1000).fadeIn(750);
			$("#about_us_img_5").delay(1200).fadeIn(750);
			$(".footnotes").delay(1400).fadeIn(750, function() {
				$(window).resize();
			});
		}		
		
		$(".nwds-title_box").append("<span></span>");
		$(".nwds-left_bar").append("<span class='wbg'></span>");
		
		
		$(".nwds-page-core_business-vip-member .cards a").click(function(e) {
			e.preventDefault();
			var id = $(this).attr("data-id"),
				$on = $(".nwds-page-core_business-vip-member .cards a.on"),
				animate = true;
			if ($on.length > 0) 
				animate = false;
			$on.removeClass("on");
			$(this).addClass("on");
			if (animate) {
				$("#card_"+id).slideDown(300, function() {
					$(window).resize();
				});			
			} else {
				$(".card_boxes > div").hide();
				$("#card_"+id).show();		
				$(window).resize();	
			}
		});
		
		// About Us image map
		if ($("html").hasClass("lt-ie9")) {
			// special ie8 treatment...
			$(".imgmap a").fancybox({
				width: 618,
				minWidth: 618,
				autoResize: false,
				autoHeight: true,
				autoWidth: false,
				margin: [60,20,20,20]
			});
		} else {			
			$(".imgmap a").fancybox({
				maxWidth: 618,
				margin: [60,20,20,20]
			});
		}
		
		var $reports_bxslider = $('.reports_bxslider');
		if ($reports_bxslider.length > 0) {		
			var rbxslider = $reports_bxslider.bxSlider({
					controls : false,
					pager: false,
					auto: false,
					infiniteLoop: false,
					onSliderLoad:  function() {
						$reports_bxslider.find("ul").css({ opacity: 1});
					},
					onSlideAfter: function(a,b,c) {
						if (parseInt(c)+1 == rbxslider.getSlideCount()) 
							$("#bx_next").hide();
						else
							$("#bx_next").show();
							
						if (c == 0) 
							$("#bx_prev").hide();
						else
							$("#bx_prev").show();
							
						$("#bx_paging a.on").removeClass("on");
						$("#bx_paging #bx_page_"+c).addClass("on");
					}
				});
			$("#bx_prev").click(function(e) {
				e.preventDefault();
				rbxslider.goToPrevSlide();
			});
			$("#bx_next").click(function(e) {
				e.preventDefault();
				rbxslider.goToNextSlide();
			});
			$("#bx_paging a").click(function(e) {
				e.preventDefault();
				rbxslider.goToSlide($(this).attr("data-id"));
			});
		}
		
		
		$('.bxslider').bxSlider({
			controls : false,
			auto: true
		});
		// $(".nwds-home-bottom_banner_img").cycle();
		// $(".nwds-home_press_release > div").cycle({
			// slides: ".m_item"
		// });
		
		/* On resize window */
		$(window).resize(function() {	
			var window_width = $(window).width() - 80;
			//if ($(window).width() < 768) {
						
			$(".timeline_overview td.l, .timeline_overview td.r").css({
				width: (($(".timeline_overview").width() / 2) - 4) + "px"
			});				
			var timeline_row_counter = 1;
			$(".timeline_overview td.r li").css({
				"margin-bottom" : "20px"
			});
			$(".timeline_overview td.r li").each(function() {
				var offset = $(this).offset(),
					$leftObj = $(".timeline_overview td.l li:nth-child("+timeline_row_counter+")"),
					$lastObj = $(".timeline_overview td.r li:nth-child("+(timeline_row_counter - 1)+")"),
					offsetL = $leftObj.offset();
								
				if (offsetL.top > offset.top) {
					$lastObj.css({
						"margin-bottom" : (offsetL.top - offset.top + 40) + "px"
					});
				}
				timeline_row_counter++;
			});
			
			if (Modernizr.mq('only screen and (max-width: 767px)') || ($("html").hasClass("lt-ie9") && $(window).outerWidth() < 768)) {
				// Mobile 
				// resize logo 
				var m_top = (60 - $(".nwds-logo").height()) / 2;			
				$(".nwds-logo").css({"padding-top": m_top});	
				
				if (!$("body").hasClass("nwds-menu-open")) {
					$("body").css({left: 0});	
					$(".nwds-main-nav").css({width: window_width + "px", left: "-" + window_width + "px"});
				} else {
					$(".nwds-main-nav").css({width: window_width + "px", left: "0px"});
					$("body").css({left: window_width + "px"});
				}
				
				$(".nwds-mobile_title > div.small-12").css({height: $(".nwds-mobile_title > div.small-8").height() + "px"});
				
				$(".nwds-left_bar, .resizeH").css({height: "auto"});
				
				$(".box_left .partnership_network_2_box_inner").css({height: "auto"});
				
				$(".section-container .content").css({
					height: "auto"
				});
				
				var footer_a_h = 0;
				//$("footer .nwds-mobile-top-links li a").each()
			} else {
				// Desktop
				// resize logo 
				$(".nwds-logo").css({"padding-top": "25px"});
				
				$("body").css({left: 0});	
				$(".nwds-main-nav").css({width: "100%", left: 0});
				$("body").removeClass("nwds-menu-open");
				mobile_search_btn(false);
				
				var contentH = $(".nwds-content").outerHeight(),
					left_barH = $(".nwds-title_box").outerHeight() + $(".nwds-sub-nav").outerHeight();
				if (left_barH > contentH)
					$(".nwds-left_bar, .resizeH").css({height: left_barH + "px"});
				else
					$(".nwds-left_bar, .resizeH").css({height: contentH + "px"});
								
				$(".box_left .partnership_network_2_box_inner").css({
					height: $(".box_right .partnership_network_2_box_inner").outerHeight() + "px"
				});
				
				var secH;
				$(".section-container").each(function() {
					if (!$(this).hasClass("no-resize")) {
						secH = 0;
						$(this).find(".content").css({
							height: "auto"
						});
						$(this).find(".content").each(function() {
							if ($(this).height() > secH)
								secH = $(this).height();
						});
						$(this).find(".content").css({
							height: secH+"px"
						});
					}
				});
			}		
			
			if (roundaboutLoaded)
				$("ul.roundabout").roundabout("relayoutChildren");
			
			$(".large_banner").fadeIn(1500);
			
			$(".table_style_4 .open_btn a").click(function(e) {
				e.preventDefault();
				if ($(this).hasClass("on")) {
					$(this).removeClass("on");
					$(this).parent().parent().parent().find(".additional div").slideUp(300, function() {
						$(this).parent().parent().hide();
					});
				} else {
					$(this).addClass("on");
					$(this).parent().parent().parent().find(".additional").show().find("div").slideDown(300);
				}
			});
			
			var nivoH = $(".nivoSlider").outerHeight();
			//console.log(nivoH);
			$(".slider-wrapper").css({
				height : nivoH + "px"
			});
			$(".theme-light .nivo-controlNav.nivo-thumbs-enabled").css({
				height : nivoH + "px"
			});			
			
			
		});		
		$(window).resize();
	};
	
	jQuery(document).foundation(function(r) { 
		nwds_init(); 
	});	
});
