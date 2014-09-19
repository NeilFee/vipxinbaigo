function ht_getcookie(name) {
	var cookie_start = document.cookie.indexOf(name);
	var cookie_end = document.cookie.indexOf(";", cookie_start);
	return cookie_start == -1 ? '' : unescape(document.cookie.substring(
			cookie_start + name.length + 1,
			(cookie_end > cookie_start ? cookie_end : document.cookie.length)));
}
function ht_setcookie(cookieName, cookieValue, seconds, path, domain, secure) {
	var expires = new Date();
	expires.setTime(expires.getTime() + seconds * 1000);
	document.cookie = escape(cookieName) + '=' + escape(cookieValue)
			+ (expires ? '; expires=' + expires.toGMTString() : '')
			+ (path ? '; path=' + path : '/')
			+ (domain ? '; domain=' + domain : '') + (secure ? '; secure' : '');
}

var array_cities = [];// 国内完整城市列表
var cities_all_in = []; //国内完整城市列表
var cities_all_out = []; //国外完整城市列表
var fav_cities = [];  // 国内常用城市列表
var cities_fav_in = []; // 国内热门城市列表
var cities_fav_out = []; // 国际热门城市列表
var array_cities_filter = [];// 当前搜索结果
var array_cities_showing = [];// 显示中的城市
var sugSelectItem = 0;// 选中项目
var sugSelectItem2 = 0;// 选中项目
var sugSelectTurn = 0;// 显示中选中项的序号
var citySelected = 0;// 选中城市[SHIJIAZHUANG, 石家庄, 1301]
var cityfield_focused = false;// 输入框是否获得焦点
var mousedownOnPanel = false;// 鼠标按在小菜单上
var mousedownOnPanel2 = false;// 鼠标按在大菜单上
var curPageIndex = 0;// 当前分页序号
var curObj = null; // 当前作用对象
var cur = -1;
var liarray_cities1 = [];// 城市列表
var liarray_cities2 = [];
var liarray_cities3 = [];
var liarray_cities4 = [];
var liarray_cities5 = [];
var ularray_cities_showing0 = [];// 显示中的热门城市
var ularray_cities_showing1 = [];// 显示中的城市
var ularray_cities_showing2 = [];// 显示中的城市
var ularray_cities_showing3 = [];// 显示中的城市
var ularray_cities_showing4 = [];// 显示中的城市
var ularray_cities_showing5 = [];// 显示中的城市
var ularray_cities_showing = [];
var isClick = false;
var loadJsFlag = true;
var ulPageSize = 30;// 全部城市大列表中每页显示的城市个数
var nowSelect = 0;// 大列表当前选中对象
var favorite_names_temp = '';
var station_names_temp = '';

var favcityID = ht_getcookie("hj_favcity");
function load_station_names() {
		if (typeof (station_names) != "undefined") {
		array_cities = [];
		liarray_cities1 = [];
		liarray_cities2 = [];
		liarray_cities3 = [];
		liarray_cities4 = [];
		liarray_cities5 = [];
		// 分拆城市信息
		var cities = station_names.split('@');
		for ( var i = 0; i < cities.length; i++) {
			var titem = cities[i];
			var raha = titem.toString().charAt(0);
			
			if (raha == "a" || raha == "b" || raha == "c" || raha == "d" || raha == "e") {
				liarray_cities1.push(titem.split('|'));
			}
			if (raha == "f" || raha == "g" || raha == "h" || raha == "i"
					|| raha == "j") {
				liarray_cities2.push(titem.split('|'));
			}
			if (raha == "k" || raha == "l" || raha == "m" || raha == "n"
					|| raha == "o") {
				liarray_cities3.push(titem.split('|'));
			}
			if (raha == "p" || raha == "q" || raha == "r" || raha == "s"
					|| raha == "t") {
				liarray_cities4.push(titem.split('|'));
			}
			if (raha == "u" || raha == "v" || raha == "w" || raha == "x"
					|| raha == "y" || raha == "z") {
				liarray_cities5.push(titem.split('|'));
			}
	
			if (titem.length > 0) {
				titem = titem.split('|');
				if (favcityID != "" && titem[2] == favcityID) {
					favcity = titem;
					array_cities.unshift(titem);
					// 当fav城市位于第一页时，避免重复显示
					if (i > 6) {
						array_cities.push(titem);
					}
				} else {
					array_cities.push(titem);
				}
			}
		}
		for ( var i = 0; i < array_cities.length; i++) {
			array_cities[i].push(i);
		}
	}
}
//load_station_names();

function load_favorite_names(){
		if (typeof (favorite_names) != "undefined") {
		fav_cities = [];	
		// 分拆城市信息
		var favcities = favorite_names.split('@');
		for ( var i = 0; i < favcities.length; i++) {
			var titem = favcities[i];
			if (titem.length > 0) {
				titem = titem.split('|');
				fav_cities.push(titem);
			}
		}		
		for ( var i = 0; i < fav_cities.length; i++) {
			fav_cities[i].push(i);
		}
	}
}
//load_favorite_names();

