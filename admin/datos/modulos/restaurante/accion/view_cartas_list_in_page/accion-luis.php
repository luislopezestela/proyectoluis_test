<?php
$uks=DatosAdmin::poner_guion(strip_tags($_POST["index"]));
$opciones=DatosCarta::porUkr_opcion_page($uks);
if($uks==="all"){
	echo json_encode(array('type' => 1, 'mensaje' => "Todo", 'url' => $uks));
}elseif($opciones===null){
	echo json_encode(array('type' => 0, 'mensaje' => "La opcion no existe."));
}else{
	echo json_encode(array('type' => 1, 'mensaje' => $opciones->nombre, 'url' => $uks));
}