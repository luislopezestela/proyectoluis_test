<?php
$base=Luis::basepage("base_page");
$image=DatosImagenes::porId_items_list_view($_POST["current_item"]);
if($image!=null){

	$prev=DatosImagenes::image_prev($_POST["current_item"],$image->id_item);

	if($prev){
		$images=$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$prev->id_item."/thumb/".$prev->imagen;
		$images_bac="datos/modulos/".Luis::temass()."/source/imagenes/items/".$prev->id_item."/thumb/".$prev->imagen;
		list($red,$green,$blue)=Luis::promedioColorImagen($images_bac);
		$colorback="background-color:rgba(".$red.",".$green.",".$blue.",0.8)";
		echo json_encode(array('type' => "1", 'img' => $images, 'cur' => $prev->id, 'cols' => $colorback));
	}else{
		$next=DatosImagenes::image_next($_POST["current_item"],$image->id_item);
		$images=$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$next->id_item."/thumb/".$next->imagen;
		$images_bac="datos/modulos/".Luis::temass()."/source/imagenes/items/".$next->id_item."/thumb/".$next->imagen;
		list($red,$green,$blue)=Luis::promedioColorImagen($images_bac);
		$colorback="background-color:rgba(".$red.",".$green.",".$blue.",0.8)";
		echo json_encode(array('type' => "1", 'img' => $images, 'cur' => $next->id, 'cols' => $colorback));
	}
}else{
	echo json_encode(array('type' => "0", 'img' => ""));
}