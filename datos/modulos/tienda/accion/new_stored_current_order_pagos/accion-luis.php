<?php

if(isset($_POST['data_p'])==""){
	echo json_encode(array('tipe'=>"0",'messaje'=>"Selecciona el metodo de pago."));
}else{
	if(isset($_SESSION['usuarioid'])){
		$el_cliente=$_SESSION['usuarioid'];
		$verificar_venta=DatosAdmin::view_order_realtime_in_page($el_cliente);
		$c = new DatosAdmin();
		$c->id = $verificar_venta->id;
		$c->metodo_pago=$_POST['data_p'];
		if($_POST['data_w']){
			$c->cliente_doc = $_POST['data_w'];
			$c->actualizar_el_metodo_de_pago_page();
			echo json_encode(array('tipe'=>"1",'messaje'=>""));
		}else{
			echo json_encode(array('tipe'=>"0",'messaje'=> str_replace("_", " ", Luis::lang("escribe_numero_de_documento")), "cla" => "number_doc_in_new_order_web_ac_lims"));
		}
		
	}
}
