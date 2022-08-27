<?php
$basepagina = Luis::basepage("base_page");
$total=0;
$controlcarts=false;
$totalpricelist=false;
$cantidad_de_items=0;
if(isset($_SESSION["carrito"])==0){
	unset($_SESSION["carrito"]);
	
}else{
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
				if(isset($cantidadtotalcarrito[0][$tps->id])){
					$id_data=$cantidadtotalcarrito[0][$tps->id];
					$opt_data_details = DatosAdmin::view_iten_in_pages_por_id($id_data);
					if($opt_data_details->precio==1){
						$open_producto = DatosAdmin::porID_producto($opt_data_details->item_k);
						$volrtotal_precios+=$open_producto->precio_final;
					}else{
						$volrtotal_precios+=0;
					}
				}else{

				}
				
			}
		}
		$precio_nuevo_suma=$ptwo->precio_final+$volrtotal_precios;
		$cantidad_de_items += $cantidadtotalcarrito["q"];
		$total += $cantidadtotalcarrito["q"]*$precio_nuevo_suma;
	}

	if($cantidad_de_items==0){
		$controlcarts=true;
		$datacontrol="<h2 class=\"titulo2carrito\">".str_replace("_"," ",Luis::lang("carrito_sin_productos"))."</h2>";
		$datacontrol.="<hr>";
		$datacontrol.="<h3 class=\"subtitulocarrito\">".str_replace("_"," ",Luis::lang("encuentra_productos_a_los_mejores_precios")).".</h3>";
		$datacontrol.="<div class=\"butt_luis_one\">";
		$datacontrol.="<a class=\"botoniniciacompra menupagecurrent\" aria-label=\"inicio\" role=\"link\" href=\"".$basepagina."\"><span>".str_replace("_"," ",Luis::lang("inicio"))."</span></a>";
		$datacontrol.="</div>";
	}else{
		$controlcarts=false;
		$datacontrol=false;
	}
	$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
	if($moneda_principal){
		$moneda_por_id_a=$moneda_principal->simbolo;
	}else{
		$moneda_por_id_a=false; 
	}
	$totalpricelist=$moneda_por_id_a.". <span>".number_format($total,2,".",",")."</span>";
	echo json_encode(array('estado' => "exito", 'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist,'controlsup' => $datacontrol,'cantidad' => $cantidad_de_items));
}else{
	echo json_encode(array('estado' => "error",'cantidad' => 0,'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist));
}