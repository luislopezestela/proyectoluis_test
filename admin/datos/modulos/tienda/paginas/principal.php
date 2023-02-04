<?php
ob_start();
Luis::httpconf();
$logopagina = Luis::page_conf("header")->logo_img;
if(isset($_GET["paginas"])){
	$urb=explode("/", $_GET["paginas"]);
	if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
	if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
}
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
	<?php if (isset($_GET["paginas"])): ?>
		<?php if($_GET["paginas"]=="sucursales/".$urb1 or $_GET["paginas"]=="sucursales/".$urb1."/".$urb2): ?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzVClbbKRZ2Id-N8Xr-Sws5Z32NpVB-JY"></script>
			<script src="<?=Luis::basepage("base_page_admin")."datos/source/scripts/maps.js";?>"></script>
		<?php endif ?>
	<?php endif ?>
	
</head>
<body id="bod">
	<div class="mensaje100"></div>
	<div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
	<div id="ur_timeline" data="<?=Luis::basepage("base_page_admin");?>"></div>
	
	<?php if(isset($_SESSION['adios_user'])): ?>
	<p class="message_session_unsed">Session finalizado.</p>
	<?php unset($_SESSION['adios_user']); else: ?>
	<?php endif ?>
	<?=Luis::scripts_footer();?>
	<?php if(isset($_SESSION["admin_id"])):?>
	<script type='text/javascript' src="<?=Luis::basepage("base_page_admin")."datos/modulos/".Luis::temass()."/source/scripts/pagehom.js";?>"></script>
	<?php endif ?>
</body>
</html>
<?php
ob_end_flush();
?>