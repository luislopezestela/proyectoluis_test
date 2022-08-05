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