// 加载国内城市数据
function load_domestic_cities_data(){
	/*-----------------------------------------------------------------加载国内站点城市数据---------------------------------------------------------------------------*/
	if (typeof (station_names) != "undefined") {
		array_cities = [];
		liarray_cities1 = [];
		liarray_cities2 = [];
		liarray_cities3 = [];
		liarray_cities4 = [];
		liarray_cities5 = [];
		var a_list = [], b_list = [], c_list = [], d_list = [], e_list = [], f_list = [], g_list = [], h_list = [], i_list = [], j_list = [], k_list = [], l_list = [], m_list = [], n_list = [], o_list = [], p_list = [], q_list = [], r_list = [], s_list = [], t_list = [], u_list = [], v_list = [], w_list = [], x_list = [], y_list = [], z_list = [];
		// 分拆城市信息
		var cities = station_names.split('@');
		for ( var i = 0; i < cities.length; i++) {
			var titem = cities[i];
			var raha = titem.toString().charAt(0);
			
			switch (raha) {
			case 'a':
				a_list.push(titem.split('|'));
				break;
			case 'b':
				b_list.push(titem.split('|'));
				break;
			case 'c':
				c_list.push(titem.split('|'));
				break;
			case 'd':
				d_list.push(titem.split('|'));
				break;
			case 'e':
				e_list.push(titem.split('|'));
				break;
			case 'f':
				f_list.push(titem.split('|'));
				break;
			case 'g':
				g_list.push(titem.split('|'));
				break;
			case 'h':
				h_list.push(titem.split('|'));
				break;
			case 'i':
				i_list.push(titem.split('|'));
				break;
			case 'j':
				j_list.push(titem.split('|'));
				break;
			case 'k':
				k_list.push(titem.split('|'));
				break;
			case 'l':
				l_list.push(titem.split('|'));
				break;
			case 'm':
				m_list.push(titem.split('|'));
				break;
			case 'n':
				n_list.push(titem.split('|'));
				break;
			case 'o':
				o_list.push(titem.split('|'));
				break;
			case 'p':
				p_list.push(titem.split('|'));
				break;
			case 'q':
				q_list.push(titem.split('|'));
				break;
			case 'r':
				r_list.push(titem.split('|'));
				break;
			case 's':
				s_list.push(titem.split('|'));
				break;
			case 't':
				t_list.push(titem.split('|'));
				break;
			case 'u':
				u_list.push(titem.split('|'));
				break;
			case 'v':
				v_list.push(titem.split('|'));
				break;
			case 'w':
				w_list.push(titem.split('|'));
				break;
			case 'x':
				x_list.push(titem.split('|'));
				break;
			case 'y':
				y_list.push(titem.split('|'));
				break;
			case 'z':
				z_list.push(titem.split('|'));
				break;
			default:
				break;
			}

			if (titem.length > 0) {
				titem = titem.split('|');
				if (favcityID != "" && titem[2] == favcityID) {
					favcity = titem;
					array_cities.unshift(titem);
					// 当fav城市位于第一页时，避免重复显示
					if (i > 6) {
						array_cities.push(titem);
					}
				} else {
					array_cities.push(titem);
				}
			}
		}
		for ( var i = 0; i < array_cities.length; i++) {
			array_cities[i].push(i);
		}
		liarray_cities1.push(a_list);
		liarray_cities1.push(b_list);
		liarray_cities1.push(c_list);
		liarray_cities1.push(d_list);
		liarray_cities1.push(e_list);
		
		liarray_cities2.push(f_list);
		liarray_cities2.push(g_list);
		liarray_cities2.push(h_list);
		liarray_cities2.push(i_list);
		liarray_cities2.push(j_list);
		
		liarray_cities3.push(k_list);
		liarray_cities3.push(l_list);
		liarray_cities3.push(m_list);
		liarray_cities3.push(n_list);
		liarray_cities3.push(o_list);
		
		liarray_cities4.push(k_list);
		liarray_cities4.push(l_list);
		liarray_cities4.push(m_list);
		liarray_cities4.push(n_list);
		liarray_cities4.push(o_list);
		
		liarray_cities5.push(k_list);
		liarray_cities5.push(l_list);
		liarray_cities5.push(m_list);
		liarray_cities5.push(n_list);
		liarray_cities5.push(o_list);
	}
	/*-----------------------------------------------------------------加载国内热门城市数据---------------------------------------------------------------------------*/
	if (typeof (favorite_names) != "undefined") {
		cities_fav_in = [];	
		// 分拆城市信息
		var favcities = favorite_names.split('@');
		for ( var i = 0; i < favcities.length; i++) {
			var titem = favcities[i];
			if (titem.length > 0) {
				titem = titem.split('|');
				cities_fav_in.push(titem);
			}
		}		
		for ( var i = 0; i < fav_cities.length; i++) {
			cities_fav_in[i].push(i);
		}
	}
}
// 加载国际城市数据
function load_international_cities_data(){
	
}

// 显示给定的城市列表片段
function city_Bind(acitylist) {
	if (acitylist.length == 0)
		return;
	var tHtml = "";
	$.each(acitylist, function(aIndex) {
		if (favcityID == acitylist[aIndex][2])
			tHtml += "<div class='cityline' id='citem_" + aIndex + "' cturn='"
					+ acitylist[aIndex][6] + "'><span class='ralign'><b>"
					+ acitylist[aIndex][1] + "</b></span></div>\n";
		else
			tHtml += "<div class='cityline' id='citem_" + aIndex + "' cturn='"
					+ acitylist[aIndex][6] + "'><span class='ralign'>"
					+ acitylist[aIndex][1] + "</span></div>\n";
	});
	$('#panel_cities').html(tHtml);
	$('.cityline').mouseover(function() {
		city_shiftSelect(this);
	}).click(function() {
		city_confirmSelect();
		// 空条件过滤出所有城市列表
		array_cities_filter = filterCity("");
		city_showlist(0);
	});
	city_shiftSelect($("#citem_0"));
}

// 移动当前选中项
function city_changeSelectIndex(aStep) {
	var asugSelectTurn = sugSelectTurn + aStep;
	if (asugSelectTurn == -1) {
		city_showlist(curPageIndex - 1);
		city_shiftSelect($("#citem_" + (array_cities_showing.length - 1)));
	} else if (asugSelectTurn == array_cities_showing.length) {
		city_showlist(curPageIndex + 1);
		city_shiftSelect($("#citem_0"));
	} else {
		city_shiftSelect($("#citem_" + asugSelectTurn));
	}
}
// 确认选择
function city_confirmSelect() {
	curObj.val(citySelected[1]);
	curObjCode.val(citySelected[2]);
	$("#form_cities").css("display", "none");
	$("#form_cities2").css("display", "none");
	cur = -1;
	sugSelectItem2 = 0;
	setFromStationStyle();
	setToStationStyle();
	if (loadJsFlag) {
		LoadJS(citySelected[2]);
	}
}

