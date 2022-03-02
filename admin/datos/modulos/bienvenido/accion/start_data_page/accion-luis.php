<?php
$tema = $_POST[''];
$nombre = $_POST[''];
$titulo = $_POST[''];
$descripcion = $_POST[''];
$eslogan = $_POST[''];

$n = new DatosAdmin();
$n->p_tema = $tema;
$n->p_nombre = $nombre;
$n->p_titulo = $titulo;
$n->p_descripcion = $descripcion;
$n->eslogan = $eslogan;
$n->