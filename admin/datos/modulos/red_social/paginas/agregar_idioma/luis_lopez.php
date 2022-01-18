<?php 
$base=Luis::basepage("base_page_admin");
$base_b=Luis::basepage("base_page");

?><br>
<div class="contenido">
	<div id="list_carts_view"></div>
	

	<div class="contenidoboxplasstcread">
		<div class="contentboxitemslistcread">
			<center><label><?=Luis::lang("agregar_nuevo_idioma");?></label><hr><h4><?=Luis::lang("nota")." ".Luis::lang("esto_puede_tardar_hasta_5_minutos");?> </h4></center>
		</div>
            <div class="untmsd4ss4listticread"><?=Luis::lang("nuevo_idioma");?></div>
            <div class="contentboxitemslistcread">
              <form class="form800goodlive_item_language" method="POST">

                <div class="contentboxfunst">
                  <div class="boxinputlists">
                    <input class="inptexboslistspublic" type="text" id="lang" name="lang" autocomplete="off" required>
                    <label class="labelboxinptext"><?=Luis::lang("nombre_del_idioma");?></label>
                  </div>
                </div>

                <div class="aphlistbuttonnextopenbox">
                	<span class="message_lang_p"></span>
                  <button type="submit" class="button_view_sty btn_add_language_theme"><?=Luis::lang("agregar_idioma");?></button>
                </div>
              </form>
            </div>
          </div>
</div>

<script>
$(function() {
	$(document).on("submit", ".form800goodlive_item_language", function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: list_action()+"add_language",
			type:'POST',
			data:formData,
			dataType: "json",
			cache:false,
			contentType: false,
			processData: false,
			beforeSend: function() {
				$(".btn_add_language_theme").html('Espere un momento..');
			},
			success: function(data){
				if(data.estado==200){
					$("html, body").animate({ scrollTop: 0 }, "slow");
					$("#lang").val("");
				}
				setTimeout(function () {
					$(".btn_add_language_theme").html("Agregar lenguage");
		        }, 1000);
		        setTimeout(function () {
		            window.location.href = list_urls()+"administrar_idioma";
		        }, 1300);
				
			}
		})
	})
});
</script>