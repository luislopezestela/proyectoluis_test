<?php
$pages=Luis::viewpagelink("viewitems_item_view");

if (isset($_GET['viewind'])){
	$unlineidexe=$_GET['viewind'];
}else{
	if(isset($_GET["paginas"])){
		$urb=explode("/", $_GET["paginas"]);
		if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
		$unlineidexe=$urb1;
	}else{
		$unlineidexe=false;
	}
	
}
$stylespage=Luis::styles($unlineidexe);
$view = DatosAdmin::porUkr_items_page($unlineidexe);
if($view==null){
	echo json_encode(array('type' => 0, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => "Error 404"));
}else{
	$titlepages = html_entity_decode($view->nombre);
	echo json_encode(array('type' => 1, 'mensaje' => "", 'datapage' => $pages, 'stylepage' => $stylespage, "title" => $titlepages));
}