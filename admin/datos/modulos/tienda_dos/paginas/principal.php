<?php
Luis::httpconf();
$logopagina = Luis::page_conf("header")->logo_img;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=Luis::head_init("title");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="title" content="<?=Luis::head_init("title");?>">
	<meta name="theme-color" content="<?=Luis::head_init("primarycolor");?>">
	<link rel="shortcut icon" href="<?=Luis::basepage("base_page_admin")."datos/imagenes/logo.png";?>">
	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page_admin")."datos/source/estilos/estilosad.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page_admin")."datos/source/estilos/csnots.css";?>">
	<?php if(isset($_SESSION["admin_id"])):?>
		<link rel="stylesheet" type="text/css" href="<?=Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/estilos/estilos.css";?>">
	<?php endif ?>
	<?=Luis::styles();?>
	<script src="<?=Luis::basepage("base_page_admin")."datos/source/scripts/jquery.min.js";?>"></script>
	<script src="<?=Luis::basepage("base_page_admin")."datos/source/scripts/pages.js";?>"></script>
</head>
<body id="bod">
	<div class="mensaje100"></div>
	<div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
	<div id="ur_timeline" data="<?=Luis::basepage("base_page_admin");?>"></div>
	<?=DatosAdmin::page_timeline_view();//unset($_SESSION['admin_id']);?>
	<?=Luis::scripts_footer();?>
	<?php if(isset($_SESSION["admin_id"])):?>
	<script type='text/javascript' src="<?=Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/scripts/pagehom.js";?>"></script>
	<?php endif ?>
</body>
</html>