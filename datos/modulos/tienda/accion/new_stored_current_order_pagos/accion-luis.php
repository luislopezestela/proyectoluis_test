<?php

if($_POST['data_p']==""){
	echo json_encode(array('tipe'=>"0",'messaje'=>"Selecciona el metodo de pago."));
}else{
	if(isset($_SESSION['usuarioid'])){
		$el_cliente=$_SESSION['usuarioid'];
		$verificar_venta=DatosAdmin::view_order_realtime_in_page($el_cliente);
		$c = new DatosAdmin();
		$c->id = $verificar_venta->id;
		$c->metodo_pago=$_POST['data_p'];
		$c->actualizar_el_metodo_de_pago_page();
	}
	echo json_encode(array('tipe'=>"1",'messaje'=>""));
}
