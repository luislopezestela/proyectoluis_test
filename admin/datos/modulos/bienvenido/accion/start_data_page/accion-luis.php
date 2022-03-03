<?php
$tema = $_POST['tema'];

$n = new Luis();
foreach($_POST as $key => $value){
	$n->guardar_datos_pagina($key,$value);
}

$n->skin = $tema;
$n->guardar_tema_pagina();