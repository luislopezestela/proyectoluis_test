var doc = $("input[name='dni']");
$(document).on("keypress", "input[name='dni']", function(e){
	var key = window.event ? e.which : e.keyCode;
	  if (key < 48 || key > 57) {
	    e.preventDefault();
	  }
});
$(document).on("keypress", ".reg_input_text_data_h", function(e){
	var key = window.event ? e.which : e.keyCode;
	  if (key < 48 || key > 57) {
	    e.preventDefault();
	  }
});
$(document).on("keyup", "input[name='dni']", function(){
	var datinp = doc.val().length;
	if(datinp > 7){
		$.ajax({
			url:urline+"admin/"+list_action()+"luis_consuls",
			type:"POST",
			data:{docs:doc.val()},
			dataType:"json",
			success: function(data){
				$("input[name='nombres']").val(data.nombres);
				$("input[name='apellido_paterno']").val(data.apellidoPaterno);
				$("input[name='apellido_materno']").val(data.apellidoMaterno);
			}
		});
	}
	if (datinp < 8){
		$("input[name='nombres']").val("");
		$("input[name='apellido_paterno']").val("");
		$("input[name='apellido_materno']").val("");
	}
});

$(document).on("click", ".sess_input_button789_b", function(){
	let u_a = $(".reg_input_text_data_a").val();
	let u_b = $(".reg_input_text_data_b").val();
	let u_c = $(".reg_input_text_data_c").val();
	let u_d = $(".reg_input_text_data_d").val();
	let u_e = $(".reg_input_text_data_e").val();
	let u_f = $(".reg_input_text_data_f").val();
	let u_g = $(".reg_input_text_data_g").val();
	let u_h = $(".reg_input_text_data_h").val();
	$.ajax({
		type:"POST",
		url:list_urls()+list_action()+"session_delete_b",
		data:{a:u_a,b:u_b,c:u_c,d:u_d,e:u_e,f:u_f,g:u_g,h:u_h},
		dataType:"json",
		success: function(data){
			if(data.estado==1){
				$(".reg_input_text_data_a").val("");
				$(".reg_input_text_data_b").val("");
				$(".reg_input_text_data_c").val("");
				$(".reg_input_text_data_d").val("");
				$(".reg_input_text_data_e").val("");
				$(".reg_input_text_data_f").val("");
				$(".reg_input_text_data_g").val("");
				$(".reg_input_text_data_h").val("");
				$(".contenido_access_new_page_luis").addClass("view_null");
				$(".contenido_access_page_luis").removeClass("view_null");
		    	alertexito(data.mensaje);
		    }
		    if(data.estado==0){
		    	alertadvertencia(data.mensaje);
		    }
		    if(data.cl){
		    	$(data.cl).focus();
		    }
		}
	});
})
 

$(document).on("click", ".btn_new_ge_use_persons_pass_ing", function(e){
	let u_a = $(".pass_g_ntr_a").val();
	let u_b = $(".pass_g_ntr_b").val();
	$.ajax({
		type:"POST",
		url:list_urls()+list_action()+"up_pass",
		data:{a:u_a,b:u_b,},
		dataType:"json",
		success: function(data){
			if(data.estado==1){
				$(".pass_g_ntr_a").val("");
				$(".pass_g_ntr_b").val("");
		    	alertexito(data.mensaje);
		    }
		    if(data.estado==0){
		    	alertadvertencia(data.mensaje);
		    }
		}
	});
});


var _targettedModal_b,
  _triggers_b = document.querySelectorAll('[data-modal-trigger]'),
  _dismiss_b = document.querySelectorAll('[data-modal-dismiss]'),
  modalActiveClass_b = "is-modal-active";
  function abrirModal(el){
    _targettedModal_b = document.querySelector('[data-modal-name="'+ el + '"]');
    _targettedModal_b.classList.add(modalActiveClass_b);
  }

  function hideModal_b(event){
    if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
      _targettedModal_b.classList.remove(modalActiveClass_b);
    }
  }

  function bindEvents_b(el, callback){
    for (i = 0; i < el.length; i++) {
      (function(i){
        el[i].addEventListener('click', function(event) {
          callback(this, event);
        });
      })(i);
    }
  }
  
  function triggerModal_b(){
    bindEvents_b(_triggers_b, function(that){
      abrirModal(that.dataset.modalTrigger);
    });
  }

  function cerrarModal_b(){
    bindEvents_b(_dismiss_b, function(that){
        hideModal_b(event);
      });
  }

  function iniciarModal_b(){
    triggerModal_b();
    cerrarModal_b();
  }
  iniciarModal_b();