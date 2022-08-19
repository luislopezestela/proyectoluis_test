<?php
$control_options=false;
$modificado_option_type=false;
$volrtotal_precios=0;
$cnt_items_type=0;
//unset($_SESSION['option_select_this_item'.$_POST['typs']]);
//$_SESSION['option_select_this_item'.$_POST['typs']]=$_POST['opt_ops'];
//$item = DatosAdmin::view_iten_in_pages_por_id($_POST['opt_ops']);
$current_type_item=DatosAdmin::ver_opciones_type_por_id($_POST['typs']);
$current_item=DatosAdmin::ver_item_por_su_id($current_type_item->id_items);

if(isset($_SESSION["options_items"])){
	if(count($_SESSION["options_items"])>0){
		$control_options=false;
	}else{
		$control_options=true;
	}
}else{
	$control_options=true;
}


if(isset($_SESSION["options_items"])){
	foreach($_SESSION["options_items"] as $op){
		if($op["id_option_type_item"]==$_POST['typs']){
			$modificado_option_type=true;
		}
	}
}


if(!$modificado_option_type){
	if(!isset($_SESSION['options_items'])){
		$_SESSION['options_items']=array(array('id_option_type_item'=>$_POST['typs'],'id_option_deta'=>$_POST['opt_ops']));
	}else{
		$options_data_list=$_SESSION['options_items'];
		$optionstype_data=array();
		$optionstype_data_two=array('id_option_type_item'=>$_POST['typs'],'id_option_deta'=>$_POST['opt_ops']);
		if(!in_array($optionstype_data_two, $options_data_list)){
			array_push($options_data_list, $optionstype_data_two);
		}
		$_SESSION['options_items']=$options_data_list;
	}

	foreach($_SESSION['options_items'] as $total_price) {
		$optiondetaill=DatosAdmin::view_iten_in_pages_por_id($total_price['id_option_deta']);
		if($optiondetaill->precio==1){
			$open_producto = DatosAdmin::porID_producto($optiondetaill->item_k);
			$volrtotal_precios+=$open_producto->precio_final;
		}else{
			$volrtotal_precios+=0;
		}
	}
	$precio_nuevo_suma=$current_item->precio_final+$volrtotal_precios;
	echo $precio_nuevo_suma;
}else{
	$options_datas=$_SESSION['options_items'];
	$_SESSION['options_items']==array();
	foreach($options_datas as $od){
		if($od['id_option_type_item']==$_POST['typs']){
			$aplication_data = $od['id_option_deta']=$_POST['opt_ops'];
		}
		$_SESSION["options_items"][$cnt_items_type]=$od;
		$cnt_items_type++;
	}

	foreach($_SESSION['options_items'] as $total_price) {
		$optiondetaill=DatosAdmin::view_iten_in_pages_por_id($total_price['id_option_deta']);
		if($optiondetaill->precio==1){
			$open_producto = DatosAdmin::porID_producto($optiondetaill->item_k);
			$volrtotal_precios+=$open_producto->precio_final;
		}else{
			$volrtotal_precios+=0;
		}
	}

	$precio_nuevo_suma=$current_item->precio_final+$volrtotal_precios;
	echo $precio_nuevo_suma;



}

?>