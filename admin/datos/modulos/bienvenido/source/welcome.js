setTimeout(console.log.bind(console, "%c¡Detente!", "font-family:Helvetica, Arial, sans-serif; font-weight: bold; color: red; font-size: 45px; padding-top:10px;padding-bottom:10px;"));
setTimeout(console.log.bind(console, "%cEsta función del navegador está pensada para desarrolladores. Si alguien te indicó que copiaras y pegaras algo aquí para habilitar una función de sistemahostin o para hackear la cuenta de alguien, se trata de un fraude. Si lo haces, esta persona podrá acceder a tu cuenta.", "font-family: Helvetica, Arial, sans-serif; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
setTimeout(console.log.bind(console, "%cPara obtener más información, consulta 982137342", "font-family:Helvetica, Arial, sans-serif; font-weight: normal; color: #444; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
$(document).on("click", ".tb_btn_next", function(){
	let skin = $("input[name='tema_skin_data']:checked").val();
	let name = $("#pag_name").val();
	let title = $("#pag_title").val();
	let description = $("#pad_description").val();
	let slogan = $("#pag_slogan").val();
	if(skin==null){
		alertadvertencia("Selecciona el modelo de pagina. (TEMA)");
		$(".view_item_temas_image_conten").addClass("select_none");
	}else if(name==""){
		alertadvertencia("Escribe el nombre de la pagina o empresa.");
		$("#pag_name").focus();
	}else if(title==""){
		alertadvertencia("Escribe el titulo de la pagina.");
		$("#pag_title").focus();
	}else if(description==""){
		alertadvertencia("Escribe descripcion de la pagina o empresa.");
		$("#pad_description").focus();
	}else if(slogan==""){
		alertadvertencia("Escribe eslogan de la pagina o empresa.");
		$("#pag_slogan").focus();
	}else{
		$.ajax({
			url:list_urls()+list_action()+"start_data_page",
			type:"POST",
      data:{tema:skin,nombre:name,titulo:title,descripcion:description,eslogan:slogan},
			success: function(data){
				console.log(data)
				//window.location = data;
			}
		});
	}
})

$(document).on("click", "input[name='tema_skin_data']", function(){
	$(".view_item_temas_image_conten").removeClass("select_none");
})
  // work in progress - needs some refactoring and will drop JQuery i promise :)
var instance = $(".sub_contec_data");
$.each( instance, function(key, value) {
    
  var arrows = $(instance[key]).find(".arrow"),
      prevArrow = arrows.filter('.arrow-prev'),
      nextArrow = arrows.filter('.arrow-next'),
      box = $(instance[key]).find(".hs"), 
      x = 0,
      mx = 0,
      maxScrollWidth = box[0].scrollWidth - (box[0].clientWidth / 2) - (box.width() / 2);

  $(arrows).on('click', function() {
      
    if ($(this).hasClass("arrow-next")) {
      x = ((box.width() / 2)) + box.scrollLeft() - 10;
      box.animate({
        scrollLeft: x,
      })
    } else {
      x = ((box.width() / 2)) - box.scrollLeft() -10;
      box.animate({
        scrollLeft: -x,
      })
    }
      
  });
    
  $(box).on({
    mousemove: function(e) {
      var mx2 = e.pageX - this.offsetLeft;
      if(mx) this.scrollLeft = this.sx + mx - mx2;
    },
    mousedown: function(e) {
      this.sx = this.scrollLeft;
      mx = e.pageX - this.offsetLeft;
    },
    scroll: function() {
      toggleArrows();
    }
  });

  $(document).on("mouseup", function(){
    mx = 0;
  });
  
  function toggleArrows() {
    if(box.scrollLeft() > maxScrollWidth - 10) {
        // disable next button when right end has reached 
        nextArrow.addClass('disabled');
      } else if(box.scrollLeft() < 10) {
        // disable prev button when left end has reached 
        prevArrow.addClass('disabled')
      } else{
        // both are enabled
        nextArrow.removeClass('disabled');
        prevArrow.removeClass('disabled');
      }
  }
  
});