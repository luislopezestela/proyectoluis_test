<?php
$ukr=DatosAdmin::poner_guion(strip_tags($_POST["index"]));
$menu=Luis::menu_porUkr($ukr);

if(isset($_POST["gold_black"])==1){
	$cartas=DatosAdmin::categoria_view_one($ukr); 
	if($cartas){
		echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $cartas->nombre));
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404"));
	}
}elseif(isset($_POST["gold_black_two"])==2){
	$ukr_a=DatosAdmin::poner_guion(strip_tags($_POST["lineal_ind"]));
	$items=DatosAdmin::porUkr_items_page($ukr);
	if($items){
		echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'url_a' => $ukr_a, 'title' => $items->nombre));
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404 1"));
	}
}elseif($_POST["index"]=="carrito"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'jspage' => "carrito_js", 'title' => "CARRITO"));
}elseif($_POST["index"]=="perfil"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'jspage' => "perfil_js", 'title' => "PERFIL"));
}elseif($_POST["index"]=="perfil/direcciones"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => "perfil/direcciones", 'jspage' => "perfil_js", 'title' => "PERFIL | DIRECCIONES"));
}elseif($_POST["index"]=="perfil/historial_compras"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => "perfil/historial_compras", 'jspage' => "perfil_js", 'title' => "PERFIL | HISTORIAL DE COMPRAS"));
}elseif($_POST["index"]=="perfil/configurar"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => "perfil/configurar", 'jspage' => "perfil_js", 'title' => "PERFIL | CONFIGURAR"));
}elseif($_POST["index"]=="perfil/cambiar_pass"){
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => "perfil/cambiar_pass", 'jspage' => "perfil_js", 'title' => "PERFIL | CAMBIAR PASSWORD"));
}elseif($menu===null){
	echo json_encode(array('type' => 0, 'mensaje' => "Error 404, pagina no existe", 'title' => "Error 404"));
}elseif($menu->home){
	echo json_encode(array('type' => 2, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $menu->label_menu));
}else{
	echo json_encode(array('type' => 1, 'mensaje' => "cargando..", 'url' => $ukr, 'title' => $menu->titulo));
}