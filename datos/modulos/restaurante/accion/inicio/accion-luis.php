<?php
$base=Luis::basepage("base_page");
$cartas=DatosCarta::MostrarCartas(); 
$idexhtmls="<h1 class=\"titlecurrentpage\">".Luis::head_init("name")."</h1>";
$idexhtmls.="<hr>";
$idexhtmls.="<div class=\"contenspage\">";
$idexhtmls.="<div class=\"list_view_items\">";
foreach ($cartas as $cart){
	$image=DatosImagenes::mostrar_imagen_carta($cart->id);
	$idexhtmls.="<div class=\"items_lists\">";
	$idexhtmls.="<a class=\"view_items_timeline_page\" href=\"".$base.$cart->ukr."\" aria-label=\"".$cart->ukr."\" data_int=\"1\">";
	$idexhtmls.="<div class=\"item_view_index\" style=\"background:url(".$base."datos/modulos/".Luis::temass()."/source/imagenes/carta/".$cart->id."/thumb/".$image->imagen.");\">";
	$idexhtmls.="<span class=\"item_view_name\">".html_entity_decode($cart->nombre)."</span>";
	$idexhtmls.="</div>";
	$idexhtmls.="</a>";
	$idexhtmls.="</div>";
}
$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;
