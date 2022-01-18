<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
date_default_timezone_set('America/Lima');
include "admin/datos/controlador/BaseDatos.php";
include "admin/datos/controlador/class.upload.php";
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
$luis = new Luis();
$luis->loadModule(Luis::temass());
if(mysqli_connect_errno()){
exit();
}