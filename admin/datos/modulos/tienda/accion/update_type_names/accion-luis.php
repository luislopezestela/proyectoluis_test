<?php
if($_POST["dat_name"]) {
	$data = new DatosAdmin();
	$data->id = $_POST["dat"];
	$data->nombre = $_POST["dat_name"];
	$data->update_options_type();
}else{
	echo "No puedes guardar un campo vacio.";
}
?>