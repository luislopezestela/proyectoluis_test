<?php
if(isset($_SESSION['usuarioid'])){
	$el_cliente=$_SESSION['usuarioid'];
	$verificar_venta=DatosAdmin::view_order_realtime_in_page($el_cliente);
	$c = new DatosAdmin();
	$c->id = $verificar_venta->id;
	$c->documento=$_POST['data_p'];
	$c->actualizar_el_documento_page();

	$visualizar_venta_current = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
	$visualizar_documento = DatosAdmin::visualizar_documento_seleccionado_por_cliente($visualizar_venta_current->documento);
	$ver_usuario_en_venta = DatosAdmin::ver_el_cliente_data_requerido($visualizar_documento->campo_requerido,$_SESSION['usuarioid']);
	
	$c->num_doc=$ver_usuario_en_venta->c;
	$c->actualizar_el_numero_de_documento_page();
	
}