<style type="text/css">
	.contiene_config_temas{
		display:block;
		width:100%;
		max-width:1280px;
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
				<?php if(isset($head->nombre)): ?>
					<?php if($head->nombre=="header_base"):?>
						<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_base.css";?>">
					<?php elseif($head->nombre=="header_duc"):?>
						<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_duc.css";?>">
					<?php elseif($head->nombre=="header_gog"):?>
						<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_gog.css";?>">
					<?php endif ?>
				<?php endif ?>
				<?=DatosPagina::headerpage_b();?>






			</div>
		<?php else: //////////////////////////////////////////?>
			<?php header('location:'.$base."tema_select_page");?>
		<?php endif ?>
	<?php else: ?>
		<?php header('location:'.$base."tema_select_page");?>
	<?php endif ?>

<?php else: ?>
<?php endif ?>