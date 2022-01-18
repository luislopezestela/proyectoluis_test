<?php
$basepagina=Luis::basepage("base_page");
$cnt=0;
$total = 0;
$valortotaldecompra = 0;
$cantidad_item_total=0;
$cantidad_item_total_2=0;
$cantidad_item_total_3=0;
$cantidad_item_total_4=0;
//
$data_cantidad=0;
$data_cantidad_2=0;
$data_cantidad_3=0;
$data_cantidad_4=0;
$p =  DatosAdmin::porID_producto($_POST['id']);
$stcok_item_ot=DatosAdmin::cantidad_stock_de_producto_admin($p->id)->c;
$item_pendientes_venta=DatosAdmin::item_pndiente_en_ventas_por_item($p->id)->c;

$stcok_item=$stcok_item_ot-$item_pendientes_venta;



$imagenes=DatosImagenes::mostrar_imagen_items_carta($p->id);
$controlcarts=false;
$id = $p->id;
$in_cart=false;
$count_items_car=1;
$agotar=0;
if(isset($_SESSION["carrito"])){
	if(count($_SESSION["carrito"])>0){
		$controlcarts=false;
	}else{
		$controlcarts=true;
	}
}else{
	$controlcarts=true;
}


if(isset($_SESSION["carrito"])){
	foreach ($_SESSION["carrito"] as $pc) {
		if($pc["id_producto"]==$p->id  && $pc[0]==$_POST){
			$in_cart=true;
		}
	}
}

if(isset($_SESSION["carrito"])){
	foreach ($_SESSION["carrito"] as $pc) {
		$ultimoitem_c=$pc["ident_item"];
	}
	$count_items_car=$ultimoitem_c+1;
}


if(isset($_SESSION['carrito'])){
	foreach($_SESSION["carrito"] as $ctp){
		if($ctp["id_producto"]==$p->id){
			$cantidad_item_total += $ctp["q"];
		}
	}
}

if($stcok_item==$cantidad_item_total){
	foreach($_SESSION['carrito'] as $cantidadtotalcarrito){
		$ptwo =  DatosAdmin::porID_producto($cantidadtotalcarrito["id_producto"]);
		$valortotaldecompra += $cantidadtotalcarrito["q"];
	}
	$data_cantidad=$stcok_item-$cantidad_item_total;
	echo json_encode(array('estado' => "error",'agotar'=>1,'cantidad_item'=> $data_cantidad,'cantidad' => $valortotaldecompra,'nullcarts' => $controlcarts,"messaje"=>"Agotado"));
}elseif($stcok_item>0){
	if(!$in_cart){
		if(!isset($_SESSION["carrito"])){
			$_SESSION["carrito"] = array( array("ident_item"=>$count_items_car,"id_producto"=>$id,"q"=>1,$_POST));
		}else{
			$products = $_SESSION["carrito"];
			$news = array();
			$newp = array("ident_item"=>$count_items_car,"id_producto"=>$id,"q"=>1,$_POST);
			if(!in_array($newp, $products)){
				array_push($products, $newp);
			}
			$_SESSION["carrito"]=$products;
		}


		foreach($_SESSION['carrito'] as $cantidadtotalcarrito){
			$ptwo =  DatosAdmin::porID_producto($cantidadtotalcarrito["id_producto"]);
			$valortotaldecompra += $cantidadtotalcarrito["q"];
		}

		if(isset($_SESSION['carrito'])){
			foreach($_SESSION["carrito"] as $ctp){
				if($ctp["id_producto"]==$p->id){
					$cantidad_item_total_2 += $ctp["q"];
				}
			}
		}
		$data_cantidad_2=$stcok_item-$cantidad_item_total_2;
		if($data_cantidad_2==0){
			$seagotael_item_prod=1;
			$messaje="Producto agotado";
		}else{
			$seagotael_item_prod=false;
			$messaje="Agregado";
		}
		echo json_encode(array('estado' => "exito",'agotar'=>$seagotael_item_prod,'cantidad_item'=> $data_cantidad_2,'cantidad' => $valortotaldecompra, 'nullcarts' => $controlcarts,"messaje"=>$messaje));

	}else{
			$cart = $_SESSION["carrito"];
			$_SESSION["carrito"]==array();
			foreach ($cart as $c) {
				if($c[0]==$_POST && $c["id_producto"]==$_POST["id"]){
					$carrito_count_item = $c["q"] = $c['q']+1;
				}
				$_SESSION["carrito"][$cnt]=$c;
				$cnt++;
			}
		
		

		foreach($_SESSION['carrito'] as $cantidadtotalcarrito){
			$ptwo =  DatosAdmin::porID_producto($cantidadtotalcarrito["id_producto"]);
			$valortotaldecompra += $cantidadtotalcarrito["q"];
		}

		if(isset($_SESSION['carrito'])){
			foreach($_SESSION["carrito"] as $ctp){
				if($ctp["id_producto"]==$p->id){
					$cantidad_item_total_3 += $ctp["q"];
				}
			}
		}
		$data_cantidad_3=$stcok_item-$cantidad_item_total_3;
		if($data_cantidad_3==0){
			$seagotael_item_prod=1;
			$messaje="Producto agotado";
		}else{
			$seagotael_item_prod=false;
			$messaje="Agregado";
		}
		echo json_encode(array('estado' => "exito",'agotar'=>$seagotael_item_prod,'cantidad_item'=> $data_cantidad_3,'cantidad' => $valortotaldecompra,'nullcarts' => $controlcarts,"messaje"=>$messaje));
	}
}else{
	if(isset($_SESSION['carrito'])){
		foreach($_SESSION["carrito"] as $ctp){
			if($ctp["id_producto"]==$p->id){
				$cantidad_item_total_4 += $ctp["q"];
			}
		}
	}
	$data_cantidad_4=$stcok_item-$cantidad_item_total_4;
	echo json_encode(array('estado' => "error",'agotar'=>1,'cantidad_item'=> $data_cantidad_4,'cantidad' => $valortotaldecompra,'nullcarts' => $controlcarts,"messaje"=>"Producto agotado"));
}
