<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$cant_ventas=DatosAdmin::ventas_registrados_all();
if($cant_ventas >0){
	$cantidad_total_ventas=DatosAdmin::TotaldeVentas()->c+1;
	$numerickl = str_pad($cantidad_total_ventas,7,'0',STR_PAD_LEFT);
	$numeroventa="N".$numerickl;
}else{
	$numerickl = str_pad(1,7,'0',STR_PAD_LEFT);
	$numeroventa="N".$numerickl;
}
$visualizar_documento = DatosAdmin::view_documents_por_defecto();
if(isset($_SESSION['usuarioid'])){
	$el_cliente=$_SESSION['usuarioid'];
	$c = new DatosAdmin();
	$c->id = $el_cliente;
	$c->tipo_venta = $_POST['data_p'];
	$c->numero_venta=$numeroventa;
	$c->barcode=$codigos.$numeroventa;
	$c->entregar=0;
	$c->documento=$visualizar_documento->id;
	$verificar_venta=DatosAdmin::ventas_registrados_verificar($el_cliente);
	if(count($verificar_venta)>0){
		$visualizar_venta_current_o = DatosAdmin::view_order_realtime_in_page($_SESSION['usuarioid']);
		$active_order_current=$visualizar_venta_current_o->id;
		$c->update_venta_web_tipo_venta($active_order_current);
	}else{
		$c->nueva_venta_web_tipo_venta();
	}
	
}