// 指定新的选中项，恢复旧项
function city_shiftSelect(atarget) {
	if (sugSelectItem != atarget) {
		if (sugSelectItem != 0)
			$(sugSelectItem).removeClass('citylineover').addClass('cityline')
					.css("backgroundColor", "white");
		if (atarget != 0) {
			try {
				sugSelectItem = atarget;
				var city_j = $(sugSelectItem).removeClass('cityline').addClass(
						'citylineover').css("backgroundColor", "#c8e3fc");
				sugSelectTurn = Number(city_j.attr('id').split("_")[1]);
				citySelected = array_cities[Number(city_j.attr('cturn'))];
				$("#cityid").val(citySelected[2]);
			} catch (e) {
			}
		}
	}
}

// 指定新的选中项，恢复旧项
function city_shiftSelectInLi(atarget) {
	if (sugSelectItem2 != atarget) {
		if (sugSelectItem2 != 0)
			$(sugSelectItem2).removeClass('ac_over').addClass('ac_odd');
		if (atarget != 0) {
			try {
				sugSelectItem2 = atarget;
				var city_j = $(sugSelectItem2).removeClass('ac_odd').addClass(
						'ac_over');
			} catch (e) {
			}
		}
	}
}

function js(el) {
	var i;
	for (i = 1; i <= 6; i++) {
		if (i == el) {
			$("#ul_list" + i).css("display", "block");
			$("#nav_list" + i).addClass("action");
			if (i == 1) {
				$("#flip_cities2").css("display", "none");
			}
			if (i > 1) {
				var totelLength = tHtmlGetCityName(el - 1, -1, 0);
				if (totelLength > ulPageSize) {
					// 取分页数据
					var pagecount = Math.ceil((totelLength + 1) / ulPageSize);
					if (pagecount > 1) {
						pageDesigh(pagecount, 0, i);
					}
					$("#flip_cities2").css("display", "block");
				} else {
					$("#flip_cities2").css("display", "none");
				}
			}
		} else {
			$("#ul_list" + i).css("display", "none");
			$("#nav_list" + i).removeClass("action");
		}
	}
}
/**
 * type：(0：国内、1：国外)
 * nod：(0：热门、1：A-E、2：F-J、3：K-O、4：P-T、5：U-Z)
 * at：(-1：返回数组长度、-2：返回数组内容)
 *
 */
function getCityName(type, nod, at){
	switch (type) {
		case 0:
			switch (nod) {
				case 0:
					if (at == -1) {
						return cities_fav_in.length;
					}
					if (at == -2) {
						return cities_fav_in;
					}
					return cities_fav_in[at];
					break;
				case 1:
					if (at == -1) {
						return liarray_cities1.length;
					}
					if (at == -2) {
						return liarray_cities1;
					}
					return liarray_cities1[at];
					break;
				case 2:
					if (at == -1) {
						return liarray_cities2.length;
					}
					if (at == -2) {
						return liarray_cities2;
					}
					return liarray_cities2[at];
					break;
				case 3:
					if (at == -1) {
						return liarray_cities3.length;
					}
					if (at == -2) {
						return liarray_cities3;
					}
					return liarray_cities3[at];
					break;
				case 4:
					if (at == -1) {
						return liarray_cities4.length;
					}
					if (at == -2) {
						return liarray_cities4;
					}
					return liarray_cities4[at];
					break;
				case 5:
					if (at == -1) {
						return liarray_cities5.length;
					}
					if (at == -2) {
						return liarray_cities5;
					}
					return liarray_cities5[at];
					break;
				default:
					return "error";
					break;
				}
			break;
		case 1:
			if (at == -1) {
				return cities_fav_out.length;
			}
			if (at == -2) {
				return cities_fav_out;
			}
			return cities_fav_out[at];
			break;
		default:
			return "error";
			break;
	}
}

/**
 * nod：(0：热门、1：A-E、2：F-J、3：K-O、4：P-T、5：U-Z)
 * at：(-1：返回数组长度、-2：返回数组内容)
 * aPageNo：(分页)
 *
 */
function tHtmlGetCityName(nod, at, aPageNo) {
	switch (nod) {
	case 0:
		if (at == -1) {
			return fav_cities.length;
		}
		if (at == -2) {
			return fav_cities;
		}
		return fav_cities[at];
		break;
	case 1:
		if (at == -1) {
			return liarray_cities1.length;
		}
		if (at == -2) {
			return liarray_cities1;
		}
		if (liarray_cities1.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities1.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing1 = liarray_cities1.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities1.length));
				return ularray_cities_showing1[at];
			}
		}
		return liarray_cities1[at];
		break;
	case 2:
		if (at == -1) {
			return liarray_cities2.length;
		}
		if (at == -2) {
			return liarray_cities2;
		}
		if (liarray_cities2.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities2.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing2 = liarray_cities2.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities2.length));
				return ularray_cities_showing2[at];
			}
		}
		return liarray_cities2[at];
		break;
	case 3:
		if (at == -1) {
			return liarray_cities3.length;
		}
		if (at == -2) {
			return liarray_cities3;
		}
		if (liarray_cities3.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities3.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing3 = liarray_cities3.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities3.length));
				return ularray_cities_showing3[at];
			}
		}
		return liarray_cities3[at];
		break;
	case 4:
		if (at == -1) {
			return liarray_cities4.length;
		}
		if (at == -2) {
			return liarray_cities4;
		}
		if (liarray_cities4.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities4.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing4 = liarray_cities4.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities4.length));
				return ularray_cities_showing4[at];
			}
		}
		return liarray_cities4[at];
		break;
	case 5:
		if (at == -1) {
			return liarray_cities5.length;
		}
		if (at == -2) {
			return liarray_cities5;
		}
		if (liarray_cities5.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities5.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing5 = liarray_cities5.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities5.length));
				return ularray_cities_showing5[at];
			}
		}
		return liarray_cities5[at];
		break;
	default:
		return "error";
		break;
	}
}

