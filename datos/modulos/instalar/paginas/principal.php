<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages">Instalar</title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#2c3e50">
	<link rel="shortcut icon" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/source/icons/shield.png";?>">
	<link rel="stylesheet" type="text/css" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."admin/datos/source/estilos/estilo.css";?>">
	<link rel="stylesheet" type="text/css" href="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/modulos/instalar/source/style.css";?>">
	<script src="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."admin/datos/source/scripts/jquery.min.js";?>"></script>
</head>
<body id="body_luis_lopez">
	<div class="mensaje100"></div>
	<div class="andloadpage"></div>
	<div id="page_error_line"></div>
	<div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
	<div class="contenidopage" id="contenidopage">
		<div class="pages_list_timeline">
			<?=Vista::load("index"); ?>
		</div>
	</div>
	<?=Luis::scripts_footer();?>
	<script src="<?="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."datos/modulos/instalar/source/script.js";?>"></script>
</body>
</html>