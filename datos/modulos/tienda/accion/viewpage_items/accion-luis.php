<?php
$menu=Luis::menu_porUkr($_GET["viewind"]);
if(isset($menu)==null) {
	$pages=Luis::viewpagelink("viewitems");
	$stylespage=Luis::styles($_GET["viewind"]);
	$view = DatosAdmin::categoria_view_one($_GET['viewind']);
	if($view==null){
		echo json_encode(array('type' => 0, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => "Error 404"));
	}else{
		$carta_list=DatosAdmin::categoriaporUkr($_GET['viewind']);
		$titlepages = html_entity_decode($carta_list->nombre);
		echo json_encode(array('type' => 1, 'mensaje' => "4", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => $titlepages));
	}
}else{
	$pages=Luis::viewpagelink($_GET['viewind']);
	$stylespage=Luis::styles($_GET['viewind']);
	$titlepages = html_entity_decode($menu->label_menu);
	echo json_encode(array('type' => 1, 'mensaje' => $_GET['viewind'], 'datapage' => $pages, 'stylepage' => $stylespage, "title" => $titlepages));
}