// abroad-------------
function tHtmlGetCityNameAbroad(nod, at, aPageNo) {
	switch (nod) {
	case 0:
		if (at == -1) {
			return fav_cities.length;
		}
		if (at == -2) {
			return fav_cities;
		}
		return fav_cities[at];
		break;
	case 1:
		if (at == -1) {
			return liarray_cities1.length;
		}
		if (at == -2) {
			return liarray_cities1;
		}
		if (liarray_cities1.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities1.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing1 = liarray_cities1.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities1.length));
				return ularray_cities_showing1[at];
			}
		}
		return liarray_cities1[at];
		break;
	case 2:
		if (at == -1) {
			return liarray_cities2.length;
		}
		if (at == -2) {
			return liarray_cities2;
		}
		if (liarray_cities2.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities2.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing2 = liarray_cities2.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities2.length));
				return ularray_cities_showing2[at];
			}
		}
		return liarray_cities2[at];
		break;
	case 3:
		if (at == -1) {
			return liarray_cities3.length;
		}
		if (at == -2) {
			return liarray_cities3;
		}
		if (liarray_cities3.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities3.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing3 = liarray_cities3.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities3.length));
				return ularray_cities_showing3[at];
			}
		}
		return liarray_cities3[at];
		break;
	case 4:
		if (at == -1) {
			return liarray_cities4.length;
		}
		if (at == -2) {
			return liarray_cities4;
		}
		if (liarray_cities4.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities4.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing4 = liarray_cities4.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities4.length));
				return ularray_cities_showing4[at];
			}
		}
		return liarray_cities4[at];
		break;
	case 5:
		if (at == -1) {
			return liarray_cities5.length;
		}
		if (at == -2) {
			return liarray_cities5;
		}
		if (liarray_cities5.length > ulPageSize) {
			// 取分页数据
			var pagecount = Math
					.ceil((liarray_cities5.length + 1) / ulPageSize);
			if (pagecount > 1) {
				ularray_cities_showing5 = liarray_cities5.slice(ulPageSize
						* (aPageNo), Math.min(ulPageSize * (aPageNo + 1),
						liarray_cities5.length));
				return ularray_cities_showing5[at];
			}
		}
		return liarray_cities5[at];
		break;
	default:
		return "error";
		break;
	}
}


function closeShowCity() {
	$("#form_cities2").css("display", "none");
	cur = -1;
	sugSelectItem2 = 0;
	var toCityCn = $("#toCityCn").val();
	var toCityVal = $("#toCityVal").val();
	if (toCityCn == "") {
		$("#toCityCn").val("");
		from_to_station_class_gray($("#toCityCn"));
		$("#toCityVal").val("");
	}
	var toStationText = $("#toStationText").val();
	var toStation = $("#toStation").val();
	if (toStationText == "") {
		$("#toStationText").val("");
		from_to_station_class_gray($("#toStationText"));
		$("#toStation").val("");
	}
}

//显示国内城市
function showDomesticCity(){
	var tHtml = "";
	tHtml = '<div class="com_hotresults" id="thetable" style="width:436px">'
			+ '<div style="width:100%;">'
			+ '<div class="ac_title">'
			+ '<span>'
			+ '可输入汉字或拼音查询'
			+ '</span>'
			+ '<a class="ac_close" title="关闭" onclick="closeShowCity()"></a>'
			+ '</div>'

			+ '<ul class="AbcSearch clx" id="abc">'
			+ '<li class="action" index="1" method="liHotTab"  onclick="js(1)" id="nav_list1">热门城市</li>'
			+ '<li index="2" method="liHotTab"  onclick="js(2)" id="nav_list2">ABCDE</li>'
			+ '<li index="3" method="liHotTab"  onclick="js(3)" id="nav_list3">FGHIJ</li>'
			+ '<li index="4" method="liHotTab"  onclick="js(4)" id="nav_list4">KLMNO</li>'
			+ '<li index="5" method="liHotTab"  onclick="js(5)" id="nav_list5">PQRST</li>'
			+ '<li index="6" method="liHotTab"  onclick="js(6)" id="nav_list6">UVWXYZ</li>'
			+ '</ul>'
			+ '<ul class="popcitylist" style="overflow: auto;max-height: 280px;padding-bottom: 10px;" method="hotData" id="ul_list1">';

	var favTotelLength = getCityName(0, 0, -1);
	for ( var b = 0; b < favTotelLength; b++) {
		tHtml += '<li class="ac_even" style="padding-left: 10px;border:1px red solid;width:10px;" title="' + getCityName(0, 0, b)[1] + '" data="' + getCityName(0, 0, b)[3] + '">' + getCityName(0, 0, b)[1] + '</li>';
	}
	tHtml += '</ul>';

	for ( var a = 2; a <= 6; a++) {
		tHtml += '<ul  class="popcitylist" style="overflow: auto; max-height: 260px; height: 170px;display:none;" id="ul_list' + a + '">';
		tHtml += '</ul>';
	}

	tHtml += '<div id="flip_cities2"> 翻页控制区</div>';
	tHtml += '</div>';
	$('#panel_cities2').html(tHtml);

	$('#thetable').on('click', function() {
		if ($("#form_cities2").css("display") == "block") {
			if (cur == 1) {
				cur == -1;
				//$('#toStationText').select();
			} else if (cur == 0) {
				cur == -1;
				//$('#toCityCn').select();
			}
		}
	});
	$('.ac_even').on('mouseover', function() {
		city_shiftSelectInLi(this);
	}).on('click', function() {
		curObj.val($(this).text());
		curObjCode.val($(this).attr("data"));
		// $("#toCityCn").val($(this).text());
		$("#form_cities2").css("display", "none");
		cur = -1;
		sugSelectItem2 = 0;
		setFromStationStyle();
		setToStationStyle();
		if (loadJsFlag) {
			LoadJS($(this).attr("data"));
		}
	});
	
	$("#flip_cities2").css("display", "none");
	return array_cities;
}

