<?php
if(isset($_SESSION['usuarioid'])){
	$el_cliente=$_SESSION['usuarioid'];
	$verificar_venta=DatosAdmin::view_order_realtime_in_page($el_cliente);
	$c = new DatosAdmin();
	$c->id = $verificar_venta->id;
	$c->num_doc=$_POST['data_p'];
	$c->actualizar_el_numero_de_documento_page();
	
}