<?php
$us = DatosPagina::persona($_SESSION['usuarioid']);
$u = new DatosAdmin();
$u->id = $us->id;
$u->dni = $_POST['data_dd'];
$u->nombre = htmlentities($_POST['data_nn']);
$u->apellido_paterno=$_POST['data_pp'];
$u->apellido_materno=$_POST['data_mm'];
$u->ukr=DatosAdmin::poner_guion(strip_tags($_POST["data_nn"]."-".$_POST['data_pp']."-".$_POST['data_mm']));
$u->update_client_in_pages_data_personal();