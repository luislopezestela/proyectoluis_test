<?php
Luis::httpconf();
$logopagina = Luis::page_conf("header")->logo_img;
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
		<meta property="og:image" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
		<meta property="og:site_name" content="<?=Luis::head_init("name");?>">
		<meta property="og:image:secure_url" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
		<meta property="og:description" content="<?=Luis::head_init("description");?>">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="<?=Luis::head_init("title");?>">
		<meta name="twitter:description" content="<?=Luis::head_init("description");?>">
		<meta name="twitter:image" content="<?=Luis::basepage("base_page")."admin/datos/imagenes/pagina/".$logopagina;?>">
	<?php endif ?>
	<link hreflang="es-PE" rel="alternate" href="<?=Luis::basepage("base_page");?>">
	<link rel="shortcut icon" href="<?=Luis::basepage("base_page_admin")."datos/imagenes/pagina/".$logopagina;?>">
	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page_admin")."datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page")."datos/source/estilos/estilos.css";?>">
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
	<script src="<?=Luis::basepage("base_page")."datos/source/scripts/script.js";?>"></script>
</body>
</html>