function showAllCity() {
	var tHtml = "";
	tHtml = '<div class="com_hotresults" id="thetable" style="width:436px">'
			+ '<div style="width:100%;">'
			+ '<div class="ac_title">'
			+ '<span>'
			+ '可输入汉字或拼音查询'
			+ '</span>'
			+ '<a class="ac_close" title="关闭" onclick="closeShowCity()"></a>'
			+ '</div>'

			+ '<ul class="AbcSearch clx" id="abc">'
			+ '<li class="action" index="1" method="liHotTab"  onclick="js(1)" id="nav_list1">热门城市</li>'
			+ '<li index="2" method="liHotTab"  onclick="js(2)" id="nav_list2">ABCDE</li>'
			+ '<li index="3" method="liHotTab"  onclick="js(3)" id="nav_list3">FGHIJ</li>'
			+ '<li index="4" method="liHotTab"  onclick="js(4)" id="nav_list4">KLMNO</li>'
			+ '<li index="5" method="liHotTab"  onclick="js(5)" id="nav_list5">PQRST</li>'
			+ '<li index="6" method="liHotTab"  onclick="js(6)" id="nav_list6">UVWXYZ</li>'
			+ '</ul>'

			+ '<ul class="popcitylist" style="overflow: auto;max-height: 280px;padding-bottom: 10px;" method="hotData" id="ul_list1">';
			
	var favTotelLength = tHtmlGetCityName(0, -1, 0);
	for ( var b = 0; b < favTotelLength; b++) {
		tHtml += '<li class="ac_even" title="' + tHtmlGetCityName(0, b, 0)[1]
				+ '" data="' + tHtmlGetCityName(0, b, 0)[3] + '">'
				+ tHtmlGetCityName(0, b, 0)[1] + '</li>';
	}
	tHtml += '</ul>';

	for ( var a = 2; a <= 6; a++) {
		var c = a - 1;
		var totelLength = tHtmlGetCityName(c, -1, 0);
		
		if (totelLength > ulPageSize) {
			// 取分页数据
			var pagecount = Math.ceil((totelLength + 1) / ulPageSize);
			if (pagecount > 1) {
				tHtml += '<ul  class="popcitylist" style="overflow: auto; max-height: 260px; height: 170px;display:none;" id="ul_list' + a + '">';
				pageDesigh(pagecount, 0, a);
			}
			$("#flip_cities2").css("display", "block");
		} else {
			tHtml += '<ul  class="popcitylist" style="overflow: auto; max-height: 260px; height: 191px;display:none;" id="ul_list'
					+ a + '">';
			$("#flip_cities2").css("display", "none");
			for ( var b = 0; b < tHtmlGetCityName(c, -1, 0); b++) {
				tHtml += '<li class="ac_even" title="'
						+ tHtmlGetCityName(c, b, 0)[1] + '" data="'
						+ tHtmlGetCityName(c, b, 0)[3] + '">'
						+ tHtmlGetCityName(c, b, 0)[1] + '</li>';
			}
		}
		tHtml += '</ul>';
	}

	tHtml += '<div id="flip_cities2"> 翻页控制区</div>';
	tHtml += '</div>';
	$('#panel_cities2').html(tHtml);

	$('#thetable').on('click', function() {
		if ($("#form_cities2").css("display") == "block") {
			if (cur == 1) {
				cur == -1;
				//$('#toStationText').select();
			} else if (cur == 0) {
				cur == -1;
				//$('#toCityCn').select();
			}
		}
	});
	$('.ac_even').on('mouseover', function() {
		city_shiftSelectInLi(this);
	}).on('click', function() {
		curObj.val($(this).text());
		curObjCode.val($(this).attr("data"));
		// $("#toCityCn").val($(this).text());
		$("#form_cities2").css("display", "none");
		cur = -1;
		sugSelectItem2 = 0;
		setFromStationStyle();
		setToStationStyle();
		if (loadJsFlag) {
			LoadJS($(this).attr("data"));
		}
	});
	
	$("#flip_cities2").css("display", "none");
	return array_cities;

}

function LoadJS(file) {

	if (((typeof (mm_addjs) != "undefined")) && ('' != mm_addjs)
			&& (mm_addjs == 1)) {
		var head = document.getElementsByTagName('HEAD').item(0);
		var script = document.createElement('SCRIPT');
		script.src = mm_srcjs + file + ".js";
		script.type = "text/javascript";
		head.appendChild(script);
	}
}

function evenClick(evenObj) {
	curObj.val(evenObj.text());
		curObjCode.val(evenObj.attr("data"));
		$("#form_cities2").css("display", "none");
		cur = -1;
		sugSelectItem2 = 0;
		setFromStationStyle();
		setToStationStyle();
		if (loadJsFlag) {
			LoadJS($(this).attr("data"));
		}
}

