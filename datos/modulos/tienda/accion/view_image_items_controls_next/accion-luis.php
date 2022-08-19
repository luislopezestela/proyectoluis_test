<?php
if(isset($_POST["current_item"])){
	$base=Luis::basepage("base_page");
	$image=DatosImagenes::porId_items_list_view($_POST["current_item"]);
	if($image!=null){
		$next=DatosImagenes::image_next($_POST["current_item"],$image->id_item);
		if($next){  
			$images_bac="datos/modulos/".Luis::temass()."/source/imagenes/items/".$next->id_item."/thumb/".$next->imagen;
			if(is_file($images_bac)){
				$images="datos/modulos/".Luis::temass()."/source/imagenes/items/".$next->id_item."/thumb/".$next->imagen;
			}else{
				$images="admin/datos/imagenes/icons/no_image.png";
			}
			list($red,$green,$blue)=Luis::promedioColorImagen($images);
			$colorback="background-color:rgba(".$red.",".$green.",".$blue.",0.8)";
			echo json_encode(array('type' => "1", 'img' => $base.$images, 'cur' => $next->id, 'cols' => $colorback));
		}else{
			$prev=DatosImagenes::image_prev($_POST["current_item"],$image->id_item);
			$images_bac="datos/modulos/".Luis::temass()."/source/imagenes/items/".$prev->id_item."/thumb/".$prev->imagen;
			if(is_file($images_bac)){
				$images="datos/modulos/".Luis::temass()."/source/imagenes/items/".$prev->id_item."/thumb/".$prev->imagen;
			}else{
				$images="admin/datos/imagenes/icons/no_image.png";
			}
			list($red,$green,$blue)=Luis::promedioColorImagen($images);
			$colorback="background-color:rgba(".$red.",".$green.",".$blue.",0.8)";
			echo json_encode(array('type' => "1", 'img' => $base.$images, 'cur' => $prev->id, 'cols' => $colorback));
		}
	}else{
		echo json_encode(array('type' => "0", 'img' => ""));
	}
}