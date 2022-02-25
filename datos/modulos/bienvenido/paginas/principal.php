<?php
// https://localhost/proyectoluis/
$pagebase = Luis::dato("luis_base")->valor;
if($pagebase):
?>
////
<?php
else:	
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages"><?=Luis::lang("bienvenido");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#2c3e50">
	<link rel="shortcut icon" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/source/icons/shield.png";?>">
	<link rel="stylesheet" type="text/css" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."admin/datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/modulos/bienvenido/source/style.css";?>">
	<script src="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."admin/datos/source/scripts/jquery.min.js";?>"></script>
</head>
<body>
	<div id="ur_timeline" data="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?>"></div>
	<?=Vista::load("bienvenido"); ?>
	<script src="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/modulos/bienvenido/source/script.js";?>"></script>
</body>
</html>
<?php endif ?>