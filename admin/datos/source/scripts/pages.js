var i = 0;
var urline=$("#ur_timeline").attr("data");
function alertadvertencia(title){
var idl=i++;
  $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">'+title+'</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
  $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
  window.setTimeout(function(){
    $("#rem"+idl).addClass("close_alert_200");
    setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
  }, 7000);
}

function process_data_form_ajax(one,two){
  $.ajax({
    type: "POST",
    url:list_urls()+list_action()+one,
    dataType:"json",
    data:{"data_action":two},
    success: function(data){
      if(data.estado==1){
        alertexito(data.mensaje);
      }else{
        alertadvertencia(data.mensaje);
      }
    }
  });
}
function alertexito(title){
var idl=i++;
  $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top exito_top"><p class="alerta_top100">'+title+'</p><span id="close_alert_'+idl+'" class="close_exito_100">X</span></div>');
  $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
  window.setTimeout(function(){
    $("#rem"+idl).addClass("close_alert_200");
    setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
  }, 7000);
}

function alerta_confirm(action,data){
  var datayu ='<div class="hover_confirms_action" id="alert_confirm_action_'+data+'">' +
        '<div class="alert_confirms_action">' +
        '<div class="header_confirms_action">Confirmar. </div>' +
        '<div class="body_confirms_action">'+
        '<span class="button_alert_action delete alert_confirm_action_delete" data_confg="'+data+'" data_action="'+action+'">Eliminar</span>'+
        '<span class="button_alert_action exits alert_confirm_action_exit" data_confg="'+data+'">Cancelar</span>'+
        '</div>'+
        '</div>'+
        '</div>';
        $("body").append(datayu);
}


function alerta_confirm_dialog(button_func,data_a,data_b){
  var datayu ='<div class="hover_confirms_action" id="alert_confirm_action_dialog'+data_a+'">' +
        '<div class="alert_confirms_action">' +
        '<div class="header_confirms_action">Seguro que quieres eliminar. </div>' +
        '<div class="body_confirms_action">'+
        '<span class="button_alert_action delete '+button_func+'" data="'+data_a+'" data_dels="'+data_b+'">Eliminar</span>'+
        '<span class="button_alert_action exits alert_confirm_action_exit_dialog" data_confg="'+data_a+'">Cancelar</span>'+
        '</div>'+
        '</div>'+
        '</div>';
        $("body").append(datayu);
}


$(document).on("click", '.alert_confirm_action_exit_dialog', function(){
  var dtf = $(this).attr('data_confg');
  $("#alert_confirm_action_dialog"+dtf).remove();
})



$(document).on("click", '.alert_confirm_action_delete', function(){
  var dtf = $(this).attr('data_confg');
  var dtfact = $(this).attr('data_action');
  process_data_form_ajax(dtfact,dtf);
  $(this).html("Eliminando..");
  setTimeout(function(){
    $(this).html("Eliminar");
      $(".removed_indrics"+dtf).slideUp();
      $("#alert_confirm_action_"+dtf).remove();
    }, 1000);
})
$(document).on("click", '.alert_confirm_action_exit', function(){
  var dtf = $(this).attr('data_confg');
  $("#alert_confirm_action_"+dtf).remove();
})

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

function vistaprevia(file, id) {
    var datbass=$(".addnewimageluisbotsccc").attr("data-got");
    var imagenencode = URL.createObjectURL(file);
    var img = $("<span class=\"addnewimageluisboxud\" id=\""+id+"\"><span class=\"addnewimageluisboxudremove\"><img src=\""+datbass+"datos/source/csacdjkclos.png\"></span><img class=\"addnewimageluisboxudimage\" src=\"" + imagenencode + "\" title=\"Foto\"/></span>");
    $(img).insertBefore("#litimgecurrrent");
}

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

$(document).on("click", ".option_carta_functions", function(){
  let lab = $(this).attr("data");
  let claseactive = "is-modal-active";
  modalview = document.querySelector('[data-modal-name="option_carta_'+ lab + '"]');
  modalview.classList.add(claseactive);
})

$(document).on("click", ".option_carta_functions_update", function(){
  let lab = $(this).attr("data");
  let claseactive = "is-modal-active";
  modalview = document.querySelector('[data-modal-name="option_carta_update_'+ lab + '"]');
  modalview.classList.add(claseactive);
})

$(document).on("click", ".closet_modal_listems_up", function(){
  let lab = $(this).attr("data");
  let claseactive = "is-modal-active";
  if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
  modalview = document.querySelector('[closet_modal_up="'+ lab + '"]');
  modalview.classList.remove(claseactive);
}
})

$(document).on("click", ".closet_modal_listems", function(){
  let lab = $(this).attr("data");
  let claseactive = "is-modal-active";
  if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
  modalview = document.querySelector('[closet_modal="'+ lab + '"]');
  modalview.classList.remove(claseactive);
}
})

$(document).on("click", ".closet_modal_listems_two", function(){
  let lab = $(this).attr("data");
  let claseactive = "is-modal-active";
  $('.barcodes_items_view_in_page_button_action'+lab).removeClass(claseactive);

})

$(document).on("click", ".barcodes_items_view_in_page_buttons_two", function(){
  var eldata = $(this).attr("data-modal-trigger");
  var _targettedModal,
  _triggers = document.querySelectorAll('[data-modal-trigger]'),
  _dismiss = document.querySelectorAll('[data-modal-dismiss]'),
  modalActiveClass = "is-modal-active";
    _targettedModal = document.querySelector('[data-modal-name="'+ eldata + '"]');
    _targettedModal.classList.add(modalActiveClass);
  
})




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
});
$(document).on("click", ".sess_page_users",function(){
  $.ajax({
    url:list_urls()+list_action()+"ses",
  });
  window.location = list_urls();
})

$(document).on("click", ".vender_realizar_nueva_venta",function(){
  window.location = list_urls()+"ventas/vender";
})

$(document).ready(function() {
  setTimeout(function(){
    $(".message_session_unsed").slideUp();
    setTimeout(function(){
      $(".message_session_unsed").remove();
    }, 700);
  }, 4700);
  
} );