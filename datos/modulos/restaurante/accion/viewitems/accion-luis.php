<?php
if (isset($_GET['viewind'])){
	$unlineidexe=$_GET['viewind'];
}else{
	if(isset($_GET["paginas"])){
		$urb=explode("/", $_GET["paginas"]);
		if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
		$unlineidexe=$urb0;
	}else{
		$unlineidexe=false;
	}
	
}
$base=Luis::basepage("base_page");
$view = DatosCarta::carta_view_one($unlineidexe);
$carta_list=DatosCarta::porUkr($unlineidexe);
$opciones_menu=DatosCarta::Mostrar_opciones_carta($view->id);
$items_viewa=DatosCarta::MostrarItems_cartas_opciones($carta_list->id);
$idexhtmls="<h2 class=\"titlecurrentpage\">".html_entity_decode($carta_list->nombre)."</h2>";
$chek_item=false;
$idexhtmls.="<div class=\"contenspage\">";

foreach($opciones_menu as $men){
	$items_viewa_l=DatosCarta::por_opciones_list_view($men->id);
	if (count($items_viewa_l)>0){
	$idexhtmls.="<div class=\"menu_item_list_option\">";
	$idexhtmls.="<label class=\"barra_list_hend\">".html_entity_decode($men->nombre)."</label>";
	foreach ($items_viewa_l as $tm){
		$chek_item=$tm->id;
		$image_int=DatosImagenes::mostrar_imagen_items_carta($tm->id);
		$idexhtmls.="<div class=\"items_list_views\">";
		$idexhtmls.="<div class=\"boxpicturelistst\">";
		$idexhtmls.="<picture><img class=\"boxpictureliststimg\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$tm->id."/thumb/".$image_int->imagen."\"></picture>";
		$idexhtmls.="</div>";
		$idexhtmls.="<div class=\"opciones_items\">";
		$idexhtmls.="<div class=\"view_imfor_text\">";
		$idexhtmls.="<div class=\"left_text_view\">";
		$idexhtmls.="<span class=\"title_item_view_list\">".html_entity_decode($tm->nombre)."</span>";
		$idexhtmls.="</div>";
		$idexhtmls.="<div class=\"price_view_items\">";
		$idexhtmls.="<span class=\"price_view_items_price\">S/. ".$tm->precio."</span>";
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
		$idexhtmls.="<div class=\"direct_list_view_item\">";
		$idexhtmls.="<a class=\"view_items_lista_view_page\" href=\"".$base.$view->ukr."/".$tm->ukr."\" aria-label=\"".$tm->ukr."\" data_null_page=\"".$carta_list->ukr."\" data_int=\"2\">COMPRAR</a>";
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
		$idexhtmls.="</div>";
	}
	$idexhtmls.="</div>";
	}
}

$idexhtmls.="<div class=\"menu_item_list_option\">";
if(count($items_viewa)>0){
	$idexhtmls.="<label class=\"barra_list_hend\"></label>";
	foreach($items_viewa as $tms){
		if($chek_item==$tms->id){
		}else{
			$image_int=DatosImagenes::mostrar_imagen_items_carta($tms->id);
			$idexhtmls.="<div class=\"items_list_views\">";
			$idexhtmls.="<div class=\"boxpicturelistst\">";
			$idexhtmls.="<picture><img class=\"boxpictureliststimg\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$tms->id."/thumb/".$image_int->imagen."\"></picture>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"opciones_items\">";
			$idexhtmls.="<div class=\"view_imfor_text\">";
			$idexhtmls.="<div class=\"left_text_view\">";
			$idexhtmls.="<span class=\"title_item_view_list\">".html_entity_decode($tms->nombre)."</span>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"price_view_items\">";
			$idexhtmls.="<span class=\"price_view_items_price\">S/. ".$tms->precio."</span>";
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"direct_list_view_item\">";
			$idexhtmls.="<a class=\"view_items_lista_view_page\" href=\"".$base.$view->ukr."/".$tms->ukr."\" aria-label=\"".$tms->ukr."\" data_null_page=\"".$carta_list->ukr."\" data_int=\"2\">COMPRAR</a>";
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";
			$idexhtmls.="";
			$idexhtmls.="</div>";
		}
	}
}
$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;