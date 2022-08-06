<?php


if($_POST['nombre']==""){
    echo json_encode(array('type' => "error","messaje"=>"Ingresa el nombre de la direccion", 'item_new_address' => false,'error' => "nombre"));
}elseif($_POST['adrress']==""){
    echo json_encode(array('type' => "error","messaje"=>"Ingresa la direccion", 'item_new_address' => false,'error' => "address"));
}elseif($_POST['surg']==""){
    echo json_encode(array('type' => "error","messaje"=>"Ingresa una sugerencia", 'item_new_address' => false,'error' => "surgs"));
}else{
    $base_a = Luis::basepage("base_page");
    $user = new DatosAdmin();
    $user->id_persona = $_SESSION['usuarioid'];
    $user->nombre = htmlentities($_POST['nombre']);
    $user->direccion = htmlentities($_POST['adrress']);
    $user->sugerencia = htmlentities($_POST['surg']);
    $u = $user->add_address_delivery_cliente();
    ///direcciones in
    $address='<div class="conten_address_timelines contentboxitemslist_client_viewers'.$u[1].'">';
    $address.='<div class="class_op_address_list_order_direcc_logo">';
    $address.='<div class="marcador_mapa"></div>';
    $address.='</div>';
    $address.='<div class="detaillsboxlists">';
    $address.='<span class="tluisboxunli data_selc_us_name'.$u[1].'">'.html_entity_decode($user->nombre).'</span>';
    $address.='<span class="tluisboxunliprice data_selc_us_address'.$u[1].'">'.html_entity_decode($user->direccion).'</span>';
    $address.='<div class="tluisboxunlipubl data_selc_us_surg'.$u[1].'">'.html_entity_decode($user->sugerencia).'</div>';
    $address.='</div>';
                ///* opciones de list
    $address.='<div class="opcionesblocklist opcionesblocklist1000boxlist">';
    $address.='<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">';
    $address.='<span class="opcionesblocklistoption opcionesblocklistoption100">';
    $address.='<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>';
    $address.='</span>';
    $address.='</a>';
                ///
    $address.='<div class="boxoptionslistlines">';
    $address.='<div class="makposdind"></div>';
    $address.='<div class="boxoptionslistitems data_address_update" data-config="'.$u[1].'">Editar</div>';
    $address.='<div class="boxoptionslistitems data_address_delete" data-config="'.$u[1].'">Eliminar</div>';
    $address.='</div>';
                ///
    $address.='</div>';
                ///** fin de opciones list
    $address.='</div>';
                ///** fin de direcciones in


    echo json_encode(array('type' => "exito","messaje"=>"GUARDADO", 'item_new_address' => $address));
}
?>
