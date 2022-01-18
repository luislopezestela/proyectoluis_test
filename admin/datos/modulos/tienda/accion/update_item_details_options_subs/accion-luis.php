<?php
$data = new DatosAdmin();
$data->id = $_POST['item_updat'];
$data->nombre = $_POST['three'];
$data->ukr = DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["three"])));
$data->precio = $_POST['four'];
$data->update_data_opciones_detalles();