setTimeout(console.log.bind(console, "%c¡Detente!", "font-family:Helvetica, Arial, sans-serif; font-weight: bold; color: red; font-size: 45px; padding-top:10px;padding-bottom:10px;"));
setTimeout(console.log.bind(console, "%cEsta función del navegador está pensada para desarrolladores. Si alguien te indicó que copiaras y pegaras algo aquí para habilitar una función de sistemahostin o para hackear la cuenta de alguien, se trata de un fraude. Si lo haces, esta persona podrá acceder a tu cuenta.", "font-family: Helvetica, Arial, sans-serif; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
setTimeout(console.log.bind(console, "%cPara obtener más información, consulta https://sistemahosting.com/", "font-family:Helvetica, Arial, sans-serif; font-weight: normal; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));

var i = 0;
var idl=i++;
function media_revice() {
	var headers = document.querySelector(".header").offsetHeight;
	var menufooter = document.querySelector(".system_curl_v_box_conten_lui").offsetHeight;
	var footer_sf = document.querySelector(".footer_").offsetHeight;
	var darp = document.getElementById("current_pl");
	darp.innerHTML = ":root{--header-height:"+headers+"px;--footer-menu-height:"+menufooter+"px;--footer-height:"+footer_sf+"px;}";
}

var css = media_revice,
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');
    head.appendChild(style);
    style.type = 'text/css';
    style.id = "current_pl"
		if (style.styleSheet){
		  style.styleSheet.cssText = css;
		} else {
		  style.appendChild(document.createTextNode(css));
		}
media_revice();
window.addEventListener('resize', media_revice);



function clean_searchs_box(){
	$(".contenidopage").removeClass('inip_bottom');
	$(".pages_list_timeline").removeClass('seacr_active');
	$('.search_box').removeClass("search_box_v");
	$('.search_box').html("");
	$("#searchlist").val("");
}


function alertadvertencia(title){
  $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">'+title+'</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
  $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
  window.setTimeout(function(){
    $("#rem"+idl).addClass("close_alert_200");
    setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
  }, 7000);
}

function alertexito(title){
  $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top exito_top"><p class="alerta_top100">'+title+'</p><span id="close_alert_'+idl+'" class="close_exito_100">X</span></div>');
  $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
  window.setTimeout(function(){
    $("#rem"+idl).addClass("close_alert_200");
    setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
  }, 7000);
}

function recargar($num){
	setTimeout(function(){
		window.location.reload();
	}, $num);
}

function StringluisRand(length) {
    var textos = "";
    var cods = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < length; i++)
        textos += cods.charAt(Math.floor(Math.random() * cods.length));
    return textos;
}

function loader_pages_views(){
	var loaders = '<div class="base_loader_page">'+
	'<div class="loader_int_desin">'+
	'<svg class="sv_loader_ind" height="32" viewBox="0 0 32 32" width="32" aria-busy="true" aria-valuemax="100" aria-valuemin="0" aria-valuetext="Cargando..." role="progressbar" tabindex="0">'+
	'<circle class="circle_loader_int" cx="16" cy="16" fill="none" r="15"  stroke-dasharray="94.24777960769379" stroke-width="2"></circle>'+
	'</svg>'+
	'</div>'+
	'</div>';
	return loaders;
}

function alerta_confirm_dialog(button_func,data_a,data_b){
	$(".hover_confirms_action").remove();
  var datayu ='<div class="hover_confirms_action" id="alert_confirm_action_dialog'+data_a+'">' +
        '<div class="alert_confirms_action">' +
        '<div class="header_confirms_action">Seguro que quieres eliminar. </div>' +
        '<div class="body_confirms_action">'+
        '<span class="button_alert_action delete '+button_func+'" data="'+data_a+'" data_dels="'+data_b+'">Eliminar</span>'+
        '<span class="button_alert_action exits alert_confirm_action_exit_dialog" data_confg="'+data_a+'">Cancelar</span>'+
        '</div>'+
        '</div>'+
        '</div>';
        $("body").prepend(datayu);
}

$(document).on("click", '.data_left_div_a_data_x', function(){
  var dtf = $(this).addClass('opacit');
})
$(document).on("click", '.alert_confirm_action_exit_dialog', function(){
  var dtf = $(this).attr('data_confg');
  $("#alert_confirm_action_dialog"+dtf).remove();
})

var urline=$("#ur_timeline").attr("data");
var urline_ini=$("#ur_timeline").attr("data-x");

$(document).on("click", ".menupagecurrent", function(e){
	e.preventDefault();
	$(".li_menu").removeClass("menu_activo");
	$(".mens_perf_nots09").removeClass("menu_activo");
	$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
	$(this).parent().addClass("menu_activo");
	let ind = $(this).attr("aria-label");
	$("."+ind+"_fot").addClass("menu_activo_b");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type===1){
				if (swapPhoto(data.url,false,false)) {
					history.pushState(null, null, urline+data.url, null);
				}
			}else if(data.type===2){
				if (swapPhoto(data.url,false,false)) {
					history.pushState(null, null, urline, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".menupagecurrent_fot", function(e){
	e.preventDefault();
	$(".li_menu").removeClass("menu_activo");
	$(".mens_perf_nots09").removeClass("menu_activo");
	$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
	$(this).addClass("menu_activo_b");
	let ind = $(this).attr("aria-label");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type===1){
				if (swapPhoto(data.url,false,false)) {
					history.pushState(null, null, urline+data.url, null);
				}
			}else if(data.type===2){
				if (swapPhoto(data.url,false,false)) {
					history.pushState(null, null, urline, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".menupagecurrent_perfil", function(e){
	e.preventDefault();
	let ind = $(this).attr("aria-label");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type===1){
				if (swapPhoto(data.url,false,false)) {
					history.pushState(null, null, urline+data.url, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".view_items_timeline_page", function(e){
	e.preventDefault();
	let ind = $(this).attr("aria-label");
	let ads = $(this).attr("data_int");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind,gold_black:ads},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type===1){
				if (swapPhoto(data.url,ads,false)) {
					history.pushState(null, null, urline+data.url, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".view_items_lista_view_page", function(e){
	e.preventDefault();
	let ind = $(this).attr("aria-label");
	let lineal_page = $(this).attr("data_null_page");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind,gold_black_two:"2",lineal_ind:lineal_page},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			$(".contenidopage").removeClass('inip_bottom');
	  	$(".pages_list_timeline").removeClass('seacr_active');
	  	$('.search_box').removeClass("search_box_v");
	  	$('.search_box').html("");
	  	$('#searchlist').val("");
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type==1){
				if (swapPhoto(data.url,2,false)) {
					history.pushState(null, null, urline+data.url_a+"/"+data.url, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})


$(document).on("click", ".view_servicios_timeline_page", function(e){
	e.preventDefault();
	let ind = $(this).attr("aria-label");
	let ads = $(this).attr("data_int");
	$.ajax({
		url:list_urls()+list_action()+"viewpages",
		type:"POST",
		data:{index:ind,gold_black_service:ads},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			document.getElementById('title_pages').innerHTML = data.title;
			if(data.type===1){
				if (swapPhoto(data.url,ads,false)) {
					history.pushState(null, null, urline+data.url_a+"/"+data.url, null);
				}
			}else{
				alertadvertencia(data.mensaje)
			}
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})


function supports_history_api() {
  return !!(window.history && history.pushState);
}
function swapPhoto(href,dfs,$page){
	$(".pages_list_timeline").removeClass('preloaderbar');			
	var req = new XMLHttpRequest();
	$('html, body').animate({scrollTop:0}, 'slow');
	clean_searchs_box()
	if(dfs==1){
		req.open("GET",list_urls()+list_action()+"viewpage_items&viewind="+ href, true);
		req.onreadystatechange = function(aEvt){
			if(req.readyState == 4) {
				if(req.status == 200){
					const response = JSON.parse(req.responseText);
					document.getElementsByClassName('pages_list_timeline')[0].innerHTML = response.datapage;
					if(response.stylepage){
						var cssId = 'myCss';
						if(!document.getElementById(cssId)){
							var head  = document.getElementsByTagName('head')[0];
							var link  = document.createElement('link');
							link.id   = cssId;
							link.rel  = 'stylesheet';
							link.type = 'text/css';
							link.href = urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css';
							link.media = 'all';
							head.appendChild(link);
						}else{
							document.getElementById('myCss').setAttribute("href",urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css');
						}
					}


					if(response.title){
						document.getElementById('title_pages').innerHTML = response.title;
					}

					
					if($("#myJs").length > 0){
						document.getElementById('myJs').remove();
					}
					if(response.jspage){
						var jsId = 'myJs';
						if(!document.getElementById(jsId)){
							var head  = document.getElementsByTagName('head')[0];
							var sucjs  = document.createElement('script');
							sucjs.id   = jsId;
							sucjs.src = urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js';
							head.appendChild(sucjs);
						}else{
							document.getElementById('myJs').setAttribute("src",urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js');
						}
					}
					req.onload = function(){
						$(".pages_list_timeline").addClass('preloaderbar');
					}
				}else{
					document.getElementById("page_error_line").innerHTML = "Error";
				}
			}
		};
		req.send(null);
		return true;
	}else if(dfs==2){
		req.open("GET",list_urls()+list_action()+"viewpage_items_view&viewind="+ href, true);
		req.onreadystatechange = function(aEvt){
			if(req.readyState == 4) {
				if(req.status == 200){
					const response = JSON.parse(req.responseText);
					document.getElementsByClassName('pages_list_timeline')[0].innerHTML = response.datapage;

					if(response.stylepage){
						var cssId = 'myCss';
						if(!document.getElementById(cssId)){
							var head  = document.getElementsByTagName('head')[0];
							var link  = document.createElement('link');
							link.id   = cssId;
							link.rel  = 'stylesheet';
							link.type = 'text/css';
							link.href = urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css';
							link.media = 'all';
							head.appendChild(link);
						}else{
							document.getElementById('myCss').setAttribute("href",urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css');
						}
					}

					if(response.title){
						document.getElementById('title_pages').innerHTML = response.title;
					}
					if($("#myJs").length > 0){
						document.getElementById('myJs').remove();
					}

					if(response.jspage){
						var jsId = 'myJs';
						if(!document.getElementById(jsId)){
							var head  = document.getElementsByTagName('head')[0];
							var sucjs  = document.createElement('script');
							sucjs.id   = jsId;
							sucjs.src = urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js';
							head.appendChild(sucjs);
						}else{
							document.getElementById('myJs').setAttribute("src",urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js');
						}
					}

					req.onload = function(){
						$(".pages_list_timeline").addClass('preloaderbar');
					}
				}else{
					document.getElementById("page_error_line").innerHTML = "Error";
				}
			}
		};
		req.send(null);
		return true;
	}else if(dfs==3){
		req.open("GET",list_urls()+list_action()+"viewpage_services&viewind="+ href, true);
		req.onreadystatechange = function(aEvt){
			if(req.readyState == 4) {
				if(req.status == 200){
					const response = JSON.parse(req.responseText);
					document.getElementsByClassName('pages_list_timeline')[0].innerHTML = response.datapage;
						var cssId = 'myCss';
						if(!document.getElementById(cssId)){
							var head  = document.getElementsByTagName('head')[0];
							var link  = document.createElement('link');
							link.id   = cssId;
							link.rel  = 'stylesheet';
							link.type = 'text/css';
							link.href = urline+'datos/modulos/'+urline_ini+'/source/estilos/services.css';
							link.media = 'all';
							head.appendChild(link);
						}else{
							document.getElementById('myCss').setAttribute("href",urline+'datos/modulos/'+urline_ini+'/source/estilos/services.css');
						}
					if(response.title){
						document.getElementById('title_pages').innerHTML = response.title;
					}
					req.onload = function(){
						$(".pages_list_timeline").addClass('preloaderbar');
					}
				}else{
					document.getElementById("page_error_line").innerHTML = "Error";
				}
			}
		};
		req.send(null);
		return true;
	}else{
		req.open("GET",list_urls()+list_action()+"viewpage&viewind="+ href, true);
		req.onreadystatechange = function(aEvt){
			if (req.readyState == 4) {
				if (req.status == 200){
					const response = JSON.parse(req.responseText);
					document.getElementsByClassName('pages_list_timeline')[0].innerHTML = response.datapage;
					if(response.stylepage){
						var cssId = 'myCss';
						if(!document.getElementById(cssId)){
							var head  = document.getElementsByTagName('head')[0];
							var link  = document.createElement('link');
							link.id   = cssId;
							link.rel  = 'stylesheet';
							link.type = 'text/css';
							link.href = urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css';
							link.media = 'all';
							head.appendChild(link);
						}else{
							document.getElementById('myCss').setAttribute("href",urline+'datos/modulos/'+urline_ini+'/source/estilos/'+response.stylepage+'.css');
							
						}
					}


					if(response.title){
						document.getElementById('title_pages').innerHTML = response.title;
					}
					if($("#myJs").length > 0){
						document.getElementById('myJs').remove();
					}

					if(response.jspage){
						var jsId = 'myJs';
						if(!document.getElementById(jsId)){
							var head  = document.getElementsByTagName('head')[0];
							var sucjs  = document.createElement('script');
							sucjs.id   = jsId;
							sucjs.src = urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js';
							head.appendChild(sucjs);
						}else{
							document.getElementById('myJs').setAttribute("src",urline+'datos/modulos/'+urline_ini+'/source/scripts/'+response.jspage+'.js');
						}
					}

					req.onload = function(){
						$(".pages_list_timeline").addClass('preloaderbar');
					}
				}else{
					document.getElementById("page_error_line").innerHTML = "Error";
				}
			}
		};
		req.send(null);
		return true;
	}
}

$(document).on("click", ".boxpictureliststimg_thum_ind", function(){
	let current = $(this).attr("data-mode")
	$.ajax({
		url:list_urls()+list_action()+"view_image_items",
		type:"POST",
		data:{current_item:current},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){

			$('.image_view_list').attr("style",data.cols)
			$('#img_item').attr("src",data.img)
			$('#img_item').attr("data_box",data.item)
      		setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".next_image_view_item", function(){
	let current = $("#img_item").attr("data_box")
	$.ajax({
		url:list_urls()+list_action()+"view_image_items_controls_next",
		type:"POST",
		data:{current_item:current},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			$('.image_view_list').attr("style",data.cols)
			$('#img_item').attr("src",data.img)
			$('#img_item').attr("data_box",data.cur)
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

$(document).on("click", ".prev_image_view_item", function(){
	let current = $("#img_item").attr("data_box")
	$.ajax({
		url:list_urls()+list_action()+"view_image_items_controls_prev",
		type:"POST",
		data:{current_item:current},
		dataType:"json",
		beforeSend: function(){
			$('.andloadpage').html(loader_pages_views())
		},
		success: function(data){
			$('.image_view_list').attr("style",data.cols)
			$('#img_item').attr("src",data.img)
			$('#img_item').attr("data_box",data.cur)
			setTimeout(function(){
				$('.andloadpage').html("")
			}, 100);
		}
	});
})

window.addEventListener('load', function(){
	let loader = document.querySelector('.loader');
	loader.classList.add('load_hide')
})

window.onload = function(){
	$(".pages_list_timeline").addClass('preloaderbar');		
	if(!supports_history_api()){ return; }
	window.setTimeout(function(){
		window.addEventListener("popstate", function(e){
			$('.andloadpage').html(loader_pages_views())
			var pathArray = window.location.pathname.split('/');
			var req = new XMLHttpRequest();
			req.open("GET",list_urls()+list_action()+"fiel_item&viewind="+pathArray[1]+"&subinit="+pathArray[2], true);
			req.onreadystatechange = function(aEvt){
				if(req.readyState == 4){
					clean_searchs_box();
					if(req.status == 200){
      			setTimeout(function(){
      				$('.andloadpage').html("")
      			}, 100);
      			const response = JSON.parse(req.responseText);
      			if(response.type==1){
      				if(pathArray[1]=="carrito"){
      					swapPhoto(pathArray[1],false,false)
      					$(".li_menu").removeClass("menu_activo");
      					$(".mens_perf_nots09").removeClass("menu_activo");
      					$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
      					$("."+pathArray[1]+"_page").addClass("menu_activo");
      					$("."+pathArray[1]+"_fot").addClass("menu_activo_b");
      				}else if(pathArray[1]=="perfil"){
      					if(pathArray[2]){
	      					swapPhoto(pathArray[1]+"/"+pathArray[2],false,false)
	      				}else{
	      					swapPhoto(pathArray[1],false,false)
	      				}
      					
      					$(".li_menu").removeClass("menu_activo");
      					$(".mens_perf_nots09").removeClass("menu_activo");
      					$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
      					$("."+pathArray[2]+"_page").addClass("menu_activo");
      					$("."+pathArray[1]+"_fot").addClass("menu_activo_b");
      				}else if(pathArray[1]=="menulk"){
      					$(".li_menu").removeClass("menu_activo");
      					$(".mens_perf_nots09").removeClass("menu_activo");
      					$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
      					$("."+pathArray[1]+"_page").addClass("menu_activo");
      					$("."+pathArray[1]+"_fot").addClass("menu_activo_b");
      					swapPhoto(pathArray[1],false,false)
      				}else{
      					$(".li_menu").removeClass("menu_activo");
      					$(".mens_perf_nots09").removeClass("menu_activo");
      					$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
      					$("."+pathArray[1]+"_page").addClass("menu_activo");
      					$("."+pathArray[1]+"_fot").addClass("menu_activo_b");
      					swapPhoto(pathArray[1],1,false)
      				}
      			}else if(response.type==2){
      				swapPhoto(pathArray[2],2,false)
      			}else if(response.type==3){
      				swapPhoto(pathArray[2],3,false)
      			}else{
      				$(".li_menu").removeClass("menu_activo");
      				$(".mens_perf_nots09").removeClass("menu_activo");
      				$(".subs_conten_luis_menu_system").removeClass("menu_activo_b");
      				$(".inicio_page").addClass("menu_activo");
      				$(".inicio_fot").addClass("menu_activo_b");
      				swapPhoto("inicio",false,false);
      			}
					
      		}else{
      			document.getElementById("page_error_line").innerHTML = "Error";
      		}
      	}
      };
      req.send(null);
      return true;
    }, false);
  }, 1);
}


$(document).ready(function() {
  var _targettedModal,
  _triggers = document.querySelectorAll('[data-modal-trigger]'),
  _dismiss = document.querySelectorAll('[data-modal-dismiss]'),
  modalActiveClass = "is-modal-active";
  function abrirModal(el){
    _targettedModal = document.querySelector('[data-modal-name="'+ el + '"]');
    _targettedModal.classList.add(modalActiveClass);
  }

  function hideModal(event){
    if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
      _targettedModal.classList.remove(modalActiveClass);
    }
  }

  function bindEvents(el, callback){
    for (i = 0; i < el.length; i++) {
      (function(i){
        el[i].addEventListener('click', function(event) {
          callback(this, event);
        });
      })(i);
    }
  }
  
  function triggerModal(){
    bindEvents(_triggers, function(that){
      abrirModal(that.dataset.modalTrigger);
    });
  }

  function cerrarModal(){
    bindEvents(_dismiss, function(that){
        hideModal(event);
      });
  }

  function iniciarModal(){
    triggerModal();
    cerrarModal();
  }
  iniciarModal();

  $(document).on("click", ".select_options_in_items_page", function(){
  	let item_type = $(this).attr("data-type");
  	let items_id = $(this).attr("data-id");
  	$.ajax({
  		type:"POST",
  		data:{typs:item_type,opt_ops:items_id},
  		url:list_urls()+list_action()+"update_option_default_in_page",
  		success: function(datos){
  			$(".price_item_view_item_page").html(datos);
  		}
  	});
  })

  var formData = new FormData();

  $('.add_item_view_select').click(function(){
  	$("#block_item_add_in_page").click();
	  
	});

	$(document).on("submit", "#block_item_add_in_page", function (e){
		e.preventDefault();
		let data_item = $(".add_item_view_select").attr('id');
		formData.set('id',data_item);
    $('input[type=radio]').filter(':checked').each(function () {
    	var inputField = $(this);
    	formData.append(inputField.attr('name'),inputField.val());
    });

    $.ajax({
	  	type: "POST",
	    url:list_urls()+list_action()+"agregaralcarrito",
	    data:formData,
      cache:false,
	    dataType: "json",
	    contentType: false,
      processData: false,
	    success: function(data){
	    	if(data.estado=="error"){
	    		alertadvertencia(data.messaje);
	    	}
	    	
	    	if(data.estado=="exito"){
	    		alertadvertencia("Agregado");
	    	}

	    	if(data.agotar==1){
	    		alertadvertencia(data.messaje);
	    		$(".cantidad_stock_disponible_en_item_style").html("Producto agotado.");
	    	}else{
	    		$(".cantidad_stock_disponible_en_item_style").html("STOCK: "+data.cantidad_item);
	    	}
	    	$(".shop_store_box").html(data.cantidad);
	    }
	  });
	});
});




///sess_input_button789

$(document).on("click", ".sess_input_button789", function(){
	let us_var_not_a = $(".sess_input_text_data_a").val();
	let us_var_not_b = $(".sess_input_text_data_b").val();
	let us_var_not_c = $(".sess_input_text_data_c").val();
	if($(".sess_input_text_data_a").val()==""){
		alertadvertencia("Ingresa tu correo.");
		$(".sess_input_text_data_a").focus();
	}else if($(".sess_input_text_data_b").val()==""){
		alertadvertencia("Ingresa tu contrase&ntilde;a.");
		$(".sess_input_text_data_b").focus();
	}else{
		$.ajax({
			type:"POST",
			url:list_urls()+list_action()+"session_delete_a",
		  data:{n_sub_a:us_var_not_a,n_sub_b:us_var_not_b,cods:us_var_not_c},
	    dataType: "json",
		  success: function(data){
		  	console.log(data)
		    	if(data.estado=="exito"){
		    		alertexito(data.mensaje);
		    		if (swapPhoto("perfil",false,false)) {
							history.pushState(null, null, urline+"perfil", null);
						}
		    	}
		    	if(data.estado=="error900_pl"){
		    		alertadvertencia(data.mensaje);
		    	}
		    	if(data.estado=="noactivado"){
		    		alertadvertencia(data.mensaje);
		    		$(".sess_input_text_data_c").removeClass("view_null");
		    		$(".sess_input_text_data_c").focus();
		    	}
		    	if(data.estado=="activado"){
		    		alertexito(data.mensaje);
		    		if (swapPhoto("perfil",false,false)) {
							history.pushState(null, null, urline+"perfil", null);
						}
		    	}
		    	if(data.estado=="noactivadods"){
		    		alertadvertencia(data.mensaje);
		    		$(".sess_input_text_data_c").removeClass("view_null");
		    		$(".sess_input_text_data_c").focus();
		    	}
		    	if(data.estado=="error400_pl"){
		    		alertadvertencia(data.mensaje);
		    	}
		    	if(data.estado=="errormail"){
		    		alertadvertencia(data.mensaje);
		    	}
		    }
		});
	}
})

$(document).on("click", ".ini_play_luis", function(){
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"ds",
	    success: function(data){
	    	if(swapPhoto("perfil",false,false)) {
					history.pushState(null, null, urline+"perfil", null);
				}
	    }
	});
})
$(document).on("click", ".boton_eliminar_producto_de_carrito", function(){
	let items_del = $(this).attr("data_cart");
	alerta_confirm_dialog("boton_eliminar_producto_de_carrito_success",items_del,false);
})

$(document).on("click", ".button_acces_new_dl_a", function(){
	$(".contenido_access_new_page_luis").removeClass("view_null");
	$(".contenido_access_page_luis").addClass("view_null");
})
$(document).on("click", ".button_acces_new_dl_b", function(){
	$(".contenido_access_new_page_luis").addClass("view_null");
	$(".contenido_access_page_luis").removeClass("view_null");
})

$(document).on("click", ".boton_eliminar_producto_de_carrito_success", function(){
	let indexlist = $(this).attr("data");
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"eliminaritemcarrito",
	    dataType:"json",
	    data:{indexposition:indexlist},
	    success: function(data){
	    	$("#alert_confirm_action_dialog"+indexlist).remove();
	    	$(".shop_store_box").html(data.cantidad);
	    	$(".count_items_in_car_styls_dt").html(data.cantidad);
	    	if($("#itemsviewscartorder"+indexlist).length > 0 ) {
	    		$("#itemsviewscartorder"+indexlist).remove();
	    	}

	    	if(data.nullcarts===true){
	    		$(".content_footer_order_list").html("");
	    		$(".cart_content_list_items_orders_tbn").html("");
	    		$(".conten_cart_null_listem").html('<h2 class="titulo2carrito ">NO TIENES PRODUCTOS EN TU CARRITO</h2><hr><h3 class="subtitulocarrito">Encuentra los mejores productos, a los mejores precios.</h3><div class="nuevacompra"><a class="botoniniciacompra menupagecurrent" aria-label="inicio" role="link" href="'+list_urls()+'">Comprar ahora</a></div>');
	    		$(".order_items_null").html(data.controlsup);
	    	}else{
	    		$(".order_items_null").html("");
	    		$(".pricetotalboxcarts").html(data.totalpriceorderslist);
	    		$(".total_monto_order_list").html(data.totalpriceorderslist);
	    	}
	    }
	});
});







//cancelarcompra


$(document).on("click", ".button_delete_order_current", function(){
	$("#alert_confirm_action_dialogfalse").remove();
	alerta_confirm_dialog("button_delete_order_current_success",false,false);
})

$(document).on("click", ".button_delete_order_current_success", function(){
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"cancelarcompra",
	    success: function(data){
	    	$("#alert_confirm_action_dialogfalse").remove();
	    	$(".shop_store_box").html("0");
	    	$(".cart_content_list_items_orders_tbn").html("");
	    	$(".conten_cart_null_listem").html('<h2 class="titulo2carrito ">NO TIENES PRODUCTOS EN TU CARRITO</h2><hr><h3 class="subtitulocarrito">Encuentra los mejores productos, a los mejores precios.</h3><div class="nuevacompra"><a class="botoniniciacompra menupagecurrent" aria-label="inicio" role="link" href="'+list_urls()+'">Comprar ahora</a></div>');
	    }
	});
})

$(document).on("click", ".back_in_order_list_page", function(){
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"next_order_steptwo",
	    data:{nom:"0"},
	    success: function(data){
	    }
	});
})

$(document).on("click", ".next_date_order_process", function(){
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"next_order_steptwo",
	    data:{nom:"2"},
	    success: function(data){
	    }
	});
})

$(document).on("click", ".next_date_order_process_two", function(){
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"next_order_steptwo",
	    data:{nom:"3"},
	    success: function(data){
	    }
	});
})
$(document).on("click", ".next_date_order_process_three", function(){
	if(!$("input[name='metodopago']").is(':checked')){
		alertadvertencia("Selecciona un metodo de pago.");
	}else{
		$.ajax({
			type:"POST",
		    url:list_urls()+list_action()+"next_order_steptwo",
		    data:{nom:"4"},
		    success: function(data){
		    }
		});
	}
	
})
////***class_label_order_mount_input_sub_data


$(document).on("click", ".new_stored_page_realtime", function(){
	let data_opt = $("input[name='sucursal']:checked").val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"new_stored_current_order",
	    data:{data_p:data_opt},
	    success: function(data){
	    }
	});
})

$(document).on("click", ".new_stored_page_realtime_envio", function(){
	let data_opt = $("input[name='sucursal']:checked").val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"new_stored_current_order_envio",
	    data:{data_p:data_opt},
	    success: function(data){
	    }
	});
})

$(document).on("click", ".new_stored_page_realtime_pagos", function(){
	let data_opt = $("input[name='metodopago']:checked").val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"new_stored_current_order_pagos",
	    data:{data_p:data_opt},
	    success: function(data){
	    	if(data.tipe==0){
	    		alertadvertencia(data.messaje);
	    	}
	    }
	});
})


$(document).on("click", ".carrito_selec_in_data_step_dos_lp_input", function(){
	let data_opt = $("input[name='documento_venta']:checked").val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"documents_current_order",
	    data:{data_p:data_opt},
	    success: function(data){
	    }
	});
})


$(document).on("keyup", ".number_doc_in_new_order_web_ac_lims", function(){
	let data_opt = $(this).val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"documents_current_order_nums",
	    data:{data_p:data_opt},
	    success: function(data){
	    }
	});
})



$(document).on("click", ".classs_data_new_locale_view_current", function(){
	let data_opt = $(this).attr("data");
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"new_order_types",
	    data:{data_p:data_opt},
	    success: function(data){
	    }
	});
})

///-------------next_date_order_process_ends_order
$(document).on("click", ".next_date_order_process_ends_order", function(){
	let data_opt = $(".class_label_order_mount_input_sub_data").val();
	$.ajax({
		type:"POST",
	  url:list_urls()+list_action()+"process_end_order",
		dataType:"json",
	  data:{data_p:data_opt},
	  success: function(data){
	    if(data.estado=="exito"){
	    	$(".buttoc_load_orderarial").click();
	    	$(".shop_store_box").html("0");
	    	alertexito(data.mensaje);
	    }
	    }
	});
})


///update_address_user
$(document).on("click", ".data_address_update", function(){
	let data_d = $(this).attr("data-config");
	$.ajax({
		type:"POST",
		dataType:"json",
	  url:list_urls()+list_action()+"data_for_update_boxp",
	  data:{data_dd:data_d},
	  success: function(data){
	    $(".btn_new_ge_use_persons").attr("data-config", data_d);
	    $(".btn_new_ge_use_persons").removeClass("btn_new_ge_use_persons_add");
	    $(".btn_new_ge_use_persons").addClass("btn_new_ge_use_persons_update");
	    $(".btn_new_ge_use_persons").html("GUARDAR CAMBIOS");
	    $(".data_input_selc_users_name").val(data.nombre);
	    $(".data_input_selc_users_address").val(data.direccion);
	    $(".data_input_selc_users_surg").val(data.sugerencia);
	  }
	});
})

$(document).on("click", ".btn_new_ge_use_persons_update", function(){
	let data_d = $(this).attr("data-config");
	let name_dir = $(".data_input_selc_users_name").val();
	let direcction_dir = $(".data_input_selc_users_address").val();
	let surg_dir = $(".data_input_selc_users_surg").val();
	$.ajax({
		type:"POST",
		dataType:"json",
	  url:list_urls()+list_action()+"data_for_update_boxp_update",
	  data:{data_dd:data_d,nombre:name_dir,adrress:direcction_dir,surg:surg_dir},
	  success: function(data){
	    $(".btn_new_ge_use_persons").attr("data-config", null);
	    $(".btn_new_ge_use_persons").addClass("btn_new_ge_use_persons_add");
	    $(".btn_new_ge_use_persons").removeClass("btn_new_ge_use_persons_update");
	    $(".btn_new_ge_use_persons").html("AGREGAR");
	    $(".data_input_selc_users_name").val("");
	    $(".data_input_selc_users_address").val("");
	    $(".data_input_selc_users_surg").val("");
	    alertexito(data.messaje);
	    $(".data_selc_us_name"+data_d).html(data.nombre);
	    $(".data_selc_us_address"+data_d).html(data.direccion);
	    $(".data_selc_us_surg"+data_d).html(data.sugerencia);

	  }
	});
})

$(document).on("click", ".data_address_delete", function(){
	let data_d = $(this).attr("data-config");
	$.ajax({
		type:"POST",
	  url:list_urls()+list_action()+"data_for_update_boxp_delete",
	  data:{data_dd:data_d},
	  success: function(data){
	    $(".contentboxitemslist_client_viewers"+data_d).slideUp();
	  }
	});
})


$(document).on("click", ".btn_new_ge_use_persons_add", function(){
	let name_dir = $(".data_input_selc_users_name").val();
	let direcction_dir = $(".data_input_selc_users_address").val();
	let surg_dir = $(".data_input_selc_users_surg").val();
	$.ajax({
		type:"POST",
		dataType:"json",
	  url:list_urls()+list_action()+"data_for_update_boxp_add",
	  data:{nombre:name_dir,adrress:direcction_dir,surg:surg_dir},
	  success: function(data){
	    if(data.type=="error"){
	    	alertadvertencia(data.messaje);
	    }
	    if(data.type=="exito"){
	    	$(".data_input_selc_users_name").val("");
		    $(".data_input_selc_users_address").val("");
		    $(".data_input_selc_users_surg").val("");
	    	alertexito(data.messaje);
	    	$(".class_op_address_list_order").append(data.item_new_address);
	    }

	    if(data.error=="nombre"){
	    	$(".data_input_selc_users_name").focus();
	    }
	    if(data.error=="address"){
	    	$(".data_input_selc_users_address").focus();
	    }
	    if(data.error=="surgs"){
	    	$(".data_input_selc_users_surg").focus();
	    }
	  }
	});
})
//// update data user
$(document).on("click", ".btn_saved_grange_use", function(){
	let data_d = $(".class_tipe_upt_d").val();
	let data_n = $(".class_tipe_upt_n").val();
	let data_p = $(".class_tipe_upt_p").val();
	let data_m = $(".class_tipe_upt_m").val();
	$.ajax({
		type:"POST",
	    url:list_urls()+list_action()+"update_displays_us",
	    data:{data_dd:data_d,data_nn:data_n,data_pp:data_p,data_mm:data_m},
	    success: function(data){
	    }
	});
})
///searchlist

$(document).on("keyup", "#searchlist", function(){
	let data_a = $(this).val();
	$.ajax({
		type:"POST",
		dataType:"json",
	  url:list_urls()+list_action()+"search",
	  data:{data:data_a},
	  success: function(data){
	  	if($("#searchlist").val().length > 0){
	  		$(".pages_list_timeline").addClass('seacr_active');
	  		$(".contenidopage").addClass('inip_bottom');
	  		$('.search_box').addClass("search_box_v");
	  		$('.search_box').html(data.data_rt);
	  	}else{
	  		clean_searchs_box()
	  	}
	  	
	    console.log(data)
	  }
	});
})

document.getElementById('searchlist').addEventListener('input', (e) => {
  if(e.currentTarget.value==""){
  	clean_searchs_box()
  }
})


jQuery(document).ready(function (e) {
    function bs(bs) {
        e(bs).bind("click", function (bs) {
            bs.preventDefault();
            e(this).parent().fadeOut()
        })
    }
    e(document).on("click",".opcionesblocklist1000", function () {
        var bs = e(this).parents(".opcionesblocklist1000boxlist").children(".boxoptionslistlines").is(":hidden");
        e(".opcionesblocklist1000boxlist .boxoptionslistlines").hide();
        e(".opcionesblocklist1000boxlist .boxoptionslistlines").removeClass("opopsclistop");
        if (bs) {
            e(this).parents(".opcionesblocklist1000boxlist").children(".boxoptionslistlines").toggle().parents(".opcionesblocklist1000boxlist").children(".boxoptionslistlines").addClass("opopsclistop")
        }
    });
    e(document).bind("click", function (bs) {
        var n = e(bs.target);
        if (!n.parents().hasClass("opcionesblocklist1000boxlist")) e(".opcionesblocklist1000boxlist .boxoptionslistlines").hide();
    });
    e(document).bind("click", function (bs) {
        var n = e(bs.target);
        if (!n.parents().hasClass("opcionesblocklist1000boxlist")) e(".opcionesblocklist1000boxlist .boxoptionslistlines").removeClass("opopsclistop");
   })
});

