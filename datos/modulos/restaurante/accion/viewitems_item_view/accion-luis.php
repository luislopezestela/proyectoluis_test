<?php
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

$items = DatosCarta::porUkr_items_page($unlineidexe);

if(isset($items)){
	$image_int=DatosImagenes::mostrar_imagen_items_carta($items->id);
	$images_list_view = DatosImagenes::Mostrarimageneditar_items($items->id);
	$imagepols="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$image_int->imagen;
	list($red,$green,$blue)=Luis::promedioColorImagen($imagepols);
	$idexhtmls="<div class=\"contenspage\">";
	$idexhtmls.="<div class=\"conten_items_view\">";
	$idexhtmls.="";
	$idexhtmls.="<div class=\"conten_image_item_view image_view_list\" style='background-color:rgba(".$red.",".$green.",".$blue.",0.8)'>";
	$idexhtmls.="<picture>";
	$idexhtmls.="<img id=\"img_item\" data_box=\"".$image_int->id."\" class=\"boxpictureliststimg_view\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$image_int->imagen."\">";
	$idexhtmls.="<span class=\"tum_page_image_items\">";
	if(count($images_list_view)>=2){
		foreach ($images_list_view as $kim){
			$imagepols_a="datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$kim->imagen;
			list($red_a,$green_a,$blue_a)=Luis::promedioColorImagen($imagepols_a);
			$idexhtmls.="<img style='background-color:rgba(".$red_a.",".$green_a.",".$blue_a.",0.8)' class=\"boxpictureliststimg_thum_ind\" data-mode=\"".$kim->id."\" src=\"".$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$items->id."/thumb/".$kim->imagen."\">";
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
	$idexhtmls.="<span class=\"price_list_item_curr\">S/.".$items->precio."</span>";
	$idexhtmls.="<hr>";
	$idexhtmls.="<ul>";
	$idexhtmls.="<span class=\"title_options_customs_order\">Porcion de pollo</span>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee150" type="radio" name="0" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee150">1/2 Pardos Brasa</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="</ul>";

	$idexhtmls.="<ul>";
	$idexhtmls.="<span class=\"title_options_customs_order\">Escoge tu guarnicion.</span>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee1501" type="radio" name="1" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee1501">Guarnicion Cocida</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee1502" type="radio" name="1" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee1502">Guarnicion Fresca</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee15023" type="radio" name="1" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee15023">Guarnicion Delicia</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="</ul>";

	$idexhtmls.="<ul>";
	$idexhtmls.="<span class=\"title_options_customs_order\">Complementos</span>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee150237" type="radio" name="4" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee150237">Papas Fritas</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="<li>";
	$idexhtmls.='<input id="6e4ee150235" type="radio" name="4" data-type="1" data-id="" value="" checked="">';
	$idexhtmls.='<label for="6e4ee150235">Papas Rústicas</label>';
	$idexhtmls.="</li>";
	$idexhtmls.="</ul>";
    $idexhtmls.="<hr>";
    $idexhtmls.="<div class=\"buutons_conten_page_view_items\">";
	$idexhtmls.='<button type="button" class="button_order_item_list_view">Agregar a mi orden <svg class="carrito_bt_item_page" viewBox="0 0 423.416 423.416">
	<path d="M420.688,145.096c-2.069-2.033-4.961-2.997-7.837-2.612H300.525V92.851c0-49.052-39.764-88.816-88.816-88.816s-88.816,39.764-88.816,88.816v49.633H10.565c-3.135,0-6.269,0-7.837,2.612c-2.106,2.024-3.083,4.954-2.612,7.837L39.3,367.137c5.474,29.881,31.275,51.746,61.649,52.245h221.518c30.461-0.749,56.208-22.787,61.649-52.767L423.3,152.933C423.771,150.05,422.794,147.12,420.688,145.096z M143.79,92.851c0-37.51,30.408-67.918,67.918-67.918c37.51,0,67.918,30.408,67.918,67.918v49.633H143.79V92.851z M363.218,364.002c-3.519,19.801-20.641,34.289-40.751,34.482H100.949c-20.11-0.193-37.232-14.68-40.751-34.482l-37.094-200.62h377.208L363.218,364.002z"/>
	<path d="M290.076,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449c-5.771,0-10.449,4.678-10.449,10.449v31.347C279.626,260.581,284.305,265.259,290.076,265.259z"/>
	<path d="M133.341,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449c-5.771,0-10.449,4.678-10.449,10.449v31.347C122.892,260.581,127.57,265.259,133.341,265.259z"/>
</svg></button>';
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
	$idexhtmls.="";
	$idexhtmls.="";
	$idexhtmls.="</div>";
	$idexhtmls.="</div>";
}else{
	$idexhtmls=false;
}
return $idexhtmls;
?>

