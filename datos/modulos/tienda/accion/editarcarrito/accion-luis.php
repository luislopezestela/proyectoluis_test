<?php
$cart = $_SESSION["carrito"];
$cnt=0;
$total = 0;
$valortotaldecompra = 0;
$controlcarts=false;
$totalpricelist=false;
$cantidad_de_items=0;
$basepagina = Luis::basepage("base_page");

if(isset($_SESSION["carrito"])){
if(count($_SESSION["carrito"])>0){
	$controlcarts=false;
}else{
	$controlcarts=true;
}
}else{
	$controlcarts=true;
}

$_SESSION["carrito"]==array();
foreach ($cart as $c) {
	if($c["ident_item"]==$_POST["identbox"]){
		$carrito_count_item = $c["q"] = $_POST["btls"];
	}
	$_SESSION["carrito"][$cnt]=$c;
	$cnt++;
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
	echo json_encode(array('estado' => "exito",'cantidad' => $cantidad_de_items,'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist));
}else{
	echo json_encode(array('estado' => "error",'cantidad' => 0,'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist));
}