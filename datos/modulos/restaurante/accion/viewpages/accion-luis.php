<?php
$ukr=DatosAdmin::poner_guion(strip_tags($_POST["index"]));
$menu=Luis::menu_porUkr($ukr);

if(isset($_POST["gold_black"])==1){
	$cartas=DatosCarta::carta_view_one($ukr); 
	if($cartas){
		echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $cartas->nombre));
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404"));
	}
}elseif(isset($_POST["gold_black_two"])==2){
	$ukr_a=DatosAdmin::poner_guion(strip_tags($_POST["lineal_ind"]));
	$items=DatosCarta::porUkr_items_page($ukr);
	if($items){
		echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'url_a' => $ukr_a, 'title' => $items->nombre));
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404 1"));
	}
}elseif($menu===null){
	echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404"));
}elseif($menu->home){
	echo json_encode(array('type' => 2, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $menu->label_menu));
}else{
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $menu->titulo));
}