<?php
$base=Luis::basepage("base_page");
$base_x=Luis::basepage("base_page_admin");
$uks=DatosAdmin::poner_guion(strip_tags($_GET["viewind"]));
$cartas=DatosCarta::porUkr($uks);
if($cartas===null){
	echo json_encode(array('type' => 0, 'mensaje' => "La carta no existe."));
}else{
	$imagenes=DatosImagenes::mostrar_imagen_carta($cartas->id);
	$fecha=Functions::fechasluislopes($cartas->fecha);
	$nombres=html_entity_decode($cartas->nombre);
	$countbo=DatosCarta::Contar_opciones_carta($cartas->id)->c;
	$urls=$base_x."carta/editar/".$uks;
	$url_item_list=$base_x."carta/view/".$uks."/all";
	$cantidad_items_carta_all=DatosCarta::Contar_items_carta_all($cartas->id)->c;

	
	$optionesCarta=DatosCarta::Mostrar_opciones_carta($cartas->id);
	$options_cart="";
	foreach($optionesCarta as $ocr){
		$contaritems=DatosCarta::Contar_items_opciones_carta($ocr->id)->c;
		$options_cart.='<div class="contentboxitemslist view_carta_option_'.$ocr->id.'">';
		$options_cart.='<div class="detaillsboxlists">';
		$options_cart.='<div class="tluisboxunli name_list_option'.$ocr->id.'">'.html_entity_decode($ocr->nombre).'</div>';
		if($ocr->estado){
			$options_cart.='<div class="tluisboxunlipubl">Publicado</div>';
		}else{
			$options_cart.='<div class="tluisboxunlipubl">Sin publicar</div>';
		}

		if($contaritems==null){
			$options_cart.='<span class="tluisboxunlipubl cant_opions">0 Items</span>';
		}elseif($contaritems==1){
			$options_cart.='<span class="tluisboxunlipubl cant_opions">Un Item</span>';
		}elseif($contaritems>=2){
			$options_cart.='<span class="tluisboxunlipubl cant_opions">'.$contaritems.' Items</span>';
		}else{
			$options_cart.='<span class="tluisboxunlipubl cant_opions">'.$contaritems.' Items</span>';
		}

		$options_cart.='</div>';
		$options_cart.='<div class="opcionesblocklist opcionesblocklist1000boxlist">';
		$options_cart.='<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">';
		$options_cart.='<span class="opcionesblocklistoption opcionesblocklistoption100">';
		$options_cart.='<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>';
		$options_cart.='</span>';
		$options_cart.='</a>';
		$options_cart.='<div class="boxoptionslistlines">';
		$options_cart.='<div class="makposdind"></div>';
		$options_cart.='<a href="'.$base_x.'carta/view/'.$cartas->ukr.'/'.$ocr->ukr.'"><div class="boxoptionslistitems">Ver publicacion</div></a>';
		
		$options_cart.='<div class="boxoptionslistitems option_carta_functions_update" data="'.$ocr->id.'">Editar publicacion</div>';

		$options_cart.='<div class="modal closet_modal_listems" data="'.$ocr->id.'" data-modal-name="option_carta_update_'.$ocr->id.'" data-modal-dismiss closet_modal="'.$ocr->id.'">';
		$options_cart.='<div class="modal__dialog">';
		$options_cart.='<header class="modal__header">';
		$options_cart.='<h3 class="modal__title">Editar opcion.</h3>';
		$options_cart.='<i class="modal__close" data-modal-dismiss>X</i>';
		$options_cart.='</header>';
		$options_cart.='<div class="modal__content">';
		$options_cart.='<input class="input_update_modal name_option_carta_update_'.$ocr->id.'" type="text" placeholder="Nombre" value="'.html_entity_decode($ocr->nombre).'">';
		$options_cart.='<span class="button_update_modal button_option_carta_list_update" data="'.$ocr->id.'" data-x="'.$cartas->id.'">Editar</span>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';

		$options_cart.='<div class="boxoptionslistitems option_carta_functions" data="'.$ocr->id.'">Eliminar</div>';
		$options_cart.='<div class="modal closet_modal_listems_up" data="'.$ocr->id.'" data-modal-name="option_carta_'.$ocr->id.'" data-modal-dismiss closet_modal_up="'.$ocr->id.'">';
		$options_cart.='<div class="modal__dialog">';
		$options_cart.='<header class="modal__header">';
		$options_cart.='<h3 class="modal__title">Eliminar</h3>';
		$options_cart.='<i class="modal__close" data-modal-dismiss>X</i>';
		$options_cart.='</header>';
		$options_cart.='<div class="modal__content">';
		$options_cart.='<div class="case_delete_view">';
		$options_cart.='<span class="option_delete_views option_confirm confirm_delete_opcion_carta" data="'.$ocr->id.'" data-x="'.$cartas->id.'">Eliminar</span>';
		$options_cart.='<span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
	}



	$foto='<img src="'.$base.'datos/modulos/'.Luis::temass().'/source/imagenes/carta/'.$cartas->id.'/thumb/'.$imagenes->imagen.'" title="'.html_entity_decode($cartas->nombre).'">';
	echo json_encode(array('type' => 1, 'mensaje' => $cartas->nombre, 'url' => $uks, 'date' => $fecha, 'nombre' => $nombres, 'img' => $foto, 'url' => $urls, 'cart_view_one' => $cartas->id, 'cantidad' => $countbo, 'options_carts' => $options_cart, 'cantidad_items' => $cantidad_items_carta_all, 'url_items' => $url_item_list));
}
