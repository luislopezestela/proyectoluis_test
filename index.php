<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
date_default_timezone_set('America/Lima');
if(file_exists("admin/datos/controlador/BaseDatos.php")){
	include "admin/datos/controlador/BaseDatos.php";
	include "admin/datos/controlador/class.upload.php";
	include "admin/datos/controlador/Functions.php";
	include "datos/controlador/Luis.php";
	include "datos/controlador/Accion.php";
	include "datos/controlador/Cookie.php";
	include "datos/controlador/Ejecutor.php";
	include "datos/controlador/Get.php";
	include "datos/controlador/IpLogger.php";
	include "datos/controlador/Modelo.php";
	include "datos/controlador/Modulo.php";
	include "datos/controlador/Nucleo.php";
	include "datos/controlador/Post.php";
	include "datos/controlador/Session.php";
	include "datos/controlador/Solicitud.php";
	include "datos/controlador/Visitas.php";
	include "datos/controlador/Vista.php";
	include "admin/datos/controlador/Lang.php";
	try{
		$luis = new Luis();
		if(Luis::temass()==""){
			$luis->loadModule("bienvenido");
		}else{
			$luis->loadModule(Luis::temass());
		}
		
		if(mysqli_connect_errno()){
			exit();
		}
	}catch(Exception $e) {
		$luis->loadModule("instalar");
	}
}else{
	$base_pg="https://".$_SERVER["HTTP_HOST"]."/";
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data error</title>
		<link rel="shortcut icon" href="<?=$base_pg."datos/source/icons/shield.png";?>">
	</head>
	<body>
		<style type="text/css">
			.h1h{text-align:center;font-family:monospace;margin-top:56px;}
		</style>
		<h1 class="h1h">Data error. 1</h1>
	</body>
	</html>
	<?php
}