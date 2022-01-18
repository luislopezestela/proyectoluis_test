<?php
$basepagina = Luis::basepage("base_page");
$total=0;
$controlcarts=false;
$totalpricelist=false;
$datacontrol=false;
$cantidad_de_items=0;
if(count($_SESSION["carrito"])<1){
	unset($_SESSION["carrito"]);
	$controlcarts=true;
	$datacontrol='<br><p class="txtcarritovacio">No tienes productos en tu carrito</p><a href="'.$basepagina.'productos" class="button_list_order">Ir a comprar ahora</a><br>';
}else{
	$controlcarts=false;
	$products = $_SESSION["carrito"];
	$news = array();
	foreach ($products as $product) {
		if($product["ident_item"]!=$_POST["indexposition"]){
			array_push($news, $product);
		}
	}
	$_SESSION["carrito"]=$news;
}

if(isset($_SESSION['carrito'])){
	foreach($_SESSION['carrito'] as $cantidadtotalcarrito){
		$ptwo =  DatosAdmin::porID_producto($cantidadtotalcarrito["id_producto"]);
		$typs_it = DatosAdmin::ver_opciones_type($ptwo->id);
		$volrtotal_precios=0;
		if(count($typs_it)>0){
			foreach($typs_it as $tps){
				$id_data=$cantidadtotalcarrito[0][$tps->id];
				$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
				$volrtotal_precios+=$opt_data_details->precio;
			}
		}
		$precio_nuevo_suma=$ptwo->precio_final+$volrtotal_precios;
		$cantidad_de_items += $cantidadtotalcarrito["q"];
		$total += $cantidadtotalcarrito["q"]*$precio_nuevo_suma;
	}
	$totalpricelist="Total: S/. <span>".number_format($total,2,".",",")."</span>";
	echo json_encode(array('estado' => "exito", 'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist,'controlsup' => $datacontrol,'cantidad' => $cantidad_de_items));
}else{
	echo json_encode(array('estado' => "error",'cantidad' => 0,'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist));
}