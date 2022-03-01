<?php
// https://localhost/
$pagebase = Luis::dato("luis_base")->valor;
if($pagebase):
if($_SERVER["HTTPS"] != "on"){
    header("Location: https://".$_SERVER["HTTP_HOST"]);
    exit();
}
$base_pg="https://".$_SERVER["HTTP_HOST"]."/";
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages"><?=Luis::lang("bienvenido");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#2c3e50">
	
	<link rel="shortcut icon" href="<?=$base_pg."datos/source/icons/shield.png";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."admin/datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."admin/datos/source/estilos/csnots.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."admin/datos/modulos/bienvenido/source/style.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."admin/datos/modulos/bienvenido/source/welcome.css";?>">
	<script src="<?=$base_pg."admin/datos/source/scripts/jquery.min.js";?>"></script>
	<script src="<?=$base_pg."admin/datos/source/scripts/pages.js";?>"></script>
</head>
<body id="body_luis_lopez">
	<div class="mensaje100"></div>
	<div id="ur_timeline" data="<?=$pagebase."admin/";?>"></div>
	<?=Vista::load("bienvenido"); ?>
	<script src="<?=$base_pg."admin/datos/modulos/bienvenido/source/welcome.js";?>"></script>
</body>
</html>
<?php
else:	
if($_SERVER["HTTPS"] != "on"){
    header("Location: https://".$_SERVER["HTTP_HOST"]);
    exit();
}
$base_pg="https://".$_SERVER["HTTP_HOST"]."/";
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages"><?=Luis::lang("bienvenido");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#2c3e50">
	<link rel="shortcut icon" href="<?=$base_pg."datos/source/icons/shield.png";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."admin/datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."datos/modulos/bienvenido/source/style.css";?>">
	<script src="<?=$base_pg."admin/datos/source/scripts/jquery.min.js";?>"></script>
</head>
<body>
	<div id="ur_timeline" data="<?=$base_pg;?>"></div>
	<?=Vista::welcome_d("index"); ?>
	<script src="<?=$base_pg."admin/datos/modulos/bienvenido/source/script.js";?>"></script>
</body>
</html>
<?php endif ?>