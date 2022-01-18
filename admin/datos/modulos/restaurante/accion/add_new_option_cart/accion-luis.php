<?php
$base=Luis::basepage("base_page_admin");
$usuario=DatosUsuario::porId($_SESSION["admin_id"]);
$nombre=$_POST['nom'];
$id=$_POST['ind'];
$ukv=DatosAdmin::poner_guion(strip_tags($nombre));
$carta=DatosCarta::porId($id);
$carta_ukr=DatosCarta::porUkr_opcion($ukv);
$data = new DatosCarta();
if($nombre===""){
	echo json_encode(array('type' => 0, 'mensaje' => "Escribe nombre de la opcion."));
}elseif($carta===null) {
	echo json_encode(array('type' => 0, 'mensaje' => "La carta no existe."));
}elseif($carta_ukr===null){
	$data->id_carta = $id;
	$data->nombre = htmlspecialchars($nombre);
	$data->sucursal = $usuario->sucursal;
	$data->ukr = DatosAdmin::poner_guion(strip_tags($nombre));
	$p = $data->new_option_carta();
	$countbo=DatosCarta::Contar_opciones_carta($id)->c;
	$laop=DatosCarta::porId_opcion($p[1]);
	$contaritems=DatosCarta::Contar_items_opciones_carta($p[1])->c;
	$opcions='<div class="contentboxitemslist view_carta_option_'.$p[1].'">';
	$opcions.='<div class="detaillsboxlists">';
	$opcions.='<div class="tluisboxunli name_list_option'.$p[1].'">'.html_entity_decode($laop->nombre).'</div>';
	if($laop->estado){
		$opcions.='<div class="tluisboxunlipubl">Publicado</div>';
	}else{
		$opcions.='<div class="tluisboxunlipubl">Sin publicar</div>';
	}

	if($contaritems==null){
		$opcions.='<span class="tluisboxunlipubl cant_opions">0 Items</span>';
	}elseif($contaritems==1){
		$opcions.='<span class="tluisboxunlipubl cant_opions">Un Item</span>';
	}elseif($contaritems>=2){
		$opcions.='<span class="tluisboxunlipubl cant_opions">'.$contaritems.' Items</span>';
	}else{
		$opcions.='<span class="tluisboxunlipubl cant_opions">'.$contaritems.' Items</span>';
	}
	$opcions.='</div>';
	$opcions.='<div class="opcionesblocklist opcionesblocklist1000boxlist">';
	$opcions.='<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">';
	$opcions.='<span class="opcionesblocklistoption opcionesblocklistoption100">';
	$opcions.='<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>';
	$opcions.='</span>';
	$opcions.='</a>';
	$opcions.='<div class="boxoptionslistlines">';
	$opcions.='<div class="makposdind"></div>';
	$opcions.='<a href="'.$base.'carta/view/"><div class="boxoptionslistitems">Ver publicacion</div></a>';

	$opcions.='<div class="boxoptionslistitems option_carta_functions_update" data="'.$p[1].'">Editar publicacion</div>';

	$opcions.='<div class="modal closet_modal_listems" data="'.$p[1].'" data-modal-name="option_carta_update_'.$p[1].'" data-modal-dismiss closet_modal="'.$p[1].'">';
	$opcions.='<div class="modal__dialog">';
	$opcions.='<header class="modal__header">';
	$opcions.='<h3 class="modal__title">Editar opcion.</h3>';
	$opcions.='<i class="modal__close" data-modal-dismiss>X</i>';
	$opcions.='</header>';
	$opcions.='<div class="modal__content">';
	 $opcions.='<input class="input_update_modal name_option_carta_update_'.$p[1].'" type="text" placeholder="Nombre" value="'.html_entity_decode($laop->nombre).'">';
	 $opcions.='<span class="button_update_modal button_option_carta_list_update" data="'.$p[1].'" data-x="'.$id.'">Editar</span>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';

	$opcions.='<div class="boxoptionslistitems option_carta_functions" data="'.$p[1].'">Eliminar</div>';

	$opcions.='<div class="modal closet_modal_listems_up" data="'.$p[1].'" data-modal-name="option_carta_'.$p[1].'" data-modal-dismiss closet_modal_up="'.$p[1].'">';
	$opcions.='<div class="modal__dialog">';
	$opcions.='<header class="modal__header">';
	$opcions.='<h3 class="modal__title">Eliminar</h3>';
	$opcions.='<i class="modal__close" data-modal-dismiss>X</i>';
	$opcions.='</header>';
	$opcions.='<div class="modal__content">';
	$opcions.='<div class="case_delete_view">';
	$opcions.='<span class="option_delete_views option_confirm confirm_delete_opcion_carta" data="'.$p[1].'" data-x="'.$id.'">Eliminar</span>';
	$opcions.='<span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';
	$opcions.='</div>';
	echo json_encode(array('type' => 1, 'mensaje' => "Opcion creado con exito.", 'opcion' => $opcions, 'cantidad' => $countbo));
}else{
	echo json_encode(array('type' => 0, 'mensaje' => "La carta ya existe."));
}