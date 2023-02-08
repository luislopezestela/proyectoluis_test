<?php
$base=Luis::basepage("base_page");
$categorias=DatosAdmin::mostrar_categorias(); 
$diapositiva = DatosAdmin::diapositivas_lista_public();
$servicios = DatosAdmin::servicios_public();
$idexhtmls="<div class=\"b_contenido_onb_page_luis\">";
$idexhtmls.="<div class=\"c_contenido_onb_page_luis\">";

$idexhtmls.="<div class=\"slider_view_in_page\">";
foreach($diapositiva as $di){
	$img_slide = DatosAdmin::diapositiva_image($di->id);
	if($di->url){
		$urlactive="href=\"".html_entity_decode($di->url)."\"";
	}else{
		$urlactive="";
	}
	$idexhtmls.="<a ".$urlactive."><picture>";
	$idexhtmls.="<source class=\"for-mobile\" srcset=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$di->id."/thumb_".$img_slide->imagen."\" media=\"(max-width: 768px)\">";
	$idexhtmls.="<img class=\"for-desktop first\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$di->id."/".$img_slide->imagen."\" alt=\"".html_entity_decode($di->nombre)."\">";
	$idexhtmls.="<div class=\"bannerTextcontent\">";
	$idexhtmls.="<div class=\"bannerText\">";
	$idexhtmls.="<div class=\"banText\">";

	$idexhtmls.="<div class=\"banText_conten\">";
	$idexhtmls.="<h3><span>".html_entity_decode($di->nombre)."</span></h3>";
	$idexhtmls.="<div class=\"st_texts\">".ucfirst(html_entity_decode($di->texto))."</div>";
	$idexhtmls.="</div>";

	$idexhtmls.="<div class=\"banText_btns\">";
	if($di->boton){
		$idexhtmls.="<button class=\"ban-button-btn\">".Luis::lang($di->boton)."</button>";
	}
	
	$idexhtmls.="<p>* Imágenes referenciales sujetas a variación.</p>";
	$idexhtmls.="</div>";


	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
	$idexhtmls.="</picture></a>";

}
$idexhtmls.="</div>";


$idexhtmls.="<div class=\"block_service_lu\">";
$idexhtmls.="<ul class=\"list_service_lu\">";
foreach($servicios as $ser){
	$idexhtmls.="<li>";
	    $idexhtmls.="<a class=\"view_servicios_timeline_page\" href=\"".$base.$ser->url."\" aria-label=\"".$ser->url."\" data_int=\"3\">";
	        $idexhtmls.="<img src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$ser->icono."\" alt=\"".$ser->nombre."\">";
	        $idexhtmls.="<p>".html_entity_decode($ser->nombre)."</p>";
	    $idexhtmls.="</a>";
	$idexhtmls.="</li>";
}
$idexhtmls.="</ul>";
$idexhtmls.="</div>";




$idexhtmls.="<div class=\"contenspage\">";
$idexhtmls.="<div class=\"list_view_items\">";
foreach ($categorias as $cart){
	$idexhtmls.="<div class=\"items_lists\">";
	$idexhtmls.="<a class=\"view_items_timeline_page\" href=\"".$base.$cart->ukr."\" aria-label=\"".$cart->ukr."\" data_int=\"1\">";
	$idexhtmls.="<img  class=\"item_view_index\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb/".$cart->logo."\">";
	$idexhtmls.="<span class=\"item_view_name\">".html_entity_decode($cart->nombre)."</span>";

	$idexhtmls.="</a>";
	$idexhtmls.="</div>";
}
$idexhtmls.="</div>";
$idexhtmls.="</div>";


$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;

?>