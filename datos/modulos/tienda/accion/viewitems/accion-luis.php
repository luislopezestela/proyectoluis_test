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
$view = DatosAdmin::categoria_view_one($unlineidexe);
$carta_list=DatosAdmin::categoriaporUkr($unlineidexe);
$items_viewa=DatosAdmin::MostrarItems_cartas_opciones($carta_list->id);
$idexhtmls="<h2 class=\"titlecurrentpage\">".html_entity_decode($carta_list->nombre)."</h2>";
$chek_item=false;
$idexhtmls.="<div class=\"contenspage\">";
$idexhtmls.="<div class=\"menu_item_list_option\">";
if(count($items_viewa)>0){
	foreach($items_viewa as $tms){
		if($chek_item==$tms->id){
		}else{
			$image_int=DatosImagenes::mostrar_imagen_items_carta($tms->id);

			
			$idexhtmls.="<div class=\"items_list_views\">";
			$idexhtmls.="<a class=\"view_items_lista_view_page\" href=\"".$base.$view->ukr."/".$tms->ukr."\" aria-label=\"".$tms->ukr."\" data_null_page=\"".$carta_list->ukr."\" data_int=\"2\">";
			$idexhtmls.="<div class=\"boxpictureliststb\">";
			$direct_true="datos/modulos/".Luis::temass()."/source/imagenes/items/".$tms->id;
			if(is_dir($direct_true)){
				$idexhtmls.="<picture><img class=\"boxpictureliststimg\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$tms->id."/thumb/".$image_int->imagen."\"></picture>";
			}else{
				$idexhtmls.="<picture><img class=\"boxpictureliststimg\" src=\"".$base."admin/datos/imagenes/icons/foto.png"."\"></picture>";
			}
			
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"opciones_items\">";
			$idexhtmls.="<div class=\"view_imfor_text\">";
			$idexhtmls.="<div class=\"left_text_view\">";
			$idexhtmls.="<span class=\"title_item_view_list\">".html_entity_decode($tms->nombre)."</span>";
			$idexhtmls.="</div>";
			$idexhtmls.="<div class=\"price_view_items\">";
			if($tms->moneda_b){
				$moneda_por_id_b=DatosAdmin::Mostrar_las_monedas_por_id($tms->moneda_b)->simbolo;
			}else{
				$moneda_por_id_b=false; 
			}
			$idexhtmls.="<span class=\"price_view_items_price\"> ".$moneda_por_id_b.".".$tms->precio_final."</span>";
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";
			$idexhtmls.="</div>";
			$idexhtmls.="";
			$idexhtmls.="</a>";
			$idexhtmls.="</div>";
		}
	}
}
$idexhtmls.="</div>";
$idexhtmls.="</div>";
return $idexhtmls;

                           