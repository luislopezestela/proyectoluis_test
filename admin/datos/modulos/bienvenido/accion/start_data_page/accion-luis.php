<?php
$tema = $_POST['tema'];
$nombre = $_POST['nombre'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$eslogan = $_POST['eslogan'];

$n = new Luis();
$n->p_tema = $tema;
$n->p_nombre = $nombre;
$n->p_titulo = $titulo;
$n->p_descripcion = $descripcion;
$n->eslogan = $eslogan;
//$n->guardar_datos_pagina();
print_r($n);