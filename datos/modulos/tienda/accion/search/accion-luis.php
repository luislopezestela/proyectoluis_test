<?php
$base = Luis::basepage("base_page");
$itemsdata = DatosAdmin::buscar_items_page($_POST['data']);

$search = "<span class=\"search_title\">Busqueda</span>";
$search .="<div class=\"conten_searchs_data\">";

	foreach ($itemsdata as $s) {
		$image_int=DatosImagenes::mostrar_imagen_items_carta($s->id);
		$view = DatosAdmin::getById_categoria($s->categoria);
		$search .="<div class=\"search_item\" >";
		$search .="<a class=\"view_items_lista_view_page\" href=\"".$base.$view->ukr."/".$s->ukr."\" aria-label=\"".$s->ukr."\" data_null_page=\"".$view->ukr."\" data_int=\"2\">";
			$direct_true="datos/modulos/".Luis::temass()."/source/imagenes/items/".$s->id;
			if(is_dir($direct_true)){
				$search.="<picture><img class=\"search_itemstimg\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$s->id."/thumb/".$image_int->imagen."\"></picture>";
			}else{
				$search.="<picture><img class=\"search_itemstimg\" src=\"".$base."admin/datos/imagenes/icons/foto.png"."\"></picture>";
			}
			$search.="<span class=\"title_item_search\">".html_entity_decode($s->nombre)."</span>";
			if($s->moneda_b){
				$moneda_por_id_b=DatosAdmin::Mostrar_las_monedas_por_id($s->moneda_b)->simbolo;
			}else{
				$moneda_por_id_b=false; 
			}
			$search.="<span class=\"price_search_price\"> ".$moneda_por_id_b.".".$s->precio_final."</span>";
		$search .="</a>";
		$search .="</div>";
	}
$search .="</div>";
echo json_encode(array("estado" => 1, 'data_rt' => $search));
?>