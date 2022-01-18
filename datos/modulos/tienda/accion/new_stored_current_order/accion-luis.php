<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$cant_ventas=DatosAdmin::ventas_registrados_all();
if($cant_ventas >0){
	$cantidad_total_ventas=DatosAdmin::TotaldeVentas()->c;
	$numeroventa="N00".$cantidad_total_ventas+1;
}else{
	$numeroventa="N001";
}
$visualizar_documento = DatosAdmin::view_documents_por_defecto();
if(isset($_SESSION['usuarioid'])){
	$el_cliente=$_SESSION['usuarioid'];
	$c = new DatosAdmin();
	$c->id = $el_cliente;
	$c->sucursal_compra = $_POST['data_p'];
	$c->guardar_sucursal_de_compra();
	$c->numero_venta=$numeroventa;
	$c->barcode=$codigos.$numeroventa;
	$c->entregar=0;
	$c->documento=$visualizar_documento->id;
	$verificar_venta=DatosAdmin::ventas_registrados_verificar($el_cliente);
	if($verificar_venta){
		//
	}else{
		$c->nueva_venta_web();
	}
	
}
