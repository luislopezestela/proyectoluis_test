<?php
$base=Luis::basepage("base_page");
$image=DatosImagenes::porId_items_list_view($_POST["current_item"]);
if($image!=null){
	$images=$base."datos/modulos/".Luis::temass()."/source/imagenes/items/".$image->id_item."/thumb/".$image->imagen;
	$images_bac="datos/modulos/".Luis::temass()."/source/imagenes/items/".$image->id_item."/thumb/".$image->imagen;
	list($red,$green,$blue)=Luis::promedioColorImagen($images_bac);
	$colorback="background-color:rgba(".$red.",".$green.",".$blue.",0.8)";
	echo json_encode(array('type' => "1", 'img' => $images, 'cur' => $image->id_item, 'cols' => $colorback, 'item' => $image->id));
}else{
	echo json_encode(array('type' => "0", 'img' => ""));
}