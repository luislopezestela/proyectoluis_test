<?php
$base=Luis::basepage("base_page");
$base_x=Luis::basepage("base_page_admin");
$uks=DatosAdmin::poner_guion(strip_tags($_GET["viewind"]));
$opcion_p=DatosCarta::porUkr_opcion_page($uks);
if($uks==="all"){
	$prod=DatosCarta::porUkr($_GET["ph"]);
	$cantidad_de_items = DatosCarta::Contar_items_carta_all($prod->id)->c;
	$urls=$base_x."carta/view/".$uks."/all";
	$options_cart="";
	$mostrar_los_items_list = DatosCarta::MostrarItems_cartas_opciones($prod->id);
	foreach ($mostrar_los_items_list as $mps){
		$imgsb_item=DatosImagenes::mostrar_imagen_items_carta($mps->id);
		$dirimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id;
		$options_cart.='<div class="contentboxitemslist view_carta_option_'.$mps->id.'">';
		$options_cart.='<div class="boxpicturelistst">';
		if(is_dir($dirimage)){
			$fileimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;
			if(file_exists($fileimage)){
				if($imgsb_item==null){
					$options_cart.='<picture>';
					$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
					$options_cart.='</picture>';
				}else{
					$options_cart.='<picture>';
					$options_cart.='<img class="boxpictureliststimg" src="'.$base.'datos/modulos/'.Luis::temass().'/source/imagenes/items/'.$mps->id.'/thumb/'.$imgsb_item->imagen.'">';
					$options_cart.='</picture>';
				}
			}else{
				$options_cart.='<picture>';
				$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
				$options_cart.='</picture>';
			}
		}else{
			$options_cart.='<picture>';
			$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
			$options_cart.='</picture>';
		}
		$options_cart.='</div>';


		$options_cart.='<div class="detaillsboxlists">';
		$options_cart.='<div class="tluisboxunli name_list_option'.$mps->id.'">';
		$options_cart.=html_entity_decode($mps->nombre);
		$options_cart.='</div>';
		if($mps->estado){
			$options_cart.='<div class="tluisboxunlipubl">Publicado</div>';
		}else{
			$options_cart.='<div class="tluisboxunlipubl">Sin publicar</div>';
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
		$options_cart.='<a href="'.$base_x.'carta/editar_item/'.$prod->ukr.'/'.$mps->ukr.'"><div class="boxoptionslistitems">Editar publicacion</div></a>';
		$options_cart.='<div class="boxoptionslistitems option_carta_functions" data="'.$mps->id.'" data-modal-trigger="option_carta_'.$mps->id.'">Eliminar</div>';
		$options_cart.='<div class="modal" data-modal-name="option_carta_'.$mps->id.'" data-modal-dismiss>';
		$options_cart.='<div class="modal__dialog">';
		$options_cart.='<header class="modal__header">';
		$options_cart.='<h3 class="modal__title">Eliminar</h3>';
		$options_cart.='<i class="modal__close" data-modal-dismiss>X</i>';
		$options_cart.='</header>';
		$options_cart.='<div class="modal__content">';
		$options_cart.='<div class="case_delete_view">';
		$options_cart.='<span class="option_delete_views option_confirm confirm_delete_opcion_item_carta" data="'.$mps->id.'" data-x="'.$prod->id.'">Eliminar</span>';
		$options_cart.='<span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
	}
	echo json_encode(array('type' => 1, 'mensaje' => "Todo.", 'nombre' => "Todo", 'cantidad' => $cantidad_de_items, 'items_option' => $options_cart));
}elseif($opcion_p===null){
	echo json_encode(array('type' => 0, 'mensaje' => "La opcion no existe."));
}else{
	$nombres=html_entity_decode($opcion_p->nombre);
	$countbo=DatosCarta::Contar_items_carta_opciones($opcion_p->id)->c;
	$urls=$base_x."carta/view/".$uks;

	$prod=DatosCarta::porUkr($_GET["ph"]);
	$mostrar_los_items_list = DatosCarta::MostrarItems_items_opciones($opcion_p->id);
	$options_cart="";
	foreach($mostrar_los_items_list as $mps){
		$imgsb_item=DatosImagenes::mostrar_imagen_items_carta($mps->id);
		$dirimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id;
		$options_cart.='<div class="contentboxitemslist view_carta_option_'.$mps->id.'">';
		$options_cart.='<div class="boxpicturelistst">';
		if(is_dir($dirimage)){
			$fileimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;
			if(file_exists($fileimage)){
				if($imgsb_item==null){
					$options_cart.='<picture>';
					$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
					$options_cart.='</picture>';
				}else{
					$options_cart.='<picture>';
					$options_cart.='<img class="boxpictureliststimg" src="'.$base.'datos/modulos/'.Luis::temass().'/source/imagenes/items/'.$mps->id.'/thumb/'.$imgsb_item->imagen.'">';
					$options_cart.='</picture>';
				}
			}else{
				$options_cart.='<picture>';
				$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
				$options_cart.='</picture>';
			}
		}else{
			$options_cart.='<picture>';
			$options_cart.='<img class="boxpictureliststimg" src="'.$base_x.'datos/modulos/'.Luis::temass().'/source/imagenes/page/noimagen.png'.'">';
			$options_cart.='</picture>';
		}
		$options_cart.='</div>';


		$options_cart.='<div class="detaillsboxlists">';
		$options_cart.='<div class="tluisboxunli name_list_option'.$mps->id.'">';
		$options_cart.=html_entity_decode($mps->nombre);
		$options_cart.='</div>';
		if($mps->estado){
			$options_cart.='<div class="tluisboxunlipubl">Publicado</div>';
		}else{
			$options_cart.='<div class="tluisboxunlipubl">Sin publicar</div>';
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
		$options_cart.='<a href="'.$base_x.'carta/editar_item/'.$prod->ukr.'/'.$mps->ukr.'"><div class="boxoptionslistitems">Editar publicacion</div></a>';
		$options_cart.='<div class="boxoptionslistitems option_carta_functions" data="'.$mps->id.'" data-modal-trigger="option_carta_'.$mps->id.'">Eliminar</div>';
		$options_cart.='<div class="modal" data-modal-name="option_carta_'.$mps->id.'" data-modal-dismiss>';
		$options_cart.='<div class="modal__dialog">';
		$options_cart.='<header class="modal__header">';
		$options_cart.='<h3 class="modal__title">Eliminar</h3>';
		$options_cart.='<i class="modal__close" data-modal-dismiss>X</i>';
		$options_cart.='</header>';
		$options_cart.='<div class="modal__content">';
		$options_cart.='<div class="case_delete_view">';
		$options_cart.='<span class="option_delete_views option_confirm confirm_delete_opcion_item_carta" data="'.$mps->id.'" data-x="'.$prod->id.'">Eliminar</span>';
		$options_cart.='<span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
		$options_cart.='</div>';
	}

	echo json_encode(array('type' => 1, 'mensaje' => $opcion_p->nombre, 'url' => $uks, 'nombre' => $nombres, 'url' => $urls, 'cart_view_one' => $opcion_p->id, 'cantidad' => $countbo, 'items_option' => $options_cart, 'url_items' => $uks));
}