<?php
	$ukr_a=DatosAdmin::poner_guion(strip_tags($_GET["viewind"]));
	$ukr=DatosAdmin::poner_guion(strip_tags($_GET["subinit"]));
	$cartas=DatosAdmin::categoria_view_one($_GET["viewind"]);
	$menu=Luis::menu_porUkr($_GET["viewind"]);
if($_GET["viewind"]=="carrito"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "carrito", 'jspage' => "carrito_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="perfil"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "perfil", 'jspage' => "perfil_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="perfil/direcciones"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "perfil", 'jspage' => "perfil_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="perfil/historial_compras"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "perfil", 'jspage' => "perfil_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="perfil/configurar"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "perfil", 'jspage' => "perfil_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="perfil/cambiar_pass"){
	echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => "perfil", 'jspage' => "perfil_js", 'tlp' =>""));
}elseif($_GET["viewind"]=="serv"){
	$ukr_serv=DatosAdmin::poner_guion(strip_tags($_GET["subinit"]));
	$services=DatosAdmin::serv_view($ukr_serv);
	if(isset($services)) {
		echo json_encode(array('type' => 3, 'mensaje' => $ukr_serv, 'url' => $ukr_serv, 'tlp' =>""));
	}
}elseif(isset($menu)==null){
	if(isset($cartas)){
		$items = DatosAdmin::porUkr_items_page($_GET["subinit"]);
		if(isset($items)){
			echo json_encode(array('type' => 2, 'mensaje' => "", 'url' => $ukr, 'jspage' => "slick.min", 'tlp' =>""));
		}else{
			echo json_encode(array('type' => 1, 'mensaje' => "null", 'url' => $ukr_a, 'jspage' => "slick.min", 'tlp' => ""));
		}
	}else{
		echo json_encode(array('type' => 0, 'mensaje' => "null", 'url' => $ukr, 'jspage' => "slick.min", 'tlp' => ""));
	}
}else{
	echo json_encode(array('type' => 1, 'mensaje' => "", 'url' => $ukr_a, 'jspage' => "slick.min",'tlp' =>""));
}