function pageDesigh(pagecount, aPageNo, idIndex) {
	var ulHtml = "";
	if (pagecount > 1) {
		if (aPageNo == -1)
			aPageNo = (pagecount - 1);
		else if (aPageNo == pagecount)
			aPageNo = 0;
		ularray_cities_showing = tHtmlGetCityName(idIndex - 1, -2, 0).slice(
				ulPageSize * (aPageNo),
				Math.min(ulPageSize * (aPageNo + 1), tHtmlGetCityName(
						idIndex - 1, -2, 0).length));

		for ( var b = 0; b < ularray_cities_showing.length; b++) {
			var show = ularray_cities_showing[b];
			ulHtml += '<li class="ac_even" onClick="javascript:evenClick($(this));" title="' + show[1] + '" data="'
					+ show[2] + '">' + show[1] + '</li>';
		}
		$("#ul_list" + idIndex).html(ulHtml);

		var flipHtml = (aPageNo == 0) ? "&laquo;&nbsp;上一页"
				: "<a    class='cityflip' onclick='pageDesigh(" + pagecount
						+ ',' + (aPageNo - 1) + ',' + idIndex
						+ ");return false;'>&laquo;&nbsp;上一页</a>";
		flipHtml += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";
		flipHtml += (aPageNo == pagecount - 1) ? "下一页&nbsp;&raquo;"
				: "<a    class='cityflip'  onclick='pageDesigh(" + pagecount
						+ "," + (aPageNo + 1) + "," + idIndex
						+ ")'>下一页&nbsp;&raquo;</a>";
		$("#flip_cities2").html(flipHtml);

		if (cur == 1) {
			cur == -1;
			//$('#toStationText').select();
		} else if (cur == 0) {
			cur == -1;
			//$('#toCityCn').select();
		}

	} else {
	}
}

// 搜索符合关键字的城市
function filterCity(aKeyword) {
	if (aKeyword.length == 0) {
		$("#top_cities").html("拼音/汉字或↑↓");
		return array_cities;
	}
	var aList = [];
	var isPinyin = /[^A-z]/.test(aKeyword);
	for ( var i = 0; i < array_cities.length; i++) {
		if (isMatchCity(array_cities[i], aKeyword, isPinyin))
			aList.push(array_cities[i]);
	}
	if (aList.length > 0) {
		$("#top_cities")
				.html("按\"<font color=red>" + aKeyword + "</font>\"检索：");
		return aList;
	} else {
		$("#top_cities").html("无法匹配:<font color=red>" + aKeyword + "</font>");
		return [];
	}
}
function replaceChar(astring, aindex, raha) {
	return astring.substr(0, aindex) + raha
			+ astring.substr(aindex + 1, astring.length - 1);
}
// 判断某城市是否符合搜索条件,只要拼音或中文顺序包含排列关键词字符元素即可
function isMatchCity(aCityInfo, aKey, aisPinyin) {
	var aKey = aKey.toLowerCase();

	var aInfo = [ aCityInfo[4].toLowerCase(), aCityInfo[1],
			aCityInfo[3].toLowerCase() ];
	// aCityInfo [bjb,北京北,VAP,beijing,bjb,0]
	// 是否含有汉字
	var lastIndex = -1;
	var lastIndex_py = -1;
	if (aisPinyin) {
		aKey = aKey.split("");
		for ( var m = 0; m < aKey.length; m++) {
			var newIndex = aInfo[1].indexOf(aKey[m]);
			if (newIndex > lastIndex && newIndex <= m) {// newIndex<=m 即左匹配
				aInfo[1] = replaceChar(aInfo[1], newIndex, "-");
				lastIndex = newIndex;
			} else {
				return false;
			}
		}
	} else { // 处理拼音的
		aKey = aKey.split("");
		var yesOrNoJm = true;// 简码校验
		var yesOrNoPy = true;// 拼音校验

		// 按简码检索
		for ( var m = 0; m < aKey.length; m++) {
			var newIndex = aInfo[0].indexOf(aKey[m]);
			if (newIndex > lastIndex && newIndex <= m) {
				aInfo[0] = replaceChar(aInfo[0], newIndex, "-");
				lastIndex = newIndex;
			} else {
				yesOrNoJm = false;
				break;
			}
		}

		// 按拼音检索
		for ( var m = 0; m < aKey.length; m++) {

			var newIndex_py = aInfo[2].indexOf(aKey[m]);

			if (newIndex_py > lastIndex_py && newIndex_py <= m) {
				aInfo[2] = replaceChar(aInfo[2], newIndex_py, "-");
				lastIndex_py = newIndex_py;
			} else {
				yesOrNoPy = false;
				break;
			}

		}
		if ((yesOrNoJm == false) && (yesOrNoPy == false)) {
			return false;
		}
	}
	return true;
}

// 显示当前城市列表中的指定分页
function city_showlist(aPageNo) {
	if (array_cities_filter.length > 6) {
		// 取分页数据
		var pagecount = Math.ceil((array_cities_filter.length + 1) / 6);
		if (aPageNo == -1)
			aPageNo = (pagecount - 1);
		else if (aPageNo == pagecount)
			aPageNo = 0;
		array_cities_showing = array_cities_filter.slice(6 * (aPageNo), Math
				.min(6 * (aPageNo + 1), array_cities_filter.length));
		city_Bind(array_cities_showing);
		// 翻页控制
		var flipHtml = (aPageNo == 0) ? "&laquo;&nbsp;向前"
				: "<a href='' class='cityflip' onclick='city_showlist("
						+ (aPageNo - 1)
						+ ");return false;'>&laquo;&nbsp;向前</a>";
		flipHtml += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		flipHtml += (aPageNo == pagecount - 1) ? "向后&nbsp;&raquo;"
				: "<a href='' class='cityflip' onclick='city_showlist("
						+ (aPageNo + 1)
						+ ");return false;'>向后&nbsp;&raquo;</a>";

		$("#flip_cities").html(flipHtml);

		$("#flip_cities").css("display", "block");
	} else {
		aPageNo = 0;
		array_cities_showing = array_cities_filter;
		city_Bind(array_cities_showing);
		$("#flip_cities").css("display", "none");
	}
	curPageIndex = aPageNo;
	if ($("#form_cities").css("display") == "block") {
		isClick = true;
		curObj.focus();
	}
}

// 取得显示提示的div,用于在IE6下遮挡下拉框
function fixDivBugInIE6($results) {
	try {
		$results.bgiframe();
		if ($results.width() > $('> ul', $results).width()) {
			$results.css("overflow", "hidden");
		} else {
			$('> iframe.bgiframe', $results).width($('> ul', $results).width());
			$results.css("overflow", "scroll");
		}
		if ($results.height() > $('> ul', $results).height()) {
			$results.css("overflow", "hidden");
		} else {
			$('> iframe.bgiframe', $results).height(
					$('> ul', $results).height());
			$results.css("overflow", "scroll");
		}
	} catch (e) {
	}
}

