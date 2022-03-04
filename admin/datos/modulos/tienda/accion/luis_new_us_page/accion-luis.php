<?php
$_POST["dni"];
$_POST["nombres"];
$_POST["apellido_paterno"];
$_POST["apellido_materno"];
$_POST["correo"];
$_POST["pass"];
$_POST["pass_ver"];

$correos = DatosMails::check_email($_POST["correo"]);
if($correos){
	if($_POST["pass"]==$_POST["pass_ver"]) {
		$person = new Luis::user_administrador_principal();
		$person->dni = 
		$person->nombre = 
		$person->apellido_paterno = 
		$person->apellido_materno = 
		$person->correo = 
		$person->pass = 
		$person->crear_super_usuario_admin();
		echo json_encode(array("type" => 1,'mensaje' => "Genial"));
	}else{
		echo json_encode(array("type" => 0,'mensaje' => "La contrase&ntilde;a no son iguales."));
	}
	
}else{
	echo json_encode(array("type" => 0,'mensaje' => "El correo no es valido"));
}