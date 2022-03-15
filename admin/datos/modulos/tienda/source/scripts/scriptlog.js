var urline=$("#ur_timeline").attr("data");
var doc = $("input[name='dni']");

$(document).ready(function(){
	$(document).on("submit", "#logboxinit", function(e){
		e.preventDefault();
		var dataToSend = $("#logboxinit").serialize();
		$.ajax({
			url:urline+list_action()+"login",
			type:"POST",
			data:dataToSend,
			dataType:"json",
			success: function(data){
				if(data.type){
					alertexito(data.mensaje)
					recargar(600)
				}else{
					alertadvertencia(data.mensaje)
				}
			}
		});
	});

	/// registrar usuario a
	$(document).on("submit", "#logboxinitregister", function(e){
		e.preventDefault();
		var dataToSend = $("#logboxinitregister").serialize();
		$.ajax({
			url:urline+list_action()+"luis_new_us_page",
			type:"POST",
			data:dataToSend,
			dataType:"json",
			success: function(data){
				if(data.type){
					alertexito(data.mensaje)
					recargar(700)
				}else{
					alertadvertencia(data.mensaje)
				}
			}
		});
	});

	
});


//////data document 
$(document).on("keyup", "input[name='dni']", function(){
	var datinp = doc.val().length;
	if(datinp > 7){
		$.ajax({
			url:urline+list_action()+"luis_consuls",
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
});
