<?php 
$user = new DatosAdmin();
$user->id = $_POST['data_dd'];
$user->nombre = htmlentities($_POST['nombre']);
$user->direccion = htmlentities($_POST['adrress']);
$user->sugerencia = htmlentities($_POST['surg']);
$user->update_address_delivery_cliente();
echo json_encode(array("messaje"=>"DATOS ACTUALIZADOS CON EXITO", 'nombre' => $user->nombre, 'direccion' => $user->direccion, 'sugerencia' => $user->sugerencia));
 ?>