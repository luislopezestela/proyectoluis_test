<?php
$dark = DatosAdmin::Mostrar_direcciones_de_envio_one($_POST['data_dd']);
echo json_encode(array('nombre' => html_entity_decode($dark->nombre), 'direccion' => html_entity_decode($dark->direccion), 'sugerencia' => html_entity_decode($dark->sugerencia)));