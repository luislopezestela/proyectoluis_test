<?php
$compra = new DatosAdmin();
$compra->id = $_POST['compra'];
$compra->estado_de_venta = 6;
$compra->vendedor = $_SESSION['admin_id'];
$compra->aceptar_la_compra_web_vendedor();

echo json_encode(array('estado' => "exito", 'mensaje' => "Se movio a la lista de recibidos."));