<?php
	$ukr_a=DatosAdmin::poner_guion(strip_tags($_GET["viewind"]));
	$ukr=DatosAdmin::poner_guion(strip_tags($_GET["subinit"]));
	$cartas=DatosCarta::carta_view_one($_GET["viewind"]);
	$menu=Luis::menu_porUkr($_GET["viewind"]);
if(isset($menu)==null){
	if(isset($cartas)){
		$items = DatosCarta::porUkr_items_page($_GET["subinit"]);
		if(isset($items)){
			echo json_encode(array('type' => 2, 'mensaje' => "", 'url' => $ukr, 'tlp' =>""));
		}else{
			echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => $ukr_a, 'tlp' => ""));
		}
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "null", 'url' => $ukr, 'tlp' => ""));
	}
}else{
	echo json_encode(array('type' => 1, 'mensaje' => "", 'url' => $ukr_a, 'tlp' =>""));
}




