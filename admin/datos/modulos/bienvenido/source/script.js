setTimeout(console.log.bind(console, "%c¡Detente!", "font-family:Helvetica, Arial, sans-serif; font-weight: bold; color: red; font-size: 45px; padding-top:10px;padding-bottom:10px;"));
setTimeout(console.log.bind(console, "%cEsta función del navegador está pensada para desarrolladores. Si alguien te indicó que copiaras y pegaras algo aquí para habilitar una función de sistemahostin o para hackear la cuenta de alguien, se trata de un fraude. Si lo haces, esta persona podrá acceder a tu cuenta.", "font-family: Helvetica, Arial, sans-serif; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
setTimeout(console.log.bind(console, "%cPara obtener más información, consulta 982137342", "font-family:Helvetica, Arial, sans-serif; font-weight: normal; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
$(document).on("click", ".start_page_data", function(){
	console.log("jj")
	$.ajax({
		url:list_urls()+list_action()+"start_data",
		type:"POST",
		success: function(data){
			console.log(data)
			window.location = data;
		}
	});
})