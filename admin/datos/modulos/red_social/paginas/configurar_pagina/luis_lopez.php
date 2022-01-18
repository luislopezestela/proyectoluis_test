<?php
$temas=Luis::listartemas();
$colores=Luis::listacolores();
$active=false;
$tema_view=false;
$active_colk=false;
$selec_cold=false;
?>
<div class="contenido">
	<span class="suptitles">Temas</span>
	<?php foreach($temas as $t): ?>
		<?php if($active==$t->estado){$typeactive="activartema";}else{$typeactive="activetema";$active_colk=$t->color_admin;$tema_view=$t->id;}?>
		<div class="boxtemas <?=$typeactive;?>" data="<?=$t->id;?>">
			<?=html_entity_decode($t->nombre_label);?>
		</div>
	<?php endforeach ?>
</div>
<br>
 <span class="suptitles">Colores</span>
<div class="palet_colors" data="<?=$tema_view;?>">
	<?php foreach($colores as $c): ?>
		<?php if($c->id===$active_colk): ?>
			<?php $selec_cold='<span class="colorviewactive"></span>';?>
			<?php else: ?>
			<?php $selec_cold='';?>
		<?php endif ?>
		<?='<div class="color_view color_config" style="background:'.$c->color_primario.';border:4px solid '.$c->color_segundario.';" data="'.$c->id.'">'.$selec_cold.'</div>';?>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).on("click", ".activartema", function(){
		var confi = $(this).attr("data");
		var urline=$("#ur_timeline").attr("data");
		$.ajax({
			type:"POST",
			url: urline+"index.php?accion=configpages",
			data: {confiparent:confi},
			cache: false,
			success: function(data){
				location.reload()
			}
		});
	});
	$(document).on("click", ".color_config", function(){
		var confi = $(this).attr("data");
		var page_view_color = $(".palet_colors").attr("data");
		var urline=$("#ur_timeline").attr("data");
		$.ajax({
			type:"POST",
			url: urline+"index.php?accion=configcolors",
			data: {colorparent:confi,page_view_c:page_view_color},
			cache: false,
			success: function(data){
				location.reload()
			}
		});
	});
</script>