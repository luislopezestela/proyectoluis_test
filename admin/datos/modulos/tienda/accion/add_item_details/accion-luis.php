<?php

if($_POST['item']){
	$producto = DatosAdmin::urlpersona_off($_POST['item']);
	$item_view = DatosAdmin::porID_producto_detail($producto);
	if($item_view){
		$type_detail = DatosAdmin::ver_opciones_type_one_name_view($item_view->id,$_POST['dat']);
		if($_POST['sub'] && $_POST['cat']){
			$det = new DatosAdmin();
			$det->nombre = htmlentities($_POST['dat']);
			$det->id_items = $item_view->id;
			$det->cat = $_POST['sub'];
			$s=$det->add_detalle_type_c();
			echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1]));
		}elseif($_POST['cat']){
			$det = new DatosAdmin();
			$det->nombre = htmlentities($_POST['dat']);
			$det->id_items = $item_view->id;
			$det->cat = $_POST['cat'];
			$s=$det->add_detalle_type_b();
			echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1]));
		}elseif($_POST['dat']){
			$det = new DatosAdmin();
			$det->nombre = htmlentities($_POST['dat']);
			$det->id_items = $item_view->id;
			$s=$det->add_detalle_type();
			echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1]));
		}else{
			echo json_encode(array('tipo' => 0, 'message' => Luis::lang("el_campo_esta_vacio")));
		}
	}else{
		echo json_encode(array('tipo' => 0, 'message' => Luis::lang("un_error_en_los_datos")));
	}
}else{
	echo json_encode(array('tipo' => 0, 'message' => Luis::lang("error_de_datos")));
	
}