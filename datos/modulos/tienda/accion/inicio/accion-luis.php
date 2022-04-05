<?php
$base=Luis::basepage("base_page");
$categorias=DatosAdmin::mostrar_categorias(); 
$idexhtmls="<h1 class=\"titlecurrentpage\">".Luis::head_init("name")."</h1>";
$idexhtmls.="<div class=\"contenspage\">";
$idexhtmls.="<div class=\"list_view_items\">";
foreach ($categorias as $cart){
	$idexhtmls.="<div class=\"items_lists\">";
	$idexhtmls.="<a class=\"view_items_timeline_page\" href=\"".$base.$cart->ukr."\" aria-label=\"".$cart->ukr."\" data_int=\"1\">";
	$idexhtmls.="<div class=\"item_view_index\" style=\"background:url(".$base."datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb/".$cart->logo.");\">";
	$idexhtmls.="<span class=\"item_view_name\">".html_entity_decode($cart->nombre)."</span>";
	$idexhtmls.="</div>";
	$idexhtmls.="</a>";
	$idexhtmls.="</div>";
}
$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;