// 页面初始化
$(document).ready(
		function() {
			// 初始化国内城市数据
			load_domestic_cities_data();
			// 空调间过滤出国内城市列表
			showDomesticCity();
			// 空条件过滤出所有城市列表
			// showAllCity();
			isClick = false;
			fixDivBugInIE6($('#form_cities'));
			fixDivBugInIE6($('#form_cities2'));
			
			// 出发地事件
			$("#fromCityCn").focus(
							function() {
								loadJsFlag = true;
								if (isClick) {
									$("#form_cities2").css("display", "none");
									sugSelectItem2 = 0;
									isClick = false;
									cur = -1;
								} else {
									if (cur == -1) {
										$(".AbcSearch li").removeClass('action');
										$('.popcitylist').css("display", "none");
										$("#ul_list1").css("display", "block");
										$("#flip_cities2").css("display", "none");
										$("#nav_list1").addClass("action");
										$('.ac_even').removeClass('ac_over').addClass('ac_odd');
                    $("#form_cities2").css("display", "block");
									}
								}

								curObj = $("#fromCityCn");
								curObjCode = $("#fromCityVal");
								cur = 0;
								var toCityCn = $("#fromCityCn").val();
								cityfield_focused = true;
								SetISPos($("#fromCityCn"));
							}).blur(function() {
						curObj = $("#fromCityCn");
						curObjCode = $("#fromCityVal");
						cur = 0;
						isClick = false;
						loadJsFlag = true;
						if (!mousedownOnPanel && !mousedownOnPanel2) {
							//clearStation('from', 'blur');

							cityfield_focused = false;
							$("#form_cities").css("display", "none");
							$("#form_cities2").css("display", "none");
							cur = -1;
							sugSelectItem2 = 0;
							// 空条件过滤出所有城市列表
							array_cities_filter = filterCity("");

							city_showlist(0);

							setFromStationStyle();

						}
					}).click(function() {
						//clearStation('from', 'click');
					});

			// 到达地事件
			$("#toCityCn").focus(
							function() {
								loadJsFlag = true;
								if (isClick) {
									$("#form_cities2").css("display", "none");
									sugSelectItem2 = 0;
									isClick = false;
									cur = -1;
								} else {
									if (cur == -1) {
										$(".AbcSearch li").removeClass('action');
										$('.popcitylist').css("display", "none");
										$("#ul_list1").css("display", "block");
										$("#flip_cities2").css("display", "none");
										$("#nav_list1").addClass("action");
										$('.ac_even').removeClass('ac_over').addClass('ac_odd');
                    $("#form_cities2").css("display", "block");
									}
								}

								curObj = $("#toCityCn");
								curObjCode = $("#toCityVal");
								cur = 0;
								var toCityCn = $("#toCityCn").val();
								cityfield_focused = true;
								SetISPos($("#toCityCn"));
							}).blur(function() {
						curObj = $("#toCityCn");
						curObjCode = $("#toCityVal");
						cur = 0;
						isClick = false;
						loadJsFlag = true;
						if (!mousedownOnPanel && !mousedownOnPanel2) {
							//clearStation('from', 'blur');

							cityfield_focused = false;
							$("#form_cities").css("display", "none");
							$("#form_cities2").css("display", "none");
							cur = -1;
							sugSelectItem2 = 0;
							// 空条件过滤出所有城市列表
							array_cities_filter = filterCity("");

							city_showlist(0);

							setFromStationStyle();

						}
					}).click(function() {
						//clearStation('from', 'click');
					});
					
			// 入住城市		
			$("#inCity").focus(
							function() {
								loadJsFlag = true;
								if (isClick) {
									$("#form_cities2").css("display", "none");
									sugSelectItem2 = 0;
									isClick = false;
									cur = -1;
								} else {
									if (cur == -1) {
										$(".AbcSearch li").removeClass('action');
										$('.popcitylist').css("display", "none");
										$("#ul_list1").css("display", "block");
										$("#flip_cities2").css("display", "none");
										$("#nav_list1").addClass("action");
										$('.ac_even').removeClass('ac_over').addClass('ac_odd');
                    $("#form_cities2").css("display", "block");
									}
								}

								curObj = $("#inCity");
								curObjCode = $("#inCityVal");
								cur = 0;
								var toCityCn = $("#inCity").val();
								cityfield_focused = true;
								SetISPos($("#inCity"));
							}).blur(function() {
						curObj = $("#inCity");
						curObjCode = $("#inCityVal");
						cur = 0;
						isClick = false;
						loadJsFlag = true;
						if (!mousedownOnPanel && !mousedownOnPanel2) {
							//clearStation('from', 'blur');

							cityfield_focused = false;
							$("#form_cities").css("display", "none");
							$("#form_cities2").css("display", "none");
							cur = -1;
							sugSelectItem2 = 0;
							// 空条件过滤出所有城市列表
							array_cities_filter = filterCity("");

							city_showlist(0);

							setFromStationStyle();

						}
					}).click(function() {
						//clearStation('from', 'click');
					});	
					
			// 团购城市
			$("#groupCity").focus(
							function() {
								loadJsFlag = true;
								if (isClick) {
									$("#form_cities2").css("display", "none");
									sugSelectItem2 = 0;
									isClick = false;
									cur = -1;
								} else {
									if (cur == -1) {
										$(".AbcSearch li").removeClass('action');
										$('.popcitylist').css("display", "none");
										$("#ul_list1").css("display", "block");
										$("#flip_cities2").css("display", "none");
										$("#nav_list1").addClass("action");
										$('.ac_even').removeClass('ac_over').addClass('ac_odd');
                    $("#form_cities2").css("display", "block");
									}
								}

								curObj = $("#groupCity");
								cur = 0;
								var toCityCn = $("#groupCity").val();
								cityfield_focused = true;
								SetISPos($("#groupCity"));
							}).blur(function() {
						curObj = $("#groupCity");
						cur = 0;
						isClick = false;
						loadJsFlag = true;
						if (!mousedownOnPanel && !mousedownOnPanel2) {
							cityfield_focused = false;
							$("#form_cities").css("display", "none");
							$("#form_cities2").css("display", "none");
							cur = -1;
							sugSelectItem2 = 0;
							// 空条件过滤出所有城市列表
							array_cities_filter = filterCity("");

							city_showlist(0);

							setFromStationStyle();

						}
					}).click(function() {
					});				

			$('#form_cities').mousedown(function() {
				mousedownOnPanel = true;
			}).mouseup(function() {
				mousedownOnPanel = false;
			});

			$('#form_cities2').mousedown(function() {
				mousedownOnPanel2 = true;
			}).mouseup(function() {
				mousedownOnPanel2 = false;
			});
		});

