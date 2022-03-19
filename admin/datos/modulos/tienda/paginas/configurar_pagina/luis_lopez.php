<?php
$temas=Luis::listartemas();
$colores=Luis::listacolores();
$active=false;
$tema_view=false;
$active_colk=false;
$active_colk_page=false;
$selec_cold=false;
?>
<label>Colores pagina</label>
<hr>
<div class="palet_colors" data="<?=$tema_view;?>">
	<?php foreach($colores as $c): ?>
		<?php if($c->id===$active_colk_page): ?>
			<?php $selec_cold='<span class="colorviewactive"></span>';?>
			<?php else: ?>
			<?php $selec_cold='';?>
		<?php endif ?>
		<?='<div class="color_view color_config_pages" style="background:'.$c->color_primario.';border:4px solid '.$c->color_segundario.';" data="'.$c->id.'">'.$selec_cold.'</div>';?>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).on("click", ".color_config_pages", function(){
		var confi = $(this).attr("data");
		var page_view_color = $(".palet_colors").attr("data");
		var urline=$("#ur_timeline").attr("data");
		$.ajax({
			type:"POST",
			url: urline+"index.php?accion=configcolors_page",
			data: {colorparent:confi,page_view_c:page_view_color},
			cache: false,
			success: function(data){
				location.reload()
			}
		});
	});
</script>