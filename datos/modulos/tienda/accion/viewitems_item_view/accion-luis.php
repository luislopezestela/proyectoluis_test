<?php
$es_seleccionado_nuevo_precio=false;
$cantidad_item_total=0;
$base=Luis::basepage("base_page");
if (isset($_GET['viewind'])){
	$unlineidexe=$_GET['viewind'];
}else{
	if(isset($_GET["paginas"])){
		$urb=explode("/", $_GET["paginas"]);
		if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
		$unlineidexe=$urb1;
	}else{
		$unlineidexe=false;
	}
	
}

$items = DatosAdmin::porUkr_items_page($unlineidexe);

if(isset($items)){
	$image_int=DatosImagenes::mostrar_imagen_items_carta($items->id);
	$images_list_view = DatosImagenes::Mostrarimageneditar_items($items->id);
	$imagepolspl="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$image_int->imagen;
	if(is_file($imagepolspl)){
		$imagepols="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$image_int->imagen;
	}else{
		$imagepols="admin/datos/imagenes/icons/no_image.png";
	}
	list($red,$green,$blue)=Luis::promedioColorImagen($imagepols);
	$idexhtmls="<div class=\"contenspage\">";
	$idexhtmls.="<div class=\"conten_items_view\">";
	$idexhtmls.="";
	$idexhtmls.="<div class=\"conten_image_item_view image_view_list\" style='background-color:rgba(".$red.",".$green.",".$blue.",0.8)'>";
	$idexhtmls.="<picture>";
	$idexhtmls.="<img id=\"img_item\" data_box=\"".$image_int->id."\" class=\"boxpictureliststimg_view\" src=\"".$base.$imagepols."\">";
	$idexhtmls.="<span class=\"tum_page_image_items\">";
	if(count($images_list_view)>=2){
		foreach ($images_list_view as $kim){
			$imagepols_a_pls="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$kim->imagen;
			if(is_file($imagepols_a_pls)){
				$imagepols_a="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$kim->imagen;
			}else{
				$imagepols_a="admin/datos/imagenes/icons/no_image.png";
			}
			list($red_a,$green_a,$blue_a)=Luis::promedioColorImagen($imagepols_a);
			$idexhtmls.="<img style='background-color:rgba(".$red_a.",".$green_a.",".$blue_a.",0.8)' class=\"boxpictureliststimg_thum_ind\" data-mode=\"".$kim->id."\" src=\"".$base.$imagepols_a."\">";
		}
	}
	$idexhtmls.="</span>";
	$idexhtmls.="</picture>";
	if(count($images_list_view)>=2){
		$idexhtmls.="<div class=\"buttons_controls_images\">";
		$idexhtmls.="<span class=\"control_img_iten cont_pag_l\"><span><span class=\"prev_image_view_item\"><svg viewBox=\"0 0 55.753 55.753\"><path d=\"M12.745,23.915c0.283-0.282,0.59-0.52,0.913-0.727L35.266,1.581c2.108-2.107,5.528-2.108,7.637,0.001
		c2.109,2.108,2.109,5.527,0,7.637L24.294,27.828l18.705,18.706c2.109,2.108,2.109,5.526,0,7.637
		c-1.055,1.056-2.438,1.582-3.818,1.582s-2.764-0.526-3.818-1.582L13.658,32.464c-0.323-0.207-0.632-0.445-0.913-0.727
		c-1.078-1.078-1.598-2.498-1.572-3.911C11.147,26.413,11.667,24.994,12.745,23.915z\"/>
		</svg></span></span></span>";
		$idexhtmls.="<span class=\"control_img_iten cont_pag_r\"><span><span class=\"next_image_view_item\" data_a=\"".$image_int->id."\"><svg viewBox=\"0 0 55.752 55.752\"><path d=\"M43.006,23.916c-0.28-0.282-0.59-0.52-0.912-0.727L20.485,1.581c-2.109-2.107-5.527-2.108-7.637,0.001
		c-2.109,2.108-2.109,5.527,0,7.637l18.611,18.609L12.754,46.535c-2.11,2.107-2.11,5.527,0,7.637c1.055,1.053,2.436,1.58,3.817,1.58
		s2.765-0.527,3.817-1.582l21.706-21.703c0.322-0.207,0.631-0.444,0.912-0.727c1.08-1.08,1.598-2.498,1.574-3.912
		C44.605,26.413,44.086,24.993,43.006,23.916z\"/>
		</svg></span></span></span>";
		$idexhtmls.="</div>";
	}
	
	$idexhtmls.="</div>";

	$idexhtmls.="";
	$idexhtmls.="<div class=\"description_list_item_current\">";
	$idexhtmls.="<h3 class=\"title_item_list_current\">".html_entity_decode($items->nombre)."</h3>";

	if($items->moneda_a){
		$moneda_por_id_a=DatosAdmin::Mostrar_las_monedas_por_id($items->moneda_a)->simbolo;
	}else{
		$moneda_por_id_a=false; 
	}
	
	if(isset($_SESSION['options_items'])){
		foreach($_SESSION["options_items"] as $op){
			$detalles_opciones = DatosAdmin::view_iten_in_pages_por_id($op['id_option_deta']);
			if($detalles_opciones->precio==1){
				$open_producto = DatosAdmin::porID_producto($detalles_opciones->item_k);
				$es_seleccionado_nuevo_precio+=$open_producto->precio_final;
			}else{
				$es_seleccionado_nuevo_precio+=0;
			}
			
		}
	}

	if($es_seleccionado_nuevo_precio){
		$precio_publico_modificado=$es_seleccionado_nuevo_precio+$items->precio_final;
		$idexhtmls.="<span class=\"price_list_item_curr\">".$moneda_por_id_a.". <span class=\"price_item_view_item_page\">".$precio_publico_modificado."</span></span>";
	}else{
		$idexhtmls.="<span class=\"price_list_item_curr\">".$moneda_por_id_a.". <span class=\"price_item_view_item_page\">".$items->precio_final."</span></span>";
	}
	
	$idexhtmls.="<hr>";


	$idexhtmls.="<form id='block_item_add_in_page'>";
	$idexhtmls.="<ul>";
	$tipo_de_opciones = DatosAdmin::ver_opciones_type($items->id);
	//unset($_SESSION['options_items']);
	//unset($_SESSION['carrito']);
	//unset($_SESSION['carrito_detalles_data']);
	foreach($tipo_de_opciones as $tp){
		
		$es_seleccionado=false;
		if(isset($_SESSION['options_items'])){
			foreach($_SESSION["options_items"] as $op){
				if($op["id_option_type_item"]==$tp->id){
					$es_seleccionado=true;
				}
			}
		}

		

		if(!$es_seleccionado){
			$detalles_opciones = DatosAdmin::ver_detalles_opciones($tp->id);
			if($tp->id_cat_sub_add){
				$cat_b = DatosAdmin::sub_categoria_getById($tp->id_cat_sub_add);
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($cat_b->nombre)."</span>";
			}elseif($tp->id_cat_add){
				$cat_a = DatosAdmin::getById_categoria($tp->id_cat_add);
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($cat_a->nombre)."</span>";
			}else{
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($tp->nombre)."</span>";
			}
			
			foreach($detalles_opciones as $do){
				if($do->principal==1){
					$activecheck_selct="checked";
				}else{
					$activecheck_selct=false;
				}
				$idexhtmls.="<li>";
				$idexhtmls.='<input id="detalle_opcion'.$do->id.'" class="select_options_in_items_page" type="radio" name="'.$tp->id.'" data-type="'.$tp->id.'" data-id="'.$do->id.'" value="'.$do->id.'"  '.$activecheck_selct.'>';
				$idexhtmls.='<label for="detalle_opcion'.$do->id.'">'.html_entity_decode($do->nombre).'</label>';
				$idexhtmls.="</li>";
			}
		}else{
			if($tp->id_cat_sub_add){
				$cat_b = DatosAdmin::sub_categoria_getById($tp->id_cat_sub_add);
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($cat_b->nombre)."</span>";
			}elseif($tp->id_cat_add){
				$cat_a = DatosAdmin::getById_categoria($tp->id_cat_add);
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($cat_a->nombre)."</span>";
			}else{
				$idexhtmls.="<span class=\"title_options_customs_order\">".html_entity_decode($tp->nombre)."</span>";
			}


			foreach ($_SESSION['options_items'] as $g){
				if($tp->id==$g['id_option_type_item']){
					$detalles_opciones = DatosAdmin::ver_detalles_opciones($g['id_option_type_item']);
					foreach($detalles_opciones as $do){
						if($do->id==$g['id_option_deta']){
							$activecheck_selct="checked";
						}else{
							$activecheck_selct=false;
						}
						$idexhtmls.="<li>";
						$idexhtmls.='<input id="detalle_opcion'.$do->id.'" class="select_options_in_items_page" type="radio" name="'.$tp->id.'" data-type="'.$tp->id.'" data-id="'.$do->id.'" value="'.$do->id.'" '.$activecheck_selct.'>';
						$idexhtmls.='<label for="detalle_opcion'.$do->id.'">'.html_entity_decode($do->nombre).'</label>';
						$idexhtmls.="</li>";
					}
				}
				
			}
		}
	}
	$idexhtmls.="</ul>";

    $idexhtmls.="<hr>";

    
	if(isset($_SESSION['carrito'])){
		foreach($_SESSION["carrito"] as $ctp){
			if($ctp["id_producto"]==$items->id){
				$cantidad_item_total += $ctp["q"];
			}
		}
	}
	$stcok_item_ot=DatosAdmin::cantidad_stock_de_producto_admin($items->id)->c;
	$item_pendientes_venta=DatosAdmin::item_pndiente_en_ventas_por_item($items->id)->c;

	$stcok_item=$stcok_item_ot-$item_pendientes_venta;

	if($stcok_item==$cantidad_item_total){
		$idexhtmls.="<div class=\"cantidad_stock_disponible_en_item_style\">";
		$idexhtmls.=Luis::lang("agotado");
		$idexhtmls.="</div>";
	}elseif($stcok_item>0){
		$idexhtmls.="<div class=\"cantidad_stock_disponible_en_item_style\">";
		$stokdelitem = $stcok_item-$cantidad_item_total;
		if($stokdelitem==1){
			$idexhtmls.=$stcok_item-$cantidad_item_total." ".Luis::lang("disponible");
		}else{
			$idexhtmls.=$stcok_item-$cantidad_item_total." ".Luis::lang("disponibles");
		}
		
		$idexhtmls.="</div>";
	}else{
		$idexhtmls.="<div class=\"cantidad_stock_disponible_en_item_style\">";
		$idexhtmls.=Luis::lang("agotado");
		$idexhtmls.="</div>";
	}
	$idexhtmls.="<div class=\"buutons_conten_page_view_items\">";
	$idexhtmls.='<button data_b="'.$stcok_item.'" id="'.$items->id.'" type="submit" class="button_order_item_list_view add_item_view_select">';
	$idexhtmls.='<p>'.str_replace("_"," ",Luis::lang("agregar")).'</p>';
	$idexhtmls.='<svg class="carrito_bt_item_page" viewBox="0 0 423.416 423.416">
	<path d="M420.688,145.096c-2.069-2.033-4.961-2.997-7.837-2.612H300.525V92.851c0-49.052-39.764-88.816-88.816-88.816s-88.816,39.764-88.816,88.816v49.633H10.565c-3.135,0-6.269,0-7.837,2.612c-2.106,2.024-3.083,4.954-2.612,7.837L39.3,367.137c5.474,29.881,31.275,51.746,61.649,52.245h221.518c30.461-0.749,56.208-22.787,61.649-52.767L423.3,152.933C423.771,150.05,422.794,147.12,420.688,145.096z M143.79,92.851c0-37.51,30.408-67.918,67.918-67.918c37.51,0,67.918,30.408,67.918,67.918v49.633H143.79V92.851z M363.218,364.002c-3.519,19.801-20.641,34.289-40.751,34.482H100.949c-20.11-0.193-37.232-14.68-40.751-34.482l-37.094-200.62h377.208L363.218,364.002z"/>
	<path d="M290.076,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449c-5.771,0-10.449,4.678-10.449,10.449v31.347C279.626,260.581,284.305,265.259,290.076,265.259z"/>
	<path d="M133.341,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449c-5.771,0-10.449,4.678-10.449,10.449v31.347C122.892,260.581,127.57,265.259,133.341,265.259z"/>
	</svg>';
	$idexhtmls.='</button>';
	$idexhtmls.="</div>";
	$idexhtmls.="";
	$idexhtmls.="</form>";
	$idexhtmls.="";
	$idexhtmls.="</div>";
	$idexhtmls.="";
	$idexhtmls.="<div class='item_description_data'>";
	$idexhtmls.=html_entity_decode($items->descripcion);
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
}else{
	$idexhtmls=false;
}
return $idexhtmls;
?>

