<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}

$correos = DatosMails::check_email($_POST["correo"]);
$contra = sha1(md5($_POST['pass']));
$contra2 = sha1(md5($_POST['pass_ver']));
if($correos){
	if($contra==$contra2) {
		$person = new Luis::user_administrador_principal();
		$person->dni = $_POST["dni"];
		$person->nombre = $_POST["nombres"];
		$person->apellido_paterno = $_POST["apellido_paterno"];
		$person->apellido_materno = $_POST["apellido_materno"];
		$person->username = $_POST["nombres"].$codigos;
		$person->correo = $_POST["correo"];
		$person->pass = $contra;
		$person->ukrr = DatosAdmin::poner_guion(strip_tags($_POST["nombres"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_paterno"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_materno"]));
		$person->fecha = date('Y-m-d H:i:s');
		$person->crear_super_usuario_admin();
		echo json_encode(array("type" => 1,'mensaje' => "Genial"));
	}else{
		echo json_encode(array("type" => 0,'mensaje' => "La contrase&ntilde;a no son iguales."));
	}
	
}else{
	echo json_encode(array("type" => 0,'mensaje' => "El correo no es valido"));
}