// 判断是否可清除发到站
function clearStation(flag, event) {
	cur = -1;
	if (flag == 'from') {
		var toCityCn = $("#toCityCn").val();
		var toCityVal = $("#toCityVal").val();
		if (toCityCn == "" || toCityVal == '') {
			$("#toCityCn").val('');
			$("#toCityVal").val('');
		} else {
			var join = toCityCn + '|' + toCityVal;
			if (typeof (station_names) != "undefined") {
				if (station_names.indexOf(join) == -1) {
					$("#toCityCn").val('');
					$("#toCityVal").val('');
				} else if ('click' == event) {
					$("#toCityCn").select();
					// $("#toCityVal").val('');
					$("#form_cities2").css("display", "block");
				}
			} else {
				$("#toCityCn").val('');
				$("#toCityVal").val('');
			}
		}
	} else if (flag == 'to') {
		var toStationText = $("#toStationText").val();
		var toStation = $("#toStation").val();
		if (toStationText == "" || toStation == '') {
			$("#toStationText").val('');
			$("#toStation").val('');
		} else {
			var join = toStationText + '|' + toStation;
			if (typeof (station_names) != "undefined") {
				if (station_names.indexOf(join) == -1) {
					$("#toStationText").val('');
					$("#toStation").val('');
				} else if ('click' == event) {
					$("#toStationText").select();
					// $("#toStation").val('');
					$("#form_cities2").css("display", "block");
				}
			}
		}
	}
}

function MapCityID(aCityname) {
	// [Beijing, 北京, 1100]
	for ( var i = 0; i < array_cities.length; i++) {
		if (array_cities[i][1] == aCityname) {
			return array_cities[i][2];
		}
	}
	return 0;
}

function MapCityName(aCidyID) {
	// [Beijing, 北京, 1100]
	for ( var i = 0; i < array_cities.length; i++) {
		if (array_cities[i][2] == aCidyID) {
			return array_cities[i][1];
		}
	}
	return "";
}

function SetISPos(obj) {
	$("#form_cities").css("left", obj.position().left);
	$("#form_cities").css("top", obj.position().top + obj.height() + 3);
	$("#form_cities2").css("left", obj.position().left);
	$("#form_cities2").css("top", obj.position().top + obj.height() + 3);
}

// 事件处理函数
function myHandlerFg(evt) {
	// 判断浏览器
	if (evt == null) {// 是IE
		evt.keyCode = 9;
		// evt = window.event;
		// evt.returnValue=false;//屏蔽IE默认处理
	} else {// 是Firefox
		if (!evt.which && evt.which == 13) {
			// evt.which=9;
			evt.preventDefault();// 屏蔽Firefox默认处理！！！
		} else if (evt.which && evt.keyCode == 13) {
			evt.which = 9;
		}
	}
}

// 事件处理函数// 暂时没用到
function myHandler2(evt) {
	// 判断浏览器
	if (evt == null) {// 是IE
		evt = window.event;
		evt.returnValue = false;// 屏蔽IE默认处理
	} else {// 是Firefox
		if (evt.which && evt.which == 13) {
			// evt.which=9;
			// evt.preventDefault();//屏蔽Firefox默认处理！！！
			// evt.which==13;
			// alert(evt.which);
			var fireOnThis = document.getElementById("Upload_Data3");
			if (document.createEvent) {
				var evObj = document.createEvent('MouseEvents');
				evObj.initEvent('click', true, false);
				fireOnThis.dispatchEvent(evObj);
			} else if (document.createEventObject) {
				fireOnThis.fireEvent('onclick');
			}
		} else if (!evt.which && evt.which == 13) {
			// evt.which=13;
			evt.preventDefault();// 屏蔽Firefox默认处理！！！
		}
	}
}

// 文本框样式：正常样式
function from_to_station_class_plain(obj) {
	obj.removeClass("input_20txt_gray");
	obj.addClass("input_20txt");
}

// 文本框样式：灰色字体
function from_to_station_class_gray(obj) {
	obj.removeClass("input_20txt");
	obj.addClass("input_20txt_gray");
}

// 设置出发地样式
function setFromStationStyle() {
	var fromCityCn = $("#fromCityCn").val();
	var fromCityVal = $("#fromCityVal").val();
	if (fromCityCn == "") {
		$("#fromCityCn").val("");
		from_to_station_class_gray($("#fromCityCn"));
		$("#fromCityVal").val("");
	} else {
		from_to_station_class_plain($("#fromCityCn"));
	}
}

// 设置目的地样式
function setToStationStyle() {
	var toCityCn = $("#toCityCn").val();
	var toCityVal = $("#toCityVal").val();
	if (toCityCn == "") {
		$("#toCityCn").val("");
		from_to_station_class_gray($("#toCityCn"));
		$("#toCityVal").val("");
	} else {
		from_to_station_class_plain($("#toCityCn"));
	}
}
