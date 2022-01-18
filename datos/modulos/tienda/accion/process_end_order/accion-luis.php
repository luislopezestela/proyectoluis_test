<?php


if(isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>0){
	$usuario = $_SESSION['usuarioid'];
	$cliente = DatosPagina::persona($usuario);
	$venta = DatosAdmin::view_order_realtime_in_page($usuario);
	$v = new DatosAdmin();
	$v->id = $venta->id;
	$v->estado_de_venta = 5;
	$v->fecha = date ('Y-m-d H:i:s');
	$v->finalizar_la_venta_web();
	////
	

	foreach($_SESSION["carrito"] as $c){
		$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
		$codigos = "";
		for($i=0;$i<12;$i++){
		    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
		}
		$producto=DatosAdmin::porID_producto($c["id_producto"]);
		$typs_it=DatosAdmin::ver_opciones_type($producto->id);
		$v->id_venta = $venta->id;
		$v->id_item = $producto->id;
		$v->codigo = $venta->id.$producto->id.$codigos;
		$v->cantidad = $c["q"];
		$v->agregar_los_detalles_del_item_producto();

		foreach (range(0, $v->cantidad - 1) as $i) {
			$v->agregar_stock_en_la_venta_para_identificar_producto();
		}

		if(count($typs_it)>0){
			foreach($typs_it as $tps){
				$id_data=$c[0][$tps->id];
				$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
				$v->id_opcion_sub = $opt_data_details->id;
				$v->agregar_los_detalles_del_item_producto_sub();
			}
			
		}


			
	}

	echo json_encode(array('estado' => "exito", 'mensaje' => "Orden agregado con exito."));
	unset($_SESSION['carrito']);
	unset($_SESSION['options_items']);
	unset($_SESSION['carrito_detalles_data']);
	unset($_SESSION['car_stepp']);
}else{
	echo json_encode(array('estado' => "error", 'mensaje' => "No tienes Productos agregados en el carrito."));
}


