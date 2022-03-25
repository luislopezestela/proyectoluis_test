<?php
Luis::httpconf();
$logopagina = Luis::dato("luis_logo")->valor;
$head=Functions::header_disp();
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages"><?=Luis::head_init("title");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="title" content="<?=Luis::head_init("title");?>">
	<meta name="keywords" content="<?=Luis::head_init("keywords");?>">
	<meta name="description" content="<?=Luis::head_init("description");?>">
	<meta name="robots" content="INDEX, FOLLOW">
	<meta name="theme-color" content="<?=Luis::head_init("primarycolor");?>">
	<?php if(!isset($_GET["paginas"])): ?>
		<meta property="og:title" content="<?=Luis::head_init("title");?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?=Luis::basepage("base_page");?>">
		<?php if($logopagina): ?>
			<?php $image_logo="admin/datos/imagenes/pagina/".$logopagina; ?>
			<?php if(is_file($image_logo)): ?>
				<meta property="og:image" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
			<?php endif ?>
		<?php endif ?>
		<meta property="og:site_name" content="<?=Luis::head_init("name");?>">
		<?php if($logopagina): ?>
			<?php $image_logo="admin/datos/imagenes/pagina/".$logopagina; ?>
			<?php if(is_file($image_logo)): ?>
				<meta property="og:image:secure_url" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
			<?php endif ?>
		<?php endif ?>
		<meta property="og:description" content="<?=Luis::head_init("description");?>">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="<?=Luis::head_init("title");?>">
		<meta name="twitter:description" content="<?=Luis::head_init("description");?>">
		<?php if($logopagina): ?>
			<?php $image_logo="admin/datos/imagenes/pagina/".$logopagina; ?>
			<?php if(is_file($image_logo)): ?>
				<meta name="twitter:image" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>
	<link hreflang="es-PE" rel="alternate" href="<?=Luis::basepage("base_page");?>">
	<?php if($logopagina): ?>
		<?php $image_logo="admin/datos/imagenes/pagina/".$logopagina; ?>
		<?php if(is_file($image_logo)): ?>
			<link rel="shortcut icon" href="<?=Luis::basepage("base_page_admin")."datos/imagenes/pagina/".$logopagina;?>">
		<?php else: ?>
			<link rel="shortcut icon" href="<?=Luis::basepage("base_page_admin")."datos/imagenes/icons/foto.png";?>">
		<?php endif ?>
	<?php endif ?>

	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page_admin")."datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/estilos.css";?>">
	<?php if(isset($head->nombre)): ?>
		<?php if($head->nombre=="header_base"):?>
			<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_base.css";?>">
		<?php elseif($head->nombre=="header_duc"):?>
			<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_duc.css";?>">
		<?php elseif($head->nombre=="header_gog"):?>
			<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/header_gog.css";?>">
		<?php endif ?>
	<?php endif ?>
	<?=Luis::styles(false);?>
	<script src="<?=Luis::basepage("base_page_admin")."datos/source/scripts/jquery.min.js";?>"></script>
	 
</head>
<body id="body_luis_lopez">
	<div class="mensaje100"></div>
	<div class="andloadpage"></div>
	<div id="page_error_line"></div>
	<div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
	<div id="ur_timeline" data="<?=Luis::basepage("base_page");?>" data-x="<?=Luis::temass();?>"></div>
	<div class="contenidopage" id="contenidopage">
		<?=DatosPagina::headerpage(); ?>
		<div class="pages_list_timeline">
			<?=Vista::load("index"); ?>
		</div>
	</div>
	<?=Luis::scripts_footer();?>
	<?php if(isset($head->nombre)): ?>
		<?php if($head->nombre=="header_base"):?>
			<script src="<?=Luis::basepage("base_page")."datos/source/scripts/header_base.js";?>"></script>
			<?php elseif($head->nombre=="header_duc"):?>
			<script src="<?=Luis::basepage("base_page")."datos/source/scripts/header_duc.js";?>"></script>
		<?php endif ?>
	<?php endif ?>
	<script src="<?=Luis::basepage("base_page")."datos/source/scripts/script.js";?>"></script>
</body>
</html>