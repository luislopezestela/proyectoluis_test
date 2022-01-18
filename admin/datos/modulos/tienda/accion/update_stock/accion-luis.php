<?php
$producto = DatosAdmin::porID_producto($_POST['prodc']);
$dat= new DatosAdmin();
$dat->id_sucursal=$_POST["sucursal"];
$dat->proveedor=$_POST["proveedor"];
$dat->documento=$_POST["documento"];
$dat->num_documento=$_POST["num_documento"];
$dat->barcode=$_POST["barcode"];
$dat->fecha=date('Y-m-d H:i:s');




if($producto->tipo==4){
	$dat->cpu=$_POST["cpu"];
	$dat->cpu_speed=$_POST["cpu_speed"];
	$dat->id_producto=$_POST["prodc"];
	$dat->id_usuario=$_SESSION["admin_id"];
	if($_POST["sucursal"]==""){
		$estado=false;
		$mensaje="Selecciona el sucursal";
	}elseif($_POST["proveedor"]==""){
		$estado=false;
		$mensaje="Selecciona el proveedor";
	}elseif($_POST["documento"]==""){
		$estado=false;
		$mensaje="Selecciona el documento";
	}elseif($_POST["num_documento"]==""){
		$estado=false;
		$mensaje="Escribe el numero del documento";
	}elseif($_POST["barcode"]==""){
		$estado=false;
		$mensaje="Escribe el numero de serie";
	}else{
		$estado=true;
		$mensaje="Stock actualizado";
		$dat->actualizar_stock_items_procesador();
	}

}else{
	$dat->id_producto=$_POST["prodc"];
	$dat->id_usuario=$_SESSION["admin_id"];
	if($_POST["sucursal"]==""){
		$estado=false;
		$mensaje="Selecciona el sucursal";
	}elseif($_POST["proveedor"]==""){
		$estado=false;
		$mensaje="Selecciona el proveedor";
	}elseif($_POST["documento"]==""){
		$estado=false;
		$mensaje="Selecciona el documento";
	}elseif($_POST["num_documento"]==""){
		$estado=false;
		$mensaje="Escribe el numero del documento";
	}elseif($_POST["barcode"]==""){
		$estado=false;
		$mensaje="Escribe el numero de serie";
	}else{
		$estado=true;
		$mensaje="Stock actualizado";
		$dat->actualizar_stock_items_all();
	}
}
$stcok_item=DatosAdmin::cantidad_stock_de_producto($_POST["prodc"],$_SESSION["admin_id"])->c;
echo json_encode(array('estado' => $estado, 'mensaje' => $mensaje,'stock' => $stcok_item));

