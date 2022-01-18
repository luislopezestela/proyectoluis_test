<?php
if($_POST){
	$addres = new DatosAdmin();
	$addres->id = $_POST['data_dd'];
	$addres->delete_address_delivery_persona();
}