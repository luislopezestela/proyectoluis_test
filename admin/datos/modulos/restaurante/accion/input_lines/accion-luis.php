<?php
$uks=DatosAdmin::poner_guion(strip_tags($_POST["index"]));
$cartas=DatosCarta::porUkr($uks);
if($cartas===null){
	echo json_encode(array('type' => 0, 'mensaje' => "La carta no existe."));
}else{
	echo json_encode(array('type' => 1, 'mensaje' => $cartas->nombre, 'url' => $uks));
}