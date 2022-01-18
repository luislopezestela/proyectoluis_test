var urline=$("#ur_timeline").attr("data");
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
});

