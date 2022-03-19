<style type="text/css">
	.contiene_config_temas{
		display:block;
		width:100%;
		max-width:1020px;
		margin:10px auto;
	}
</style>
<?php
$base = Luis::basepage("base_page_admin");
if($_SESSION['admin_id']):
	$urb=explode("/", $_GET["paginas"]);
	if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
	?>
	<?php if($urbp): ?>
		<?php $skin_view = Luis::administrar_el_tema($urbp);?>
		<?php if($skin_view): /////////////////////////////////////////// ?>
			<div class="contiene_config_temas">
				//
			</div>
		<?php else: //////////////////////////////////////////?>
			<?php header('location:'.$base."tema_select_page");?>
		<?php endif ?>
	<?php else: ?>
		<?php header('location:'.$base."tema_select_page");?>
	<?php endif ?>

<?php else: ?>
<?php endif ?>