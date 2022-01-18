<?php
$id_cart=$_POST["indx"];
$ide=$_POST["ind"];
$nombre=$_POST['nom'];

$ukv=DatosAdmin::poner_guion(strip_tags($nombre));
$carta=DatosCarta::porId($id_cart);
$carta_ukr=DatosCarta::porUkr_opcion($ukv);
$data = new DatosCarta();

if($nombre===""){
	echo json_encode(array('type' => 0, 'mensaje' => "Escribe nombre de la opcion."));
}elseif($carta===null) {
	echo json_encode(array('type' => 0, 'mensaje' => "La carta no existe."));
}elseif($carta_ukr===null){
	$data->id = $ide;
	$data->nombre = htmlspecialchars($nombre);
	$data->ukr = DatosAdmin::poner_guion(strip_tags($nombre));
	$data->update_option_carta();
	echo json_encode(array('type' => 1, 'mensaje' => "Cambios guardados.", 'names' => $nombre));
}else{
	echo json_encode(array('type' => 1, 'mensaje' => "Cambios guardados."